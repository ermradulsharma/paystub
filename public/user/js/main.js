var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
var userAuth = 0;
var okk = 0;
console.log(baseUrl);
$(".registerBtn").click(function () {
    $("#loginModal").modal("show");
    userAuth = 0;
});
$(".close").click(function () {
    $(".modal").modal("hide");
});
$("#sendOTPForm").on("submit", function () {
    $.ajax({
        url: baseUrl + "sendOtp",
        type: "POST",
        data: $("#sendOTPForm").serialize(),
        success: function (response) {
            $("#loginModal").modal("hide");

            if (response.type == 1) {
                $("#login_email").val(response.email);
                $("#loginPasswordModal").modal("show");
            } else {
                $("#otpModal").modal("show");
                $("#hidden_email").val(response.email);
                toastr.success(response.message);
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
            $("#otpModal").modal("hide");
            toastr.success(response.message);
            $(".registerBtn").removeClass("d-block");
            $(".registerBtn").addClass("d-none");
            $(".sendMailButton").removeClass("d-none");
            $(".sendMailButton").addClass("d-block");
            $(".logoutDiv").removeClass("d-none");
            if (response.user_type == "Admin") {
                window.location.href = baseUrl + "admin/dashboard";
            }
            if (userAuth == 1) {
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

$("#adminLogin").on("submit", function () {
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            $("#loginPasswordModal").modal("hide");
            toastr.success(response.message);
            setTimeout(() => {
                window.location.href = baseUrl + "admin/dashboard";
            }, 300);
        },
        error: function (err) {
            error = err.responseJSON;
            toastr.error(error.message);
        },
    });
    return false;
});

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
        var blockedTile = new Array("address_2", "emp_street_2", "hourly", "earning", "rate", "hours", "total", "period", "ytd_total", "period_gross_total", "ytd_gross_total", "deduction_period_tax", "deduction_period_tax_other", "advance_temp", "co_number", "file_number", "clock_vchr_number", "advice_number", "account_number_last_4", "transit_aba_number", "basic_temp", "taxes", "taxes_rate", "taxes_ytd");
        $(".0_" + name).remove();
        $("#" + name).css("border-color", "gray");
        if (blockedTile.indexOf(name) == -1 && element.value.length == 0) {
            if (ok == 1) {
                $("#" + name).focus();
            }
            $("#" + name).css("border-color", "red");
            $("#" + name).parent().parent().children("div").append("<div class='text-danger error_div 0_" + name + "'>This field can't be empty.</div>");
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
        $("#" + id).parent().parent().children("div").append("<div class='text-danger error_div 0_" + id + "'>This field can't be empty.</div>");
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
                $("#" + element.key).parent().parent().children("div").append('<div class="text-danger error_div 0_' + element.key + '">' + element.message + "</div>");
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
