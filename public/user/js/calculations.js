var days_number = $('#days_number').val() || 0;
var deduction_tax = $(".deduction_tax").val() || 0;
var myNewArray = [];
var finalArray = [];
var arr = [];
var period;
$(document).ready(function () {
    var maxField = 12;
    var addButton = $("#add_earning");
    var addDeduction = $(".add_deduction");
    var wrapper_2 = $('#add_deduction');
    var net_pay = $(".net_pay");
    var x = 1;
    var i = 1;

    function addCommas(num) {
        obj2 = new Intl.NumberFormat('en-US');
        output2 = obj2.format(num);
        return output2
    }

    $(addButton).click(function () {
        var addEarning = `<div class="margin-bottom" id="earningusa_`+i+`">
                            <input class="earnbtn mb-3 text-center" type="text" name="earning[]"  id="earning_`+ i + `" data-id="` + i + `">
                        </div>`;
        var addRate = `<div class="margin-bottom" id="rateusa_`+i+`">
                        <input type="text" name="rate[]" class="earnbtn mb-3 text-center calculation rate"  id="rate_`+ i + `" data-id="` + i + `">
                    </div>`;
        var addHours = `<div class="margin-bottom" id="hoursusa_`+i+`">
                        <input type="text" name="hours[]" class="earnbtn mb-3 text-center hours calculation"  id="hours_`+ i + `" data-id="` + i + `">
                    </div>`;
        var addTotal = `<div class="margin-bottom" id="totalusa_`+i+`">
                        <input type="text" name="total[]" class="earnbtn mb-3 text-center total"  id="total_`+ i + `" data-id="` + i + `" readonly="true">
                    </div>`;
        var addGrossTotal = `<div class="margin-bottom"" id="periodusa_`+i+`">
                        <input type="text" name="period[]" class="earnbtn mb-3 text-center gross_total"  id="period_`+ i + `" data-id="` + i + `">
                    </div>`;
        var addYtdTotal = `<div class="margin-bottom relative" style="padding-top: 2px;" id="removebtn_usa`+i+`"">
                        <input type="text" name="ytd_total[]" class="earnbtn mb-3 text-center ytd_total"  id="ytd_total_`+ i + `" data-id="` + i + `">
                        <button class="cross-btn removebtn-usa"  data-ref="`+i+`"   data-id="` + i + `"><span>x</span></button>
                    </div>`;
        if (i < maxField) {
            i++;
            $("#addEarning").append(addEarning);
            $("#addRate").append(addRate);
            $("#addHours").append(addHours);
            $("#addTotal").append(addTotal);
            $("#addGrossTotal").append(addGrossTotal);
            $("#addYtdTotal").append(addYtdTotal);
            $("#add_deduction").append(add_deduction);
        }


        //remove function of add earning field
        $(".removebtn-usa").click(function(){

            var inpputidvalue= $(this).attr('data-ref');
            var inpputdata_id= $(this).attr('data-id');
            var input1 = document.getElementById('earningusa_'+inpputidvalue);
            var input2 = document.getElementById('rateusa_'+inpputidvalue);
            var input3 = document.getElementById('hoursusa_'+inpputidvalue);
            var input4 = document.getElementById('totalusa_'+inpputidvalue);
            var input5 = document.getElementById('periodusa_'+inpputidvalue);
            var input6 = document.getElementById('removebtn_usa'+inpputidvalue);

            input1.remove();
            input2.remove();
            input3.remove();
            input4.remove();
            input5.remove();
            input6.remove();
            i--;

            calculation(inpputdata_id);


        });

        // i++;
        $(".calculation").keyup(function () {
            var id = $(this).data("id");
            calculation(id);
            arr_pushed(id);
        });

        $('.total').keyup(function () {
            total();
        });
        return false;
    });

    $(addDeduction).click(function () {
        var fieldHTML = '<div class="row">' +
            '<div class="col-md-4 col-lg-3 mb-3">' +
            '<input name="tax_deduction[]" class="earnbtn text-center tax_deduction_0 tax_deduction_' + x + ' " data-id="' + x + '" type="text">' +
            "</div>" +
            '<div class="col-md-1 col-lg-1"> </div>' +
            '<div class="col-md-2 col-lg-3"> </div>' +
            '<div class="col-md-1 col-lg-1"> </div>' +
            '<div class="col-md-2 col-lg-2 mb-3">' +
            '<input type="text" name="period_tax_deduction[]" class="earnbtn text-center tax_deduction tax" id="taxes_0' + x + '"  data-id="' + x + '"/>' +
            "</div>" +
            '<div class="col-md-2 col-lg-2 mb-3 relative">' +
            '<input type="text" name="ytd_tax_deduction[]" class="earnbtn text-center ytd_tax tax add_ytd_deduction " id="taxes_ytd_0' + x + '"  data-id="' + x + '"/><button class="cross-btn-deduction removebtn-usa-deduction"><span>x</span></button>' +
            "</div>" +
            "</div> ";
        if (x <= maxField) {
            x++;
            $(wrapper_2).append(fieldHTML);
        }

        $(".tax_deduction").keyup(function () {
            var id = $(this).data('id');
            extraTaxDeduction();
        });

        $(".ytd_tax").keyup(function () {
            extraYTDTaxDeduction();
        });
        return false;
    });

    $(wrapper_2).on('click', '.removebtn-usa-deduction', function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
        x--; //Decrement field counter
        extraTaxDeduction();
        extraYTDTaxDeduction();
    });

    $(".tax_deduction").keyup(function () {
        extraTaxDeduction();
    });

    $(".ytd_tax").keyup(function () {
        extraYTDTaxDeduction();
    });

    function extraTaxDeduction(){
        var deduction_period_tax = $("#deduction_period_tax").val() || 0.0;
        var tax_deduction = 0.0;
        $(".tax_deduction").each(function () {
            tax_deduction += Number($(this).val()) || 0.00;
        });
        setTimeout(function () {
            tax_deduction = tax_deduction;
            var total = parseFloat(deduction_period_tax) + parseFloat(tax_deduction);
            if (isNaN(total)) {
                total = parseFloat(deduction_period_tax).toFixed(2);
            }
            $(".deduction_period_tax_other").val(parseFloat(tax_deduction).toFixed(2));
            $(".deduction_tax").val(parseFloat(total).toFixed(2));
            netPay();
        }, 300);
    }

    function extraYTDTaxDeduction(){
        var ytd_deduction_period_tax = $("#ytd_deduction_period_tax").val() || 0.0;
        var ytd_tax = 0.0;
        $(".ytd_tax").each(function () {
            ytd_tax += Number($(this).val()) || 0.00;
        });
        setTimeout(function () {
            ytd_tax = ytd_tax;
            var sum = parseFloat(ytd_deduction_period_tax) + parseFloat(ytd_tax);
            if (isNaN(sum)) {
                sum = parseFloat(ytd_deduction_period_tax).toFixed(2);
            }
            $(".ytd_deduction_period_tax_other").val(parseFloat(ytd_tax).toFixed(2));
            $(".ytd_deduction_tax").val(parseFloat(sum).toFixed(2));
            netPay();
        }, 300);
    }

    $(".tax_rate").change(function () {
        tax_rate();
        netPay();
    });

    $(".time_period").change(function () {
        var time_period_val = $(this).val();
        if(time_period_val == 'monthly'){
            salaryBtn();
        }else{
            time_period();
            hourBtn();
        }
    });

    $(".pay_start").change(function () {
        dayCalculate();
    });

    $(".hourly").keyup(function () {
        var id = $(this).val();
        if (id != "NaN") {
            $("#rate_0").val(parseFloat(id).toFixed(2));
            $("#total_" + i).val("");
            $("#period_" + i).val("");
            $("#ytd_total_" + i).val("");
        }
        if (id == "") {
            $("#rate_0").val("");
        }

    });

    /* $(".pay_date").change(function () {
        date_calculate();
    }); */

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
        // is_empty();
    }

    function time_period() {
        dayCalculate();
    }

    function dayCalculate() {
        var tax_rate = $(".tax_rate").find(":selected").data("tax");
        var pay_start = new Date($(".pay_start").val());
        var time_period = $(".time_period").val();
        if (tax_rate == null) {
            $("span").removeClass("d-none");
            $(".tax_rate").focus();
        }

        if (time_period == "weekly") {
            var dt1 = new Date(pay_start);
            var dt2 = dt1.getDate() + 6;
            var newDate = moment(dt1).add(1, "weeks").format("MM/DD/YYYY");
        }
        if (time_period == "bi-weekly") {
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(2, "weeks").format("MM/DD/YYYY");
        }
        if (time_period == "monthly") {
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(1, "months").format("MM/DD/YYYY");
        }
        if (time_period == "bi-monthly") {
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(2, "months").format("MM/DD/YYYY");
        }
        var newDate_1 = moment(newDate).subtract(1, "days").format("MM/DD/YYYY");
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
        var time_period = $(".time_period").val();
        d = new Date(Date.UTC(pay_start.getFullYear(), pay_start.getMonth(), pay_start.getDate()));
        d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay() || 7));
        var yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
        var weekNo = Math.ceil(((d - yearStart) / 86400000 + 1) / 7);
        var currentWeek = weekNo;
        if (time_period == "weekly") {
            days_number = currentWeek;
        }
        if (time_period == "bi-weekly") {
            days_number = currentWeek / 2;
        }
        if (time_period == "monthly") {
            days_number = pay_start.getMonth() + 1;
        }
        if (time_period == "bi-monthly") {
            days_number = (pay_start.getMonth() + 1) / 2;
        }
        $('#days_number').val(days_number);
        total();
    }

    function calculation(ids) {
        var rate = $("#rate_" + ids).val();
        var hours = $("#hours_" + ids).val();
        var total = rate * hours || 0.0;
        var ytd_total = total * days_number || 0.0;
        setTimeout(function () {
            $("#total_" + ids).val(parseFloat(total).toFixed(2));
            $("#period_" + ids).val(parseFloat(total).toFixed(2));
            $("#ytd_total_" + ids).val(parseFloat(ytd_total).toFixed(2));
            date_calculate();
            gross_total();
        }, 400);
    }

    $(".hour_btn").click(function () {
        hourBtn();
    });

    function hourBtn(){
        $('.hour_btn').css({ "background-color": "#f70303" });
        $('.salary_btn').css({ "background-color": "#827f7f" });
        $(".rate").attr("hidden", false);
        $(".hours").attr("hidden", false);
        $(".hourly").attr("readonly", false).removeClass('d-none').val('');
        $(".rate").attr("readonly", false);
        $(".hours").attr("readonly", false);
        $(".total").attr("readonly", true);
        $(".removeData").parent().removeClass("margintop-5");
        if($('.time_period').val() == 'monthly'){
            $('.time_period').val('weekly');
        }else{
            $('.time_period').val();
        }
        $('.auto_calculate').val('on');
        $(".earnbtn_0").val("Regular");
        var date = new Date();
        var date_1 = moment(date).format("MM/DD/YYYY");
        $(".pay_start").val(date_1);
        dayCalculate();
        is_empty();
    }

    $('.salary_btn').click(function () {
        salaryBtn();
    });

    function salaryBtn(){
        $('.salary_btn').css({ "background-color": "#f70303" });
        $('.hour_btn').css({ "background-color": "#827f7f" });
        $('.rate').attr('readonly', true);
        $('.hours').attr('readonly', true);
        $('.hourly').attr('readonly', true).addClass('d-none').val('');
        $('.total').attr('readonly', false);
        $('.time_period').val('monthly');
        $('.auto_calculate').val('on');
        var date = new Date();
        var date_1 = moment(date).format("MM/DD/YYYY");
        $(".pay_start").val(date_1);
        dayCalculate();
        $(".rate").val("");
        $(".hours").val("");
        $(".earnbtn_0").val("Salary");
        $(".removeData").attr("hidden", true);
        $(".removeData").parent().addClass("margintop-5");
        is_empty();
    }
    $('.total').keyup(function () {
        total();
    })

    function total() {
        var period_gross_total = 0;
        var ytd_gross_total = 0;
        $(".total").each(function () {
            var total = this.value || 0.0;
            var id = $(this).data("id");
            var ytd_total = total * days_number || 0.0;
            period_gross_total += total;
            ytd_gross_total += ytd_total;
            if(total != 0.0){
                $('#period_' + id).val(parseFloat(total).toFixed(2));
                $('#ytd_total_' + id).val(parseFloat(ytd_total).toFixed(2));
            }
        });
        if(period_gross_total != 0.0 || ytd_gross_total != 0.0){
            $("#period_gross_total").val(parseFloat(period_gross_total).toFixed(2));
            $("#ytd_gross_total").val(parseFloat(ytd_gross_total).toFixed(2));
            setTimeout(() => {
                gross_total();
            }, 400);
        }
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

    $(".marital_status").change(function () {
        setTimeout(function () {
            gross_total();
        }, 200);
    });

    $(".manualTaxTotal").keyup(function () {
        manualTaxTotal();
    });

    function manualTaxTotal() {
        var period_gross_total = $("#period_gross_total").val();
        var ytd_gross_total = $("#ytd_gross_total").val();
        var deduction_period_tax_other = parseFloat($("#deduction_period_tax_other").val() || 0.0);
        var ytd_deduction_period_tax_other = parseFloat($("#ytd_deduction_period_tax_other").val() || 0.0);
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
                $(".deduction_tax").val(parseFloat(period_deduction_tax + deduction_period_tax_other).toFixed(2));
                $(".ytd_deduction_tax").val(parseFloat(period_ytd_deduction_tax + ytd_deduction_period_tax_other).toFixed(2));
                $(".deduction_period_tax").val(parseFloat(period_deduction_tax).toFixed(2));
                $(".ytd_deduction_period_tax").val(parseFloat(period_ytd_deduction_tax).toFixed(2));
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


    $('.tgl').click(function () {
        if ($(this).is(":checked")) {
            $(".emp_your_state_txt").removeClass("d-none");
            $(".emp_your_state_slt").addClass("d-none");
            $(".tgl").val(1);
            $('#emp_your_state').keyup(function(){
                var txtlen = $('#emp_your_state').val();
                if(txtlen.length > 3){
                    var rate = $("#rate_0").val();
                    var hours = $("#hours_0").val();
                    var total = rate * hours || 0.0;
                    if(total != 0.0){
                        default_tax();
                    }
                }
            });

        } else {
            $(".emp_your_state_txt").addClass("d-none");
            $(".emp_your_state_slt").removeClass("d-none");
            $(".tgl").val(0);
            var rate = $("#rate_0").val();
            var hours = $("#hours_0").val();
            var total = rate * hours || 0.0;
            if(total != 0.0){
                default_tax();
            }
        }
    });

    $(function() {
        if ($(".tgl").val() == 1) {
            $(".emp_your_state_txt").removeClass("d-none");
            $(".emp_your_state_slt").addClass("d-none");
            if ($('.emp_your_state_txt').is(':visible')) {
                var rate = $("#rate_0").val();
                var hours = $("#hours_0").val();
                var total = rate * hours || 0.0;
                if(total != 0.0){
                    default_tax();
                }
            }

        } else {
            $(".emp_your_state_txt").addClass("d-none");
            $(".emp_your_state_slt").removeClass("d-none");
            if ($('.emp_your_state_slt').is(':visible')) {
                var rate = $("#rate_0").val();
                var hours = $("#hours_0").val();
                var total = rate * hours || 0.0;
                if(total != 0.0){
                    default_tax();
                }
            }
        }
    });
    function default_tax() {
        var period_gross_total = $("#period_gross_total").val() || 0.0;
        var ytd_gross_total = $("#ytd_gross_total").val() || 0.0;
        var deduction_period_tax_other = parseFloat($("#deduction_period_tax_other").val() || 0.0);
        var ytd_deduction_period_tax_other = parseFloat($("#ytd_deduction_period_tax_other").val() || 0.0);
        if ($(".tax_rate").is("select:visible")) {
            var tax_state = $("option:selected", ".tax_rate").attr("data-tax");
        } else if ($(".tax_rate").is("input:visible")) {
            var tax_state = 0.00;
        }
        var fieldtype = $(".tax_rate").is("input:visible");
        period_deduction_tax = 0;
        period_ytd_deduction_tax = 0;
        var time = 200;
        if (period_gross_total != "NaN" || ytd_gross_total != "NaN") {
            $(".taxes").each(function () {
                var taxes_ids = $(this).data("id");
                var taxes_values = $(this).data("value");
                var taxes_text = $(this).data("text");
                var tax_name = $(this).val();
                if (tax_name == "State Tax") {
                    if (fieldtype == true) {
                        $('.taxes_State').attr('readonly', false);
                    } else {
                        $('.taxes_State').attr('readonly', true);
                    }
                    taxes_values = parseFloat(tax_state).toFixed(2);
                }
                // if (taxes_text == 'deduction_8' || taxes_text == 'deduction_18') {   // Local
                if (taxes_text == 'deduction_3' || taxes_text == 'deduction_5') {   // live condition
                    var time_period = $(".time_period").val();
                    if (time_period == 'weekly') {
                        period = 52;
                    } else if (time_period == 'bi-weekly') {
                        period = 26;
                    } else if (time_period == 'monthly') {
                        period = 12;
                    } else if (time_period == 'bi-monthly') {
                        period = 6;
                    }
                    var fTaxArr = getNewFederalTaxRate(period, $(".marital_status").val(), $(".exemptions").val(), period_gross_total);
                    var fedaRalTax = (period_gross_total - fTaxArr.subtract) * fTaxArr.rate;
                    if (fedaRalTax > 0) {
                        taxes_values = fedaRalTax || 0.00;
                    } else {
                        taxes_values = 0.00;
                    }
                    if (period_gross_total == 0) {
                        period_tax_price = 0.00;
                        period_ytd_tax_price = 0.00;
                    } else {
                        period_tax_price = taxes_values || 0.00;
                        period_ytd_tax_price = taxes_values * days_number || 0.00;
                    }

                } else {
                    period_tax_price = parseFloat(period_gross_total).toFixed(2) * (taxes_values / 100);
                    period_ytd_tax_price = parseFloat(ytd_gross_total).toFixed(2) * (taxes_values / 100);
                }
                $("#taxes_" + taxes_ids).val(parseFloat(period_tax_price).toFixed(2));
                $("#taxes_ytd_" + taxes_ids).val(parseFloat(period_ytd_tax_price).toFixed(2));

                period_deduction_tax += period_tax_price;
                period_ytd_deduction_tax += period_ytd_tax_price;
                setTimeout(function () {
                    $(".deduction_tax").val(parseFloat(period_deduction_tax + deduction_period_tax_other).toFixed(2));
                    $(".ytd_deduction_tax").val(parseFloat(period_ytd_deduction_tax + ytd_deduction_period_tax_other).toFixed(2));
                    $(".deduction_period_tax").val(parseFloat(period_deduction_tax).toFixed(2));
                    $(".ytd_deduction_period_tax").val(parseFloat(period_ytd_deduction_tax).toFixed(2));
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
        var total_net_pay = parseFloat(period_gross_total) - parseFloat(deduction_tax) || 0.0;
        var total_ytd_net_pay = parseFloat(ytd_gross_total) - parseFloat(ytd_deduction_tax) || 0.0;
        setTimeout(function () {
            $(".total_net_pay").val(parseFloat(total_net_pay).toFixed(2));
            $(".total_ytd_net_pay").val(parseFloat(total_ytd_net_pay).toFixed(2));
        }, 20);
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
        $(".earning").each(function () {
            var i = $(this).data("id");
            $("#rate_" + i).val("");
            $("#hours_" + i).val("");
            $("#total_" + i).val("");
            $("#period_" + i).val("");
            $("#ytd_total_" + i).val("");
            $("#taxes_0" + i).val("");
            $("#taxes_ytd_0" + i).val("");
        });
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
