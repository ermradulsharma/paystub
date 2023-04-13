var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
var userAuth = 0;
var okk = 0;
$(".registerBtn").click(function () {
    $("#loginModal").modal("show");
    userAuth = 0;
});

$("#sendOTPForm").on("submit", function () {
    $.ajax({
        url: baseUrl + "sendOtp",
        type: "POST",
        data: $("#sendOTPForm").serialize(),
        success: function (response) {
            $("#loginModal").modal("hide");
            if (response.role == '1') {
                $("#login_email").val(response.email);
                $("#loginPasswordModal").modal("show");
            } else {
                if (response.type == '1') {
                    $("#login_email").val(response.email);
                    $("#loginPasswordModal").modal("show");
                } else {
                    startTimer();
                    $("#otpModal").modal("show");
                    $("#hidden_email").val(response.email);
                    toastr.success(response.message);
                }
            }
        },
        error: function (err) {
            error = err.responseJSON;
            toastr.error(error.message);
        },
    });
    return false;
});

$("#adminLogin").on("submit", function () {
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            $("#loginPasswordModal").modal("hide");
            if (response.user.role_id == 1) {
                toastr.success(response.message);
                setTimeout(() => {
                    window.location.href = baseUrl + "admin/dashboard";
                }, 200);
            } else if (response.user.role_id == 2) {
                $(".registerBtn").removeClass("d-block").addClass("d-none");
                $(".logoutDiv").removeClass("d-none");
                $(".authUserName").text("Hi " + response.user.name);
            }

        },
        error: function (err) {
            error = err.responseJSON;
            toastr.error(error.message);
        },
    });
    return false;
});

$("#loginOtp").on("submit", function () {
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            console.log('response', response);
            if (response.firstName == "") {
                $("#otpModal").modal("hide");
                $("#setName").modal("show");
            }
        },
        error: function (err) {
            error = err.responseJSON;
            toastr.error(error.message);
        },
    });
    return false;
});

$("#userNameForm").on("submit", function () {
    $.ajax({
        type: 'POST',
        url: baseUrl + "profile/details/save",
        data: $(this).serialize(),
        success: function (response) {
            $("#setName").modal("hide");
            toastr.success(response.message);
            setTimeout(() => {
                $(".authUserName").text("Hi " + response.data);
            }, 300);

            $(".registerBtn").removeClass("d-block");
            $(".registerBtn").addClass("d-none");
            $(".sendMailButton").removeClass("d-none");
            $(".sendMailButton").addClass("d-block");
            $(".logoutDiv").removeClass("d-none");
            if (userAuth == 1) {
                setTimeout(() => {
                    $(".authUserName").text("Hi " + response.data);
                }, 300);
                if (okk == 1) {
                    usaStoreData();
                }
            }
        },
        error: function (err) {
            error = err.responseJSON;
            toastr.error(error.message);
        },
    });
    return false;
});

$(".btn-logout").click(function () {
    $("#logoutModal").modal("show");
    userAuth = 0;
});

$(".close, .bottom-close").click(function () {
    $(".modal").modal("hide");
});

function handleCredentialResponse(response) {
    function decodeJwtResponse(token) {
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function (c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
        return JSON.parse(jsonPayload);
    }
    const responsePayload = decodeJwtResponse(response.credential);
    $.ajax({
        url: baseUrl + "google/callback",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: responsePayload,
        success: function (response) {
            $("#loginModal").modal("hide");
            toastr.success(response.message);
            setTimeout(() => {
                $(".authUserName").text("Hi " + response.data);
            }, 300);

            $(".registerBtn").removeClass("d-block");
            $(".registerBtn").addClass("d-none");
            $(".sendMailButton").removeClass("d-none");
            $(".sendMailButton").addClass("d-block");
            $(".logoutDiv").removeClass("d-none");
            if (response.user_type == "Admin") {
                window.location.href = baseUrl + "admin/dashboard";
            }
            if (userAuth == 1) {
                setTimeout(() => {
                    $(".authUserName").text("Hi " + response.data);
                }, 300);
                if (okk == 1) {
                    usaStoreData();
                }
            }
        },
        error: function (err) {
            error = err.responseJSON;
            toastr.error(error.message);
        },
    });
    return false;
}

$("#forgotPassword").on("submit", function () {
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (data) {

            if ($.isEmptyObject(data.error)) {
                // alert(data.message);
                toastr.success(data.message);
                location.reload(true);
            } else {
                printErrorMsg(data.error);
            }
        },
        error: function (err) {
            printErrorMsg(err);
        },
    });
    return false;
});

function printErrorMsg(msg) {
    $.each(msg, function (key, value) {
        toastr.error(value);
    });
}

