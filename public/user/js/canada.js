var i=0;
var alltotal = 0.00;
var alltotalYtd = 0.00;
var allDeductiontotal = 0.00;
var allDeductionYTDtotal = 0.00;
var tax_total_other = 0.00;
var tax_ytd_other = 0.00;
var days_number = 0;

$('.pay_start').change(function() {
    dayCalculate();
    setTimeout(() => {
        calculation();
    }, 500);
});

$('.pay_date').change(function() {
    date_calculate();
    setTimeout(() => {
        calculation();
    }, 500);
});

function dayCalculate() {
    var tax_rate = $('.tax_rate').find(":selected").data('tax');
    var pay_start = new Date($('.pay_start').val());
    var day = pay_start.getDate();
    var month = pay_start.getMonth() + 1;
    var year = pay_start.getFullYear();
    var pay_start_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + day).length < 2 ? '0' : '') + day;
    if (tax_rate == null) {
        $("span").removeClass("d-none");
        $('.tax_rate').focus();
    }

    var dt1 = new Date(pay_start);
    var newDate = moment(dt1).add(1, 'weeks').format('YYYY-MM-DD');

    //var newDate_1 = moment(newDate).subtract(1, 'days').format('YYYY-MM-DD');
    setTimeout(() => {
        if (pay_start != '') {
            $(".pay_end").val(newDate);
            date_calculate();
            $(".pay_end").attr('readonly', true)
        }
    }, 400);
}

function date_calculate(){
    var pay_start = new Date($(".pay_start").val());
    var date = pay_start.getDate();
    var month = pay_start.getMonth() + 1;
    var year = pay_start.getFullYear();
    var pay_start_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + date).length < 2 ? '0' : '') + date;

    var pay_end = new Date($(".pay_end").val());
    var date = pay_end.getDate();
    var month = pay_end.getMonth() + 1;
    var year = pay_end.getFullYear();
    var pay_end_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + date).length < 2 ? '0' : '') + date;

    var pay_date = new Date($(".pay_date").val());
    var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var day = pay_date.getDay();
    var day_name = weekday[pay_date.getDay()];

    var date = pay_date.getDate();
    var month = pay_date.getMonth() + 1;
    var year = pay_date.getFullYear();
    var pay_date_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + date).length < 2 ? '0' : '') + date;
    if(pay_date_1 != 'NaN-NaN-NaN'){
        if (pay_date_1 <= pay_end_1) {
            
        } else {
            var dt3 = new Date(pay_start_1);
            var dt2 = new Date(pay_end_1);
            var dt1 = new Date(pay_date_1);

            var mBetween = dt1.getTime() - dt3.getTime();
            var days = (mBetween / (1000 * 3600 * 24));
            days_number = days / 7;
            if(days_number < 1){
                days_number = 0; 
            }
        }
    } else {
        return false;
    }
}

$('.addEarningField').click(function(){
 var htmlData = `<div class="row">
                    <div class="col-lg-2 mt-4 pr-0">
                        <input class="earnbtn text-center incomeKey" data-id="`+i+`" name="earning[]" type="text">
                    </div>
                    <div class="col-lg-2 mt-4 pr-0">
                        <input class="earnbtn text-center rateKey" id="rate_`+i+`" name="rate[]" type="text">
                    </div>
                    <div class="col-lg-4 mt-4 pr-0">
                        <input class="earnbtn text-center hoursKey" id="hours_`+i+`" name="hours[]" type="text">
                    </div>
                    <div class="col-lg-4 mt-4 pr-0">
                        <input class="earnbtn text-center" type="text" id="total_`+i+`" name="total[]">
                    </div>
                </div>`;
    $('#appendEarningField').append(htmlData);
    i++;
    $('.rateKey, .hoursKey').keyup(function(){
        calculation();
    });
});

var j=0;
$('.addTaxField').click(function(){
 var htmlData = `<div class="row">
 <div class="col-lg-4 px-0 mt-4">
     <div class="d-flex">
         <img src="./images/lock.png" class="earnbtn2">
         <input class="earnbtn text-center other_taxes" name="tax_deduction[]" data-id="`+j+`">
     </div>
 </div>
 <div class="col-lg-4 pr-0 mt-4">
     <input class="earnbtn text-center deduction_other" name="period_tax_deduction[]" id="tax_`+j+`">
 </div>

 <div class="col-lg-4 pr-0 mt-4">
     <input class="earnbtn text-center deduction_other_ytd" name="ytd_tax_deduction[]" id="ytd_`+j+`">
 </div>
</div>`;
    $('#appendTaxField').append(htmlData);
    j++;

    $('.deduction_other, .deduction_other_ytd').keyup(function(){
        taxOtherCalculate();
    });
});

$('.rateKey, .hoursKey').keyup(function(){
    calculation();
});

function calculation(){
    var timeout = 200;
    var earningTotal = 0;
    var earningYtdTotal = 0;
    $('.incomeKey').each( function() {
        var id = $(this).data('id');
        var rate = parseFloat($('#rate_'+id).val());
        var hours = parseFloat($('#hours_'+id).val());
        var total = rate*hours | 0.00;
        var ytd = total * parseInt(days_number) || 0.00;
        $('#total_'+id).val(parseFloat(total).toFixed(2));
        earningTotal+=total;
        earningYtdTotal+=ytd;
        timeout +=200; 
    });
    alltotal = earningTotal;
    alltotalYtd = earningYtdTotal;
    setTimeout(() => {
        taxCalculate();
    }, timeout);
}

function taxCalculate(){
    var taxTotal = 0;
    var taxYTDTotal = 0;
    $('.taxes').each( function() {
            var total = 0;
            var ytd_total = 0;
            var id = $(this).data('id');
            var rate = parseFloat($(this).data('value'));
            total = (alltotal*rate)/100;
            ytd_total = total * parseInt(days_number) || 0.00;
            taxTotal +=total;
            taxYTDTotal +=ytd_total;
            $('#tax_total_'+id).val(parseFloat(total).toFixed(2));
            $('#tax_ytd_'+id).val(ytd_total);
    });
    setTimeout(() => {
        allDeductiontotal = taxTotal;
        allDeductionYTDtotal = taxYTDTotal;
        setTotals();
    }, 600);
    
}

function taxOtherCalculate(){
    var tax_total = 0;
    var tax_ytd = 0;
    $('.other_taxes').each( function() {
        var id = $(this).data('id');
        var tax = $('#tax_'+id).val() || 0;
        var ytd = $('#ytd_'+id).val() || 0;
        tax_total += parseFloat(tax);
        tax_ytd += parseFloat(ytd);
    });
    setTimeout(() => {
        tax_total_other = tax_total;
        tax_ytd_other = tax_ytd
        setTotals();
    }, 600);
}

function setTotals(){
    var deductions = parseFloat(allDeductiontotal)+parseFloat(tax_total_other);
    var ytd_deducations = parseFloat(allDeductionYTDtotal)+parseFloat(tax_ytd_other);
    var netPay = parseFloat(alltotal)-parseFloat(deductions);
    var YtdnetPay = parseFloat(alltotalYtd)-parseFloat(ytd_deducations);
    $("#ytd_gross").val(alltotalYtd.toFixed(2));
    $("#ytd_deducations").val(ytd_deducations.toFixed(2));
    $("#ytd_net_pay").val(YtdnetPay.toFixed(2));
    $("#current_total").val(alltotal.toFixed(2));
    $("#deductions").val(deductions.toFixed(2));
    $("#net_pay").val(netPay.toFixed(2));
}
