var i = 0;
var alltotal = parseFloat($('#alltotal').val() || 0.00);
var allDeductiontotal = parseFloat($('#allDeductiontotal').val() || 0.00);
var days_number = parseFloat($('#days_number').val() || 0.00);

$(document).ready(function () {

    function dayCalculate() {
        var tax_rate = $(".tax_rate").find(":selected").data("tax");
        var pay_start_val = $(".pay_start").val();
        if (pay_start_val) {
            var pay_start = new Date(pay_start_val);
            if (tax_rate == null) {
                $("span").removeClass("d-none");
                $('.tax_rate').focus();
            } else {
                $("span").addClass("d-none");
            }

            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(1, "weeks").format("MM/DD/YYYY");
            var newDate_1 = moment(newDate).subtract(1, "days").format("MM/DD/YYYY");
            setTimeout(() => {
                $(".pay_end").val(newDate_1);
                date_calculate();
                $(".pay_end").attr("readonly", true);
            }, 100);
        }
    }

    function date_calculate() {
        var pay_start_val = $(".pay_start").val();
        var pay_end_val = $(".pay_end").val();
        var pay_date_val = $(".pay_date").val();

        if (!pay_start_val || !pay_end_val || !pay_date_val) return;

        var pay_start = moment(pay_start_val, "MM/DD/YYYY");
        var pay_end = moment(pay_end_val, "MM/DD/YYYY");
        var pay_date = moment(pay_date_val, "MM/DD/YYYY");

        if (pay_date.isValid()) {
            if (pay_date.isAfter(pay_end)) {
                var days = pay_date.diff(pay_start, 'days');
                days_number = days / 7;
                if (days_number < 1) {
                    days_number = 0;
                }
                $("#days_number").val(parseInt(days_number));
            }
        }
    }

    $(".addEarningField").click(function () {
        var earning = `<input class="earnbtn mt-3 text-center incomeKey" data-id="000` + i + `" name="earning[]" type="text" value="" id="incomeKey_` + i + `">`;
        var rate = `<input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000` + i + `" name="rate[]" value="">`;
        var hours = `<div class="relative"><input class="earnbtn mt-3 text-center hoursKey" type="number" id="hours_000` + i + `" name="hours[]" value="">
        <button type="button" class="cross-btn-uks removebtn-uk"  data-ref="` + i + `" id="removebtn` + i + `">
        <span>x</span></button></div>`;
        var total = `<input class="earnbtn mt-3 text-center addcurrentTotal" readonly id="total_000` + i + `" name="total[]" type="text" value="">`;

        $('.addincomeKey').append(earning);
        $('.addrateKey').append(rate);
        $('.addhoursKey').append(hours);
        $('.addcurrentTotal').append(total);
        i++;
    });

    $(document).on("click", ".removebtn-uk", function () {
        var inpputidvalue = $(this).attr('data-ref');
        $('#incomeKey_' + inpputidvalue).remove();
        $('#rate_000' + inpputidvalue).remove();
        $('#hours_000' + inpputidvalue).remove();
        $('#total_000' + inpputidvalue).remove();
        $(this).parent().remove();

        calculation();
    });

    $(document).on('keyup', ".rateKey, .hoursKey", function () {
        calculation();
    });

    function calculation() {
        var earningTotal = 0;
        $('.incomeKey').each(function () {
            var id = $(this).data('id');
            var rate = parseFloat($('#rate_' + id).val()) || 0;
            var hours = parseFloat($('#hours_' + id).val()) || 0;
            var total = rate * hours || 0.00;
            $('#total_' + id).val(parseFloat(total).toFixed(2));
            earningTotal += total;
        });
        alltotal = earningTotal;
        taxCalculate();
    }

    function taxCalculate() {
        var taxTotal = 0;
        $('.taxes').each(function () {
            var id = $(this).data('id');
            var rate = parseFloat($(this).data('value')) || 0;
            var total = (alltotal * rate) / 100;
            $('#tax_total_' + id).val(parseFloat(total).toFixed(2));
            taxTotal += total;
        });
        allDeductiontotal = taxTotal;
        setTotals();
    }

    function setTotals() {
        var deductions = parseFloat(allDeductiontotal) || 0.00;
        var netPayVal = parseFloat(alltotal) - parseFloat(deductions);
        $("#current_total").val(parseFloat(alltotal || 0.00).toFixed(2));
        $("#deductions").val(parseFloat(deductions || 0.00).toFixed(2));
        $("#net_pay").val(parseFloat(netPayVal || 0.00).toFixed(2));
    }
});
