var i=0;
var alltotal = 0;
$('.addEarningField').click(function(){
 var htmlData = `<div class="row">
                    <div class="col-lg-2 mt-4 pr-0">
                        <input class="earnbtn text-center incomeKey" id="`+i+`" name="income[]" type="text">
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
         <img src="http://127.0.0.1:8000/images/lock.png" class="earnbtn2">
         <input class="earnbtn text-center taxes" name="other_taxes[]" data-id="`+j+`">
     </div>
 </div>
 <div class="col-lg-4 pr-0 mt-4">
     <input class="earnbtn text-center " value="" id="`+j+`">
 </div>

 <div class="col-lg-4 pr-0 mt-4">
     <input class="earnbtn text-center " value="" id="`+j+`">
 </div>
</div>`;
    $('#appendTaxField').append(htmlData);
    j++;
});

$('.rateKey, .hoursKey').keyup(function(){
    calculation();
});

function calculation(){
    var timeout = 200;
    $('.incomeKey').each( function() {
        var id = $(this).attr('id');
        var rate = parseFloat($('#rate_'+id).val());
        console.log("id ", id);
        var hours = parseFloat($('#hours_'+id).val());
        console.log("hours ", hours);
        var total = rate*hours | 0.00;
        $('#total_'+id).val(parseFloat(total).toFixed(2));
        alltotal+=total;
        timeout +=200; 
    });
    setTimeout(() => {
        taxCalculate();
    }, timeout);
}

function taxCalculate(){
    $('.taxes').each( function() {
            var taxTotal = 0;
            var id = $(this).attr('id');
            var rate = parseFloat($(this).data('value'));
            taxTotal = (alltotal*rate)/100;
            $('#tax_total_'+id).val(parseFloat(taxTotal).toFixed(2));
            $('#tax_ytd_'+id).val(0);
    });
}
