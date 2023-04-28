var i = 0;
var alltotal = parseFloat($('#alltotal').val() || 0.00);
var allDeductiontotal = parseFloat($('#allDeductiontotal').val() || 0.00);
var days_number = parseFloat($('#days_number').val() || 0.00)

/* $('.pay_start').change(function () {
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
}); */

function dayCalculate() {
    var tax_rate = $(".tax_rate").find(":selected").data("tax");
    var pay_start = new Date($(".pay_start").val());
    var pay_start_1 = moment(pay_start).format("MM/DD/YYYY");
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

function date_calculate() {
    var pay_start = new Date($(".pay_start").val());
    var pay_start_1 = moment(pay_start).format("MM/DD/YYYY");
    var pay_end = new Date($(".pay_end").val());
    var pay_end_1 = moment(pay_end).format("MM/DD/YYYY");
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
    var pay_date_1 = moment(pay_date).format("MM/DD/YYYY");
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
    var earning = `<input class="earnbtn mt-3 text-center incomeKey" data-id="000` + i + `" name="earning[]" type="text" value="" id="incomeKey_`+ i +`">`;
    var rate = `<input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000` + i + `" name="rate[]" type="text" value="">`;
    var hours = `<input class="earnbtn mt-3 text-center hoursKey" type="text" id="hours_000` + i + `" name="hours[]" type="text" value="">
    <button type="button" class="cross-btn-uks removebtn-uk"  data-ref="`+i+`" id="removebtn`+i+`">
    <span>x</span></button>`;
    var total = `<input class="earnbtn mt-3 text-center addcurrentTotal" readonly id="total_000` + i + `" name="total[]" type="text" value=""></input>`;
    $('.addincomeKey:last').append(earning);
    $('.addrateKey:last').append(rate);
    $('.addhoursKey:last').append(hours);
    $('.addcurrentTotal:last').append(total);
    i++;

    //remove function of add earning field
    $(".removebtn-uk").click(function(){
        
        var inpputidvalue= $(this).attr('data-ref');
        var input4btn = document.getElementById('removebtn'+inpputidvalue);      
        var input1 = document.getElementById('incomeKey_'+inpputidvalue);
        var input2 = document.getElementById('rate_000'+inpputidvalue);
        var input3 = document.getElementById('hours_000'+inpputidvalue);
        var input4 = document.getElementById('total_000'+inpputidvalue);
        
      
        input4btn.remove();     
        input1.remove();
        input2.remove();
        input3.remove();
        input4.remove();
       
    
        
    });

    $(".rateKey, .hoursKey").keyup(function () {
        calculation();
    });
});

// $(".rateKey, .hoursKey").keyup(function () {
//     calculation();
// });

function calculation() {
    var timeout = 0;
    var earningTotal = 0;
    $('.incomeKey').each(function () {
        var id = $(this).data('id');
        var rate = parseFloat($('#rate_' + id).val());
        var hours = parseFloat($('#hours_' + id).val());
        var total = rate * hours || 0.00;
        $('#total_' + id).val(parseFloat(total).toFixed(2));
        earningTotal += total;
        timeout += 100;
    });
    alltotal = earningTotal;
    setTimeout(() => {
        taxCalculate();
    }, timeout);
}

function taxCalculate() {
    var taxTotal = 0;
    var timeout = 0;
    $('.taxes').each(function () {
        var id = $(this).data('id');
        var rate = parseFloat($(this).data('value'));
        total = (alltotal * rate) / 100;
        $('#tax_total_' + id).val(parseFloat(total).toFixed(2));
        taxTotal += total;
        timeout += 100;
    });
    setTimeout(() => {
        allDeductiontotal = taxTotal;
        setTotals();
    }, timeout);

}

function setTotals() {
    var deductions = parseFloat(allDeductiontotal) || 0.00;
    var netPay = parseFloat(alltotal) - parseFloat(deductions);
    $("#current_total").val(parseFloat(alltotal || 0.00).toFixed(2));
    $("#deductions").val(parseFloat(deductions || 0.00).toFixed(2));
    $("#net_pay").val(parseFloat(netPay || 0.00).toFixed(2));
}