function startTimer() {
    var elementLink = document.getElementById("resendOtpButton");
    elementLink.classList.remove('pointer-active');
    elementLink.classList.add('pointer-disable');
    var timeleft = 30;
    var downloadTimer = setInterval(function () {
        timeleft--;
        document.getElementById("resendTimeOut").textContent = timeleft;
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
            elementLink.classList.add('pointer-active');
            elementLink.classList.remove('pointer-disable');
        }
    }, 1000);
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function checkValidationForm() {
    var ok = 1;
    var formData = $("#submit_form_paystubx_id").serializeArray();
    $(".removeDiv").keyup(function () {
        var id = $(this).attr("id");
        var value = $(this).val();
        removeErrorMsg(id, value);
    });

    $(".removeDiv").change(function () {
        var id = $(this).attr("id");
        var value = $(this).val();
        removeErrorMsg(id, value);
    });

    $.each(formData, function (i, element) {
        var name = element.name.replace("[]", "");
        var blockedTile = new Array("address_2", "tel", "emp_street_2", "hourly", "earning", "rate", "hours", "total", "period", "ytd_total", "period_gross_total", "ytd_gross_total", "deduction_period_tax", "deduction_period_tax_other", "advance_temp", "basic_temp", "taxes", "taxes_rate", "taxes_ytd", 'net_pay', 'note');
        if (!$('#' + name).is(':visible')) {
            blockedTile.push(name);
        }
        $(".0_" + name).remove();
        $("#" + name).css("border-color", "gray");
        if (blockedTile.indexOf(name) == -1 && element.value.length == 0) {
            if (ok == 1) {
                $("#" + name).focus();
            }
            $("#" + name).css("border-color", "red");
            $("#" + name).parent().parent('div').append("<span class='text-danger error_div 0_" + name + "' style='font-size:14px;'>This field can't be empty.</span>");
            ok = 0;
        }
    });
    return ok;
}

$(".removeDiv").focusout(function () {
    var id = $(this).attr("id");
    var value = $(this).val();
    removeErrorMsg(id, value);
});

$(".removeDiv").keyup(function () {
    var id = $(this).attr("id");
    var value = $(this).val();
    removeErrorMsg(id, value);
});

function removeErrorMsg(id, value) {
    $(".0_" + id).remove();
    $("#" + id).css("border-color", "gray");
    if (value.length == 0) {
        $("#" + id).css("border-color", "red");
        $("#" + id).parent().parent('div').append("<span class='text-danger error_div 0_" + id + "' style='font-size:14px;'>This field can't be empty.</span>");
    }
}

$(".viewTempTemplate").click(async function () {
    okk = await checkValidationForm();
    if (okk == 1) {
        viewPDF();
    }
});

$(".sendMailButton").click(async function () {
    okk = await checkValidationForm();
    if (okk == 1) {
        usaStoreData();
    }
});

$(".downloadPdf").click(function () {
    generatePDF();
});

function viewPDF() {
    document.getElementById("loaderDiv").style.display = "block";
    $.ajax({
        url: baseUrl + "templates",
        type: "post",
        data: $("#submit_form_paystubx_id").serialize(),
        success: function (response) {
            $("#tempView").attr("src", response.pdf + "?embedded=true#toolbar=0");
            $("#tempViewModal").modal("show");
            document.getElementById("loaderDiv").style.display = "none";
        },
        error: function (err) {
            error = err.responseJSON;
            $(".error_div").remove();
            error.errors.forEach((element, i) => {
                if (i == 0) {
                    $("#" + element.key).focus();
                }
                $("#" + element.key).css("border-color", "red");
                $("#" + element.key).parent().children("div").append('<span class="text-danger error_div 0_' + element.key + '">' + element.message + "</span>");
            });
            document.getElementById("loaderDiv").style.display = "none";
        },
    });

    return false;
}

function usaStoreData() {
    document.getElementById("loaderDiv").style.display = "block";
    $.ajax({
        url: baseUrl + "usaStoreData",
        type: "post",
        data: $("#submit_form_paystubx_id").serialize(),
        success: function (response) {
            setTimeout(function () {
                window.location.href = baseUrl + "invoiceList";
            }, 1000);
            document.getElementById("loaderDiv").style.display = "none";
        },
        error: function (err) {
            error = err.responseJSON;
            if (error.message == "Unauthenticated.") {
                userAuth = 1;
                $("#loginModal").modal("show");
            } else {
                //
            }
            document.getElementById("loaderDiv").style.display = "none";
        },
    });
}

function generatePDF() {
    document.getElementById("loaderDiv").style.display = "block";
    $.ajax({
        url: baseUrl + "generate-pdf",
        type: "post",
        data: $("#submit_form_paystubx_id").serialize(),
        success: function (response) {
            setTimeout(function () {
                var a = document.createElement("a");
                a.href = response.pdf;
                a.download = "w2form.pdf";
                document.body.append(a);
                a.click();
                a.remove();
            }, 1000);
            document.getElementById("loaderDiv").style.display = "none";
        },
        error: function (err) {
            error = err.responseJSON;
            if (error.message == "Unauthenticated.") {
                $("#loginModal").modal("show");
            } else {
                //
            }
            document.getElementById("loaderDiv").style.display = "none";
        },
    });
}

$('.lock').click(function () {
    var id = $(this).data('id');
    var img = $(this).attr('src');
    if (img == 'https://paystubx.com/images/lock.png') {
        $("#" + id).attr('src', 'https://paystubx.com/images/unlock.png');
        $("#taxe_" + id).attr("readonly", false);
    } else {
        $("#" + id).attr('src', 'https://paystubx.com/images/lock.png');
        $("#taxe_" + id).attr("readonly", true);
    }
});
