var days_number = 0;
var deduction_tax = 0;
var myNewArray = [];
var finalArray = [];
var arr = [];
$(document).ready(function () {
    var maxField = 12;
    var addButton = $("#add_earning");
    var wrapper_1 = $(".field_wrapper");
    var addDeduction = $(".add_deduction");
    var wrapper_2 = $("#add_deduction");
    var net_pay = $(".net_pay");
    var x = 1;
    var i = 1;

    $(addButton).click(function () {
        var fieldHTML =
            '<div class="row mb-3">' +
            '<div class="col-md-2 ">' +
            '<input  id="earning_' +
            i +
            '" data-id="' +
            i +
            '" name="earning[]" class="earnbtn text-center" value="">' +
            "</div>" +
            '<div class="col-md-2 ">' +
            '<input type="number" id="rate_' +
            i +
            '" data-id="' +
            i +
            '" name="rate[]" class="earnbtn calculation text-center rate" value="">' +
            "</div>" +
            '<div class="col-md-2 ">' +
            '<input type="number" id="hours_' +
            i +
            '" data-id="' +
            i +
            '" name="hours[]" class="earnbtn calculation text-center hours" value="">' +
            "</div>" +
            '<div class="col-md-2">' +
            '<input type="number" id="total_' +
            i +
            '" data-id="' +
            i +
            '" name="total[]" class="earnbtn text-center" value="">' +
            "</div>" +
            '<div class="col-md-2">' +
            '<input type="number" id="period_' +
            i +
            '" data-id="' +
            i +
            '" name="period[]" class="earnbtn gross_total text-center" value="">' +
            "</div>" +
            '<div class="col-md-2 ">' +
            '<input type="number" id="ytd_total_' +
            i +
            '" data-id="' +
            i +
            '" name="ytd_total[]" class="earnbtn ytd_total text-center" value="">' +
            "</div>" +
            "</div>";
        if (x < maxField) {
            x++;
            $(wrapper_1).append(fieldHTML);
        }
        i++;

        $(".calculation").keyup(function () {
            var id = $(this).data("id");
                calculation(id);
                arr_pushed(id);
        });

        $('.total').keyup(function(){
            total();
        });
        return false;
    });

    $(addDeduction).click(function () {
        var fieldHTML =
            '<div class="row mb-3">' +
            '<div class="col-md-3">' +
            '<img src="http://44.202.105.74/images/lock.png" class="earnbtn2">' +
            '<input name="tax_deduction[]" class="earnbtn text-center tax_deduction_0 tax_deduction_' +
            i +
            ' " data-id="' +
            i +
            '" type="text" value="">' +
            "</div>" +
            '<div class="col-md-1"> </div>' +
            '<div class="col-md-3"> </div>' +
            '<div class="col-md-1"> </div>' +
            '<div class="col-md-2">' +
            '<input type="number" name="period_tax_deduction[]" class="earnbtn text-center tax_deduction tax" id="taxes_0' +
            i +
            '" value="" data-id="' +
            i +
            '"/>' +
            "</div>" +
            '<div class="col-md-2">' +
            '<input type="number" name="ytd_tax_deduction[]" class="earnbtn text-center ytd_tax tax add_ytd_deduction" id="taxes_ytd_0' +
            i +
            '" value="" data-id="' +
            i +
            '"/>' +
            "</div>" +
            "</div>";
        if (x < maxField) {
            x++;
            $(wrapper_2).append(fieldHTML);
        }
        i++;

        $(".tax_deduction").keyup(function () {
            var deduction_period_tax = $("#deduction_period_tax").val() || 0.0;
            console.log("deduction_period_tax", deduction_period_tax);
            var tax_deduction = 0.0;
            $(".tax_deduction").each(function () {
                tax_deduction += parseFloat(this.value || 0.0);
            });
            console.log("tax_deduction", tax_deduction);
            setTimeout(function () {
                tax_deduction = tax_deduction;
                console.log("tax_deduction", tax_deduction);
                var total =
                    parseFloat(deduction_period_tax) +
                    parseFloat(tax_deduction);
                if (isNaN(total)) {
                    total = parseFloat(deduction_period_tax).toFixed(2);
                }
                $(".deduction_period_tax_other").val(
                    parseFloat(tax_deduction).toFixed(2)
                );
                $(".deduction_tax").val(parseFloat(total).toFixed(2));
                netPay();
            }, 300);
        });

        $(".ytd_tax").keyup(function () {
            var ytd_deduction_period_tax =
                $("#ytd_deduction_period_tax").val() || 0.0;
            var ytd_tax = 0.0;
            $(".ytd_tax").each(function () {
                ytd_tax += parseFloat(this.value || 0.0);
            });
            setTimeout(function () {
                ytd_tax = ytd_tax;
                var sum =
                    parseFloat(ytd_deduction_period_tax) + parseFloat(ytd_tax);
                if (isNaN(sum)) {
                    sum = parseFloat(ytd_deduction_period_tax).toFixed(2);
                }
                $(".ytd_deduction_period_tax_other").val(
                    parseFloat(ytd_tax).toFixed(2)
                );
                $(".ytd_deduction_tax").val(parseFloat(sum).toFixed(2));
                netPay();
            }, 300);
        });
        return false;
    });

    $(".tax_deduction").keyup(function () {
        var deduction_period_tax = $("#deduction_period_tax").val() || 0.0;
        console.log("deduction_period_tax", deduction_period_tax);
        var tax_deduction = 0.0;
        $(".tax_deduction").each(function () {
            tax_deduction += parseFloat(this.value || 0.0);
        });
        console.log("tax_deduction", tax_deduction);
        setTimeout(function () {
            tax_deduction = tax_deduction;
            console.log("tax_deduction", tax_deduction);
            var total =
                parseFloat(deduction_period_tax) + parseFloat(tax_deduction);
            if (isNaN(total)) {
                total = parseFloat(deduction_period_tax).toFixed(2);
            }
            $(".deduction_period_tax_other").val(
                parseFloat(tax_deduction).toFixed(2)
            );
            $(".deduction_tax").val(parseFloat(total).toFixed(2));
            netPay();
        }, 300);
    });

    $(".ytd_tax").keyup(function () {
        var ytd_deduction_period_tax =
            $("#ytd_deduction_period_tax").val() || 0.0;
        var ytd_tax = 0.0;
        $(".ytd_tax").each(function () {
            ytd_tax += parseFloat(this.value || 0.0);
        });
        setTimeout(function () {
            ytd_tax = ytd_tax;
            var sum =
                parseFloat(ytd_deduction_period_tax) + parseFloat(ytd_tax);
            if (isNaN(sum)) {
                sum = parseFloat(ytd_deduction_period_tax).toFixed(2);
            }
            $(".ytd_deduction_period_tax_other").val(
                parseFloat(ytd_tax).toFixed(2)
            );
            $(".ytd_deduction_tax").val(parseFloat(sum).toFixed(2));
            netPay();
        }, 300);
    });

    $(".tax_rate").change(function () {
        tax_rate();
        netPay();
    });

    $(".time_period").change(function () {
        time_period();
    });

    $(".pay_start").change(function () {
        dayCalculate();
    });

    $(".hourly").keyup(function () {
        var id = $(this).val();
        console.log("id", id);
        if (id != "NaN") {
            $("#rate_0").val(parseFloat(id).toFixed(2));
            $("#total_" + i).val("");
            $("#period_" + i).val("");
            $("#ytd_total_" + i).val("");
        }
    });

    $(".pay_date").change(function () {
        date_calculate();
    });

    $(".calculation").keyup(function () {
        var id = $(this).data("id");
        setTimeout(function () {
            calculation(id);
            arr_pushed(id);
        }, 300);
    });

    $(".auto_calculate").change(function () {
        auto_calculate();
    });

    function auto_calculate() {
        $(".auto_calculate").find(":selected").val();
    }

    function tax_rate() {
        var tax_rate = $(".tax_rate").find(":selected").data("tax");
        if (tax_rate == null) {
            $(".error").removeClass("d-none");
            $(".tax_rate").focus();
        } else {
            $(".error").addClass("d-none");
        }
        is_empty();
    }

    function time_period() {
        dayCalculate();
    }

    function dayCalculate() {
        var tax_rate = $(".tax_rate").find(":selected").data("tax");
        var pay_start = new Date($(".pay_start").val());
        var day = pay_start.getDate();
        var month = pay_start.getMonth() + 1;
        var year = pay_start.getFullYear();
        var pay_start_1 =
            year +
            "-" +
            (("" + month).length < 2 ? "0" : "") +
            month +
            "-" +
            (("" + day).length < 2 ? "0" : "") +
            day;

        var time_period = $(".time_period").val();
        if (tax_rate == null) {
            $("span").removeClass("d-none");
            $(".tax_rate").focus();
        }

        if (time_period == "weekly") {
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(1, "weeks").format("YYYY-MM-DD");
        }
        if (time_period == "bi-weekly") {
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(2, "weeks").format("YYYY-MM-DD");
        }
        if (time_period == "monthly") {
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(1, "months").format("YYYY-MM-DD");
        }
        if (time_period == "bi-monthly") {
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(2, "months").format("YYYY-MM-DD");
        }
        var newDate_1 = moment(newDate)
            .subtract(1, "days")
            .format("YYYY-MM-DD");
        setTimeout(() => {
            if (pay_start != "") {
                $(".pay_end").val(newDate_1);
                date_calculate();
                $(".pay_end").attr("readonly", true);
            } else if (pay_start == "Invalid date") {
                for (let i = 0; i < finalArray.length; i++) {
                    $("#rate_" + i).val("");
                    $("#total_" + i).val("");
                    $("#period_" + i).val("");
                    $("#ytd_total_" + i).val("");
                }
            }
        }, 400);
    }

    function date_calculate() {
        var pay_start = new Date($(".pay_start").val());
        var date = pay_start.getDate();
        var month = pay_start.getMonth() + 1;
        var year = pay_start.getFullYear();
        var pay_start_1 =
            year +
            "-" +
            (("" + month).length < 2 ? "0" : "") +
            month +
            "-" +
            (("" + date).length < 2 ? "0" : "") +
            date;

        var pay_end = new Date($(".pay_end").val());
        var date = pay_end.getDate();
        var month = pay_end.getMonth() + 1;
        var year = pay_end.getFullYear();
        var pay_end_1 =
            year +
            "-" +
            (("" + month).length < 2 ? "0" : "") +
            month +
            "-" +
            (("" + date).length < 2 ? "0" : "") +
            date;

        var pay_date = new Date($(".pay_date").val());
        var weekday = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];
        var day = pay_date.getDay();
        var day_name = weekday[pay_date.getDay()];

        var date = pay_date.getDate();
        var month = pay_date.getMonth() + 1;
        var year = pay_date.getFullYear();
        var pay_date_1 =
            year +
            "-" +
            (("" + month).length < 2 ? "0" : "") +
            month +
            "-" +
            (("" + date).length < 2 ? "0" : "") +
            date;
        if (pay_date_1 != "NaN-NaN-NaN") {
            if (pay_date_1 <= pay_end_1) {
                setTimeout(function () {
                    if (pay_date_1 != "NaN-NaN-NaN") {
                        for (let i = 0; i < finalArray.length; i++) {
                            $("#ytd_total_" + i).val(parseFloat(0).toFixed(2));
                            gross_total();
                        }
                    }
                }, 300);
            } else {
                var time_period = $(".time_period").val();
                var dt3 = new Date(pay_start_1);
                var dt2 = new Date(pay_end_1);
                var dt1 = new Date(pay_date_1);

                var mBetween = dt1.getTime() - dt3.getTime();
                var days = mBetween / (1000 * 3600 * 24);
                if (time_period == "weekly") {
                    days_number = days / 7;
                }
                if (time_period == "bi-weekly") {
                    days_number = days / 14;
                }
                if (time_period == "monthly") {
                    days_number = days / 30;
                }
                if (time_period == "bi-monthly") {
                    days_number = days / 61;
                }
                    for (let i = 0; i < finalArray.length; i++) {
                        var hours = $('#hours_'+i).val();
                        if (hours != '') {
                            calculation(i);
                        }
                    }
                    total();
            }
        } else {
            return false;
        }
    }

    function calculation(ids) {
        var auto_calculate = $(".auto_calculate").find(":selected").val();
        var rate = parseFloat($("#rate_" + ids).val()).toFixed(2);
        var hours = parseFloat($("#hours_" + ids).val()).toFixed(2);
        var total = rate * hours || 0.0;
        var ytd_total = total * parseInt(days_number) || 0.0;
        console.log(rate);
        setTimeout(function () {
            $("#total_" + ids).val(parseFloat(total).toFixed(2));
            $("#period_" + ids).val(parseFloat(total).toFixed(2));
            $("#ytd_total_" + ids).val(parseFloat(ytd_total).toFixed(2));
            gross_total();
        }, 300);
    }

    $(".hour_btn").click(function () {
        $(".rate").attr("hidden", false);
        $(".hours").attr("hidden", false);
        $(".hourly").attr("readonly", false);
        $(".time_period").val("monthly");
        $(".rate").attr("readonly", false);
        $(".hours").attr("readonly", false);
        $(".total").attr("readonly", true);
    });

    $('.salary_btn').click(function(){
        $('.rate').attr('readonly', true);
        $('#rate_0').attr('hidden', true);
        $('.hours').attr('readonly', true);
        $('#hours_0').attr('hidden', true);
        $('.hourly').attr('readonly', true);
        $('.total').attr('readonly', false);
        $('.time_period').val('monthly');
        $('.auto_calculate').val('on');
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        var date_1 =
            year +
            "-" +
            (("" + month).length < 2 ? "0" : "") +
            month +
            "-" +
            (("" + day).length < 2 ? "0" : "") +
            day;
        $(".pay_start").val(date_1);
        dayCalculate();
        $(".rate").val("");
        $(".hours").val("");
    });

    $('.total').keyup(function(){
        total();
    })

    function total(){
        var period_gross_total = 0;
        var ytd_gross_total = 0;
        $(".total").each(function () {
            var total = this.value || 0.0;
            var id = $(this).data("id");
            var ytd_total = total * parseInt(days_number) || 0.0;
            period_gross_total += total;
            ytd_gross_total += ytd_total;
            $('#period_'+id).val(parseFloat(total).toFixed(2));
            $('#ytd_total_'+id).val(parseFloat(ytd_total).toFixed(2));
        });
        $("#period_gross_total").val(parseFloat(period_gross_total).toFixed(2));
        $("#ytd_gross_total").val(parseFloat(ytd_gross_total).toFixed(2));
        setTimeout(() => {
            gross_total();
        }, 400);
    }

    $(".auto_calculate").change(function () {
        var value = $(this).val();
        if (value == "on") {
            $(".manualTaxTotal").attr("readonly", true);
            setTimeout(function () {
                gross_total();
            }, 200);
        } else {
            $(".manualTaxTotal").attr("readonly", false);
        }
    });
    $(".manualTaxTotal").keyup(function () {
        manualTaxTotal();
    });

    function manualTaxTotal() {
        var period_gross_total = $("#period_gross_total").val();
        var ytd_gross_total = $("#ytd_gross_total").val();
        var deduction_period_tax_other = parseFloat(
            $("#deduction_period_tax_other").val() || 0.0
        );
        var ytd_deduction_period_tax_other = parseFloat(
            $("#ytd_deduction_period_tax_other").val() || 0.0
        );
        period_deduction_tax = 0;
        period_ytd_deduction_tax = 0;
        var time = 0;
        if (period_gross_total != "NaN" || ytd_gross_total != "NaN") {
            $(".taxes").each(function () {
                var taxes_ids = $(this).data("id");
                $("#taxes_" + taxes_ids).each(function () {
                    var taxes_value = this.value || 0.0;
                    period_deduction_tax += parseFloat(taxes_value);
                });

                $("#taxes_ytd_" + taxes_ids).each(function () {
                    var taxes_ytd_value = this.value || 0.0;
                    period_ytd_deduction_tax += parseFloat(taxes_ytd_value);
                });
                time += 100;
            });
            setTimeout(function () {
                $(".deduction_tax").val(
                    parseFloat(
                        period_deduction_tax + deduction_period_tax_other
                    ).toFixed(2)
                );
                $(".ytd_deduction_tax").val(
                    parseFloat(
                        period_ytd_deduction_tax +
                            ytd_deduction_period_tax_other
                    ).toFixed(2)
                );
                $(".deduction_period_tax").val(
                    parseFloat(period_deduction_tax).toFixed(2)
                );
                $(".ytd_deduction_period_tax").val(
                    parseFloat(period_ytd_deduction_tax).toFixed(2)
                );
            }, 200);
            setTimeout(() => {
                netPay();
            }, time);
        }
    }

    function gross_total() {
        var auto_calculate = $(".auto_calculate").find(":selected").val();
        var total = 0;
        $(".gross_total").each(function () {
            total += parseFloat(this.value) || 0.0;
        });
        var ytd_total = 0;
        $(".ytd_total").each(function () {
            ytd_total += parseFloat(this.value) || 0.0;
        });

        setTimeout(function () {
            $("#period_gross_total").val(parseFloat(total).toFixed(2));
            $("#ytd_gross_total").val(parseFloat(ytd_total).toFixed(2));
            if (auto_calculate == "on") {
                default_tax();
            }
        }, 300);
    }

    function default_tax() {
        var period_gross_total = $("#period_gross_total").val();
        var ytd_gross_total = $("#ytd_gross_total").val();
        var deduction_period_tax_other = parseFloat(
            $("#deduction_period_tax_other").val() || 0.0
        );
        var ytd_deduction_period_tax_other = parseFloat(
            $("#ytd_deduction_period_tax_other").val() || 0.0
        );
        var tax_state = $("option:selected", ".tax_rate").attr("data-tax");
        period_deduction_tax = 0;
        period_ytd_deduction_tax = 0;
        var time = 200;
        if (period_gross_total != "NaN" || ytd_gross_total != "NaN") {
            $(".taxes").each(function () {
                var taxes_ids = $(this).data("id");
                var taxes_values = $(this).data("value");
                var tax_name = $(this).val();

                if (tax_name == "State Tax") {
                    var tax_rate = $(".tax_rate").find(":selected").data("tax");
                    if (tax_rate != null) {
                        taxes_values = parseFloat(tax_state).toFixed(2);
                    } else {
                        taxes_values = 0.0;
                    }
                    taxes_values = taxes_values;
                }
                period_tax_price =
                    parseFloat(period_gross_total).toFixed(2) *
                    (taxes_values / 100);
                period_ytd_tax_price =
                    parseFloat(ytd_gross_total).toFixed(2) *
                    (taxes_values / 100);

                $("#taxes_" + taxes_ids).val(
                    parseFloat(period_tax_price).toFixed(2)
                );
                $("#taxes_ytd_" + taxes_ids).val(
                    parseFloat(period_ytd_tax_price).toFixed(2)
                );

                period_deduction_tax += period_tax_price;
                period_ytd_deduction_tax += period_ytd_tax_price;
                setTimeout(function () {
                    $(".deduction_tax").val(
                        parseFloat(
                            period_deduction_tax + deduction_period_tax_other
                        ).toFixed(2)
                    );
                    $(".ytd_deduction_tax").val(
                        parseFloat(
                            period_ytd_deduction_tax +
                                ytd_deduction_period_tax_other
                        ).toFixed(2)
                    );
                    $(".deduction_period_tax").val(
                        parseFloat(period_deduction_tax).toFixed(2)
                    );
                    $(".ytd_deduction_period_tax").val(
                        parseFloat(period_ytd_deduction_tax).toFixed(2)
                    );
                }, 200);
                time += 200;
            });
            setTimeout(() => {
                netPay();
            }, time);
        }
    }

    function netPay() {
        var period_gross_total = $("#period_gross_total").val() || 0.0;
        var ytd_gross_total = $("#ytd_gross_total").val() || 0.0;
        var deduction_tax = $(".deduction_tax").val() || 0.0;
        var ytd_deduction_tax = $(".ytd_deduction_tax").val() || 0.0;
        var total_net_pay =
            parseFloat(period_gross_total) - parseFloat(deduction_tax) || 0.0;
        var total_ytd_net_pay =
            parseFloat(ytd_gross_total) - parseFloat(ytd_deduction_tax) || 0.0;
        setTimeout(function () {
            $(".total_net_pay").val(parseFloat(total_net_pay).toFixed(2));
            $(".total_ytd_net_pay").val(
                parseFloat(total_ytd_net_pay).toFixed(2)
            );
        }, 300);
    }

    function toFixValue() {
        $(".taxes").each(function () {
            var taxes_ids = $(this).data("id");
            $("#taxes_" + taxes_ids).each(function () {
                var taxes_value = this.value || 0.0;
                $(this).val(parseFloat(taxes_value).toFixed(2));
            });

            $("#taxes_ytd_" + taxes_ids).each(function () {
                var taxes_ytd_value = this.value || 0.0;
                $(this).val(parseFloat(taxes_ytd_value).toFixed(2));
            });
        });

        $(".tax_deduction").each(function () {
            var tax_deduction = this.value || 0.0;
            $(this).val(parseFloat(tax_deduction).toFixed(2));
        });
        $(".ytd_tax").each(function () {
            var ytd_tax = this.value || 0.0;
            $(this).val(parseFloat(ytd_tax).toFixed(2));
        });
    }

    function is_empty() {
        for (let i = 0; i < finalArray.length; i++) {
            $("#rate_" + i).val("");
            $("#hours_" + i).val("");
            $("#total_" + i).val("");
            $("#period_" + i).val("");
            $("#ytd_total_" + i).val("");
            $("#taxes_0" + i).val("");
            $("#taxes_ytd_0" + i).val("");
            $(".deduction_tax").val("");
            $(".ytd_deduction_tax").val("");
            $(".total_net_pay").val("");
            $(".total_ytd_net_pay").val("");
            $(".taxes").each(function () {
                var taxes_ids = $(this).data("id");
                $("#taxes_" + taxes_ids).val("");
                $("#taxes_ytd_" + taxes_ids).val("");
            });
            $(".tax_deduction_0").each(function () {
                var taxes_id = $(this).data("id");
                $("#taxes_0" + taxes_id).val("");
                $("#taxes_ytd_0" + taxes_id).val("");
            });
        }
    }

    function arr_pushed(id) {
        var a = $("#rate_" + id).data("id");
        arr.push(a);
        setTimeout(function () {
            finalArray = removeDuplicates(arr);
        }, 3);
    }

    function removeDuplicates(arr) {
        return arr.filter((item, index) => arr.indexOf(item) === index);
    }
});
