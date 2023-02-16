var i=0;
var alltotal =  parseFloat($('#alltotal').val() || 0.00);
var allDeductiontotal =  parseFloat($('#allDeductiontotal').val() || 0.00);
var days_number =  parseFloat($('#days_number').val() || 0.00)

$('.pay_start').change(function() {
    dayCalculate();
    setTimeout(() => {
        calculation();
    }, 100);
});

$(".pay_date").change(function () {
    date_calculate();
    setTimeout(() => {
        calculation();
    }, 100);
});

function dayCalculate() {
    var tax_rate = $(".tax_rate").find(":selected").data("tax");
    var pay_start = new Date($(".pay_start").val());
    var day = pay_start.getDate();
    var month = pay_start.getMonth() + 1;
    var year = pay_start.getFullYear();
    var pay_start_1 = year + "-" + (("" + month).length < 2 ? "0" : "") + month + "-" + (("" + day).length < 2 ? "0" : "") + day;
    if (tax_rate == null) {
        $("span").removeClass("d-none");
        $('.tax_rate').focus();
    }else{
        $("span").addClass("d-none");
    }

    var dt1 = new Date(pay_start);
    var newDate = moment(dt1).add(1, "weeks").format("YYYY-MM-DD");
    setTimeout(() => {
        if (pay_start != "") {
            $(".pay_end").val(newDate);
            date_calculate();
            $(".pay_end").attr("readonly", true);
        }
    }, 100);
}

function date_calculate() {
    var pay_start = new Date($(".pay_start").val());
    var date = pay_start.getDate();
    var month = pay_start.getMonth() + 1;
    var year = pay_start.getFullYear();
    var pay_start_1 = year + "-" + (("" + month).length < 2 ? "0" : "") + month + "-" + (("" + date).length < 2 ? "0" : "") + date;

    var pay_end = new Date($(".pay_end").val());
    var date = pay_end.getDate();
    var month = pay_end.getMonth() + 1;
    var year = pay_end.getFullYear();
    var pay_end_1 = year + "-" + (("" + month).length < 2 ? "0" : "") + month + "-" + (("" + date).length < 2 ? "0" : "") + date;

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
    var pay_date_1 = year + "-" + (("" + month).length < 2 ? "0" : "") + month + "-" + (("" + date).length < 2 ? "0" : "") + date;
    if (pay_date_1 != "NaN-NaN-NaN") {
        if (pay_date_1 <= pay_end_1) {
        } else {
            var dt3 = new Date(pay_start_1);
            var dt2 = new Date(pay_end_1);
            var dt1 = new Date(pay_date_1);

            var mBetween = dt1.getTime() - dt3.getTime();
            var days = mBetween / (1000 * 3600 * 24);
            days_number = days / 7;
            if (days_number < 1) {
                days_number = 0;
            }

            $("#days_number").val(parseInt(days_number));
        }
    } else {
        return false;
    }
}

$(".addEarningField").click(function () {
    var earning = `<input class="earnbtn mt-3 text-center incomeKey" data-id="000`+i+`" name="earning[]" type="text" value="">`;
    var rate = `<input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000`+i+`" name="rate[]" type="text" value="">`;
    var hours = `<input class="earnbtn mt-3 text-center hoursKey" type="number" id="hours_000`+i+`" name="hours[]" type="text" value="">`;
    var total = `<input class="earnbtn mt-3 text-center addcurrentTotal" readonly id="total_000`+i+`" name="total[]" type="text" value=""></input>`;
    $('.addincomeKey:last').append(earning);
    $('.addrateKey:last').append(rate);
    $('.addhoursKey:last').append(hours);
    $('.addcurrentTotal:last').append(total);
    i++;
    $(".rateKey, .hoursKey").keyup(function () {
        calculation();
    });
});

$(".rateKey, .hoursKey").keyup(function () {
    calculation();
});

function calculation(){
    var timeout = 0;
    var earningTotal = 0;
    $('.incomeKey').each( function() {
        var id = $(this).data('id');
        var rate = parseFloat($('#rate_'+id).val());
        var hours = parseFloat($('#hours_'+id).val());
        var total = rate*hours || 0.00;
        $('#total_'+id).val(parseFloat(total).toFixed(2));
        earningTotal+=total;
        timeout +=100;
    });
    alltotal = earningTotal;
    setTimeout(() => {
        taxCalculate();
    }, timeout);
}

function taxCalculate() {
    var taxTotal = 0;
    var timeout = 0;
    $('.taxes').each( function() {
        var id = $(this).data('id');
        var rate = parseFloat($(this).data('value'));
        console.log('rate_'+id,rate);
        total = (alltotal*rate)/100;
        $('#tax_total_'+id).val(parseFloat(total).toFixed(2));
        taxTotal +=total;
        timeout +=100;
    });
    setTimeout(() => {
        allDeductiontotal = taxTotal;
        setTotals();
    }, timeout);

}

function setTotals(){
    var deductions = parseFloat(allDeductiontotal)||0.00;
    var netPay = parseFloat(alltotal)-parseFloat(deductions);
    $("#current_total").val(parseFloat(alltotal || 0.00).toFixed(2));
    $("#deductions").val(parseFloat(deductions || 0.00).toFixed(2));
    $("#net_pay").val(parseFloat(netPay || 0.00).toFixed(2));
}
