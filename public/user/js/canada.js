var i = 0;
var alltotal = parseFloat($('#alltotal').val() || 0.00);
var alltotalYtd = parseFloat($('#alltotalYtd').val() || 0.00);
var allDeductiontotal = parseFloat($('#allDeductiontotal').val() || 0.00);
var allDeductionYTDtotal = parseFloat($('#allDeductionYTDtotal').val() || 0.00);
var tax_total_other = parseFloat($('#tax_total_other').val() || 0.00);
var tax_ytd_other = parseFloat($('#tax_ytd_other').val() || 0.00);
var days_number = parseFloat($('#days_number').val() || 0.00);

$(document).ready(function () {

    function dayCalculate() {
        var tax_rate = $(".tax_rate").find(":selected").data("tax");
        var pay_start_val = $(".pay_start").val();
        if (pay_start_val) {
            var pay_start = new Date(pay_start_val);
            if (tax_rate == null) {
                $('.tax_rate').focus();
            } else {
                $('.error').removeClass("d-none");
            }
            var dt1 = new Date(pay_start);
            var newDate = moment(dt1).add(1, "weeks").subtract(1, "days").format("MM/DD/YYYY");
            setTimeout(() => {
                $(".pay_end").val(newDate);
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
        var earning = `<input class="earnbtn mt-3 text-center incomeKey" data-id="000` + i + `" name="earning[]" type="text" value="" id="earning` + i + `">`;
        var rate = `<input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000` + i + `" name="rate[]" value="">`;
        var hours = `<input class="earnbtn mt-3 text-center hoursKey" type="number" id="hours_000` + i + `" name="hours[]" value="">`;
        var total = `<div class="relative"><input class="earnbtn mt-3 text-center"  id="total_000` + i + `" name="total[]" type="text" value="">
        <button type="button" class="cross-btn-canadas removebtn-canada"  data-ref="`+ i + `" id="removebtn` + i + `" data-type="earning">
        <span>x</span></button></div>`;

        $('.addincomeKey').append(earning);
        $('.addrateKey').append(rate);
        $('.addhoursKey').append(hours);
        $('.addcurrentTotal').append(total);
        i++;
    });

    $(document).on("click", ".removebtn-canada", function () {
        var inpputidvalue = $(this).attr('data-ref');
        var type = $(this).attr('data-type');

        if (type === 'earning') {
            $('#earning' + inpputidvalue).remove();
            $('#rate_000' + inpputidvalue).remove();
            $('#hours_000' + inpputidvalue).remove();
            $('#total_000' + inpputidvalue).remove();
            $('#removebtn' + inpputidvalue).parent().remove();
        } else {
            $('#tax_' + inpputidvalue).remove();
            $('#ytd_' + inpputidvalue).remove();
            $('#other_Tax_' + inpputidvalue).remove();
            $('#removebtn_tax' + inpputidvalue).remove();
        }
        calculation();
        taxOtherCalculate();
    });

    var j = 0;
    $(".addTaxField").click(function () {
        var addtaxes = `<div class="d-flex mt-3" id="other_Tax_` + j + `">
                            <img src="../images/unlock.png" style="visibility: hidden;" class="earnbtn3 lock">
                            <input class="earnbtn text-center other_taxes" name="tax_deduction[]" data-id="` + j + `" >
                        </div>`;
        var addtaxes_rate = `<input class="earnbtn text-center deduction_other mt-3" type="number" name="period_tax_deduction[]" id="tax_` + j + `">`;
        var addtaxes_ytd = `<div class="relative"><input class="earnbtn text-center deduction_other_ytd mt-3" type="text" name="ytd_tax_deduction[]" id="ytd_` + j + `">
        <button type="button" class="cross-btn-canadas removebtn-canada"  data-ref="`+ j + `" id="removebtn_tax` + j + `" data-type="tax"><span>x</span></button></div>`;

        $(".addtaxes").append(addtaxes);
        $(".addtaxes_rate").append(addtaxes_rate);
        $(".addtaxes_ytd").append(addtaxes_ytd);
        j++;
    });

    $(document).on('keyup', ".rateKey, .hoursKey", function () {
        calculation();
    });

    $(document).on('keyup', ".deduction_other, .deduction_other_ytd", function () {
        taxOtherCalculate();
    });

    function calculation() {
        var earningTotal = 0;
        var earningYtdTotal = 0;
        $('.incomeKey').each(function () {
            var id = $(this).data('id');
            var rate = parseFloat($('#rate_' + id).val()) || 0;
            var hours = parseFloat($('#hours_' + id).val()) || 0;
            var total = rate * hours || 0.00;
            var ytd = total * parseInt(days_number) || 0;
            $('#total_' + id).val(parseFloat(total).toFixed(2));
            earningTotal += total;
            earningYtdTotal += ytd;
        });
        alltotal = earningTotal;
        alltotalYtd = earningYtdTotal;
        taxCalculate();
    }

    function taxCalculate() {
        var taxTotal = 0;
        var taxYTDTotal = 0;
        $('.taxes').each(function () {
            var id = $(this).data('id');
            var rate = parseFloat($(this).data('value')) || 0;
            var total = (alltotal * rate) / 100;
            var ytd_total = total * parseInt(days_number) || 0.00;
            taxTotal += total;
            taxYTDTotal += ytd_total;
            $('#tax_total_' + id).val(parseFloat(total).toFixed(2));
            $('#tax_ytd_' + id).val(parseFloat(ytd_total).toFixed(2));
        });
        allDeductiontotal = taxTotal;
        allDeductionYTDtotal = taxYTDTotal;
        setTotals();
    }

    function taxOtherCalculate() {
        var tax_total = 0;
        var tax_ytd = 0;
        $(".other_taxes").each(function () {
            var id = $(this).data("id");
            var tax = $("#tax_" + id).val() || 0;
            var ytd = $("#ytd_" + id).val() || 0;
            tax_total += parseFloat(tax);
            tax_ytd += parseFloat(ytd);
        });
        tax_total_other = tax_total;
        tax_ytd_other = tax_ytd;
        setTotals();
    }

    function setTotals() {
        var deductions = parseFloat(allDeductiontotal) + parseFloat(tax_total_other);
        var ytd_deducations = parseFloat(allDeductionYTDtotal) + parseFloat(tax_ytd_other);
        var netPayVal = parseFloat(alltotal) - parseFloat(deductions);
        var YtdnetPayVal = parseFloat(alltotalYtd) - parseFloat(ytd_deducations);

        $("#ytd_gross").val(parseFloat(alltotalYtd || 0.00).toFixed(2));
        $("#ytd_deducations").val(parseFloat(ytd_deducations || 0.00).toFixed(2));
        $("#ytd_net_pay").val(parseFloat(YtdnetPayVal || 0.00).toFixed(2));
        $("#current_total").val(parseFloat(alltotal || 0.00).toFixed(2));
        $("#deductions").val(parseFloat(deductions || 0.00).toFixed(2));
        $("#net_pay").val(parseFloat(netPayVal || 0.00).toFixed(netPayVal % 1 === 0 ? 0 : 2));
        // Note: the original code had .toFixed(2) in some places and not in others. Let's stick to 2 for consistency.
        $("#net_pay").val(parseFloat(netPayVal || 0.00).toFixed(2));
    }

    // Initial call if needed
    // calculation();
});
