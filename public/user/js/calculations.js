$('#button1').click(function() {
    $("#usa_paystubx").validate({
        rules: {
            cname: {
                required: true
            , }
            , tel: {
                required: true
            , }
            , address_1: {
                required: true
            , }
            , address_2: {
                required: true
            , }
            , city: {
                required: true
            , }
            , emp_name: {
                required: true
            , }
            , emp_id: {
                required: true
            , }
            , emp_ssn: {
                required: true
            , }
            , emp_street_1: {
                required: true
            , }
            , emp_street_2: {
                required: true
            , }
            , emp_city: {
                required: true
            , }
            , state: {
                required: true
            , }
            , emp_state: {
                required: true
            , }
        , }
        , messages: {
            cname: {
                required: "This field is requierd."
            }
            , tel: {
                required: "This field is requierd."
            }
            , address_1: {
                required: "This field is requierd."
            }
            , address_2: {
                required: "This field is requierd."
            }
            , city: {
                required: "This field is requierd."
            }
            , emp_name: {
                required: "This field is requierd."
            }
            , emp_id: {
                required: "This field is requierd."
            }
            , emp_ssn: {
                required: "This field is requierd."
            }
            , emp_street_1: {
                required: "This field is requierd."
            }
            , emp_street_2: {
                required: "This field is requierd."
            }
            , emp_city: {
                required: "This field is requierd."
            }
            , state: {
                required: "This field is requierd."
            }
            , emp_state: {
                required: "This field is requierd."
            }
        , }
        , debug: false
        , errorElement: 'small'
        , errorPlacement: function(error, element) {
            console.log(error);
            error.insertAfter(element.parent().parent().children('div'));
        }
        , errorClass: 'error text-danger'
        , submitHandler: function(form) {
            console.log(form.validator);
            //form.submit();
            $.ajax({
                url: "{{ route('template') }}"
                , type: 'post'
                , data: $('#usa_paystubx').serialize()
                , success: function(response) {
                    console.log('response ', response);
                }
                , error: function(err) {
                    data = err.responseJSON;
                    console.log('err ', data);
                    Swal.fire({
                        icon: 'warning'
                        , title: data.message
                        , showCancelButton: false
                        , showConfirmButton: true
                    });
                }
            });
            return false;
        }
    });
});

var days_number = 0;
var deduction_tax = 0;
    $(document).ready(function() {
        var maxField = 12;
        var addButton = $('#add_earning');
        var wrapper_1 = $('.field_wrapper');
        var addDeduction = $('.add_deduction');
        var wrapper_2 = $('#add_deduction');
        var net_pay = $('.net_pay');
        var x = 1;
        var i = 1;

        $(addButton).click(function() {
            var fieldHTML =
                '<div class="row mb-3">' +
                '<div class="col-md-2 ">' +
                '<input  id="earning_' + i + '" data-id="' + i + '" class="earnbtn text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="text" id="rate_' + i + '" data-id="' + i + '" class="earnbtn calculation text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="text" id="hours_' + i + '" data-id="' + i + '" class="earnbtn calculation text-center hours" value="">' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" id="total_' + i + '" data-id="' + i + '" class="earnbtn text-center" value="">' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" id="period_' + i + '" data-id="' + i + '" class="earnbtn gross_total text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="text" id="ytd_total_' + i + '" data-id="' + i + '" class="earnbtn ytd_total text-center" value="">' +
                '</div>' +
                '</div>';
            if (x < maxField) {
                x++;
                $(wrapper_1).append(fieldHTML);
            }
            i++;

            $('.calculation').keyup(function() {
                var id = $(this).data('id');
                // console.log('id', id);
                setTimeout(function() {
                    calculation(id);
                }, 300);
            });
            return false;
        });

        i = 11;
        $(addDeduction).click(function() {
            var fieldHTML =
                '<div class="row mb-3">' +
                '<div class="col-md-3">' +
                '<img src="http://http://44.202.105.74/images/lock.png" class="earnbtn2">' +
                '<input class="earnbtn text-center tax_deduction_'+ i +' " data-id="' + i + '" type="text" value="">' +
                '</div>' +
                '<div class="col-md-1"> </div>' +
                '<div class="col-md-3"> </div>' +
                '<div class="col-md-1"> </div>' +
                '<div class="col-md-2">' +
                '<input type="text" class="earnbtn text-center tax_deduction tax add_deduction" id="taxes_'+ i +'" value="" data-id="'+ i +'"/>' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" class="earnbtn text-center ytd_tax tax add_deduction" id="taxes_ytd_'+ i +'" value="" data-id="'+ i +'"/>' +
                '</div>' +
                '</div>';
            if (x < maxField) {
                x++;

                $(wrapper_2).append(fieldHTML);
            }
            i++
            /* $('.add_deduction').keyup(function(){
                var id = $(this).data('id');
                add_deduction(id);
            }); */

            $('.tax_deduction').keyup(function() {
                var value = $(this).val();
                tax_deduction(value);
            });

            $('.ytd_tax').keyup(function() {
                var ytd_tax = 0;
                var total_ytd_tax = 0;
                $('.ytd_tax').each(function() {
                    ytd_tax += parseFloat(this.value);
                });
                setTimeout(function() {
                    var ytd_deduct = $(".ytd_deduction_tax").val();
                    var ytd = parseFloat(ytd_deduct).toFixed(2);
                    var td = parseFloat(ytd_tax).toFixed(2);
                    total_ytd_tax = $.add(ytd,td);

                    $(".ytd_deduction_tax").val(total_ytd_tax);
                }, 300);

            });

            /* function add_deduction(id){
                var taxes = parseFloat($('#taxes_' + id).val()).toFixed(2);
                var taxes_ytd = parseFloat($('#taxes_ytd_' + id).val()).toFixed(2);
                $(".deduction_tax").val(parseFloat(period_deduction_tax).toFixed(2));
                $(".ytd_deduction_tax").val(parseFloat(period_ytd_deduction_tax).toFixed(2));

                $("#deduction_period_tax").val(parseFloat(period_deduction_tax).toFixed(2));
                $("#ytd_deduction_period_tax").val(parseFloat(period_ytd_deduction_tax).toFixed(2));
                console.log('taxes', taxes);
                console.log('taxes_ytd', taxes_ytd);
            }
 */
            return false;
        });
        $('.tax_rate').change(function() {
            tax_rate();
        });

        $('.time_period').change(function() {
            time_period();

        });

        $('.pay_start').change(function() {
            dayCalculate();
        });

        $('.hourly').keyup(function() {
            var id = $(this).val();
            if(id != 'NaN'){
                $('#rate_0').val(parseFloat(id).toFixed(2));
            }
            calculation(0);
        });

        $('.pay_date').change(function() {
            date_calculate()
        });

        $('.calculation').keyup(function() {
            var id = $(this).data('id');
            console.log('id', id);
            setTimeout(function() {
                calculation(id);
            }, 300);
        });


        // $('.auto_calculate').change(function() {
        //     gross_total();
        // })
        function auto_calculate(){
            var auto_calculate = $('.auto_calculate').find(":selected").val();
        }
        function tax_rate(){
            var tax_rate = $('.tax_rate').find(":selected").data('tax');
            if (tax_rate == null) {
                $(".error").removeClass("d-none");
                $('.tax_rate').focus();
            } else {
                $(".error").addClass("d-none");
            }
            is_empty();
        }

        function time_period(){
                dayCalculate();
        }

        function dayCalculate() {
            var tax_rate = $('.tax_rate').find(":selected").data('tax');
            var pay_start = new Date($('.pay_start').val());
            var day = pay_start.getDate();
            var month = pay_start.getMonth() + 1;
            var year = pay_start.getFullYear();
            var pay_start_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + day).length < 2 ? '0' : '') + day;

            var time_period = $(".time_period").val();
            if (tax_rate == null) {
                $("span").removeClass("d-none");
                $('.tax_rate').focus();
            }

            if (time_period == "weekly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(1, 'weeks').format('YYYY-MM-DD');
            }
            if (time_period == "bi-weekly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(2, 'weeks').format('YYYY-MM-DD');
            }
            if (time_period == "monthly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(1, 'months').format('YYYY-MM-DD');
            }
            if (time_period == "bi-monthly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(2, 'months').format('YYYY-MM-DD');
            }
            var newDate_1 = moment(newDate).subtract(1, 'days').format('YYYY-MM-DD');
            setTimeout(() => {
                if (pay_start != '') {
                    $(".pay_end").val(newDate_1)
                    date_calculate();
                } else if(pay_start == 'Invalid date') {
                    $('#rate_0').val('');
                    $('#total_0').val('');
                    $('#period_0').val('');
                    $('#ytd_total_0').val('');
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
            console.log('pay_date_1', pay_date_1);
            if(pay_date_1 != 'NaN-NaN-NaN'){
                if (pay_date_1 <= pay_end_1) {
                    setTimeout(function() {
                        console.log('pay_date_1', pay_date_1);
                        if(pay_date_1 != 'NaN-NaN-NaN'){
                            $('#ytd_total_0').val(parseFloat(0).toFixed(2));
                            gross_total();
                        }
                    }, 300);
                } else {
                    var time_period = $(".time_period").val();
                    var dt3 = new Date(pay_start_1);
                    var dt2 = new Date(pay_end_1);
                    var dt1 = new Date(pay_date_1);

                    var newDate_1 = moment(dt1).add(1, 'weeks').format('YYYY-MM-DD');
                    var newDate_2 = moment(dt1).add(2, 'weeks').format('YYYY-MM-DD');
                    var newDate_3 = moment(dt1).add(1, 'months').format('YYYY-MM-DD');
                    var newDate_4 = moment(dt1).add(2, 'months').format('YYYY-MM-DD');
                    var mBetween = dt1.getTime() - dt3.getTime();
                    var days = (mBetween / (1000 * 3600 * 24));
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
                    var hours = $('#hours_0').val();
                    if (hours != '') {
                        calculation(0);
                    }
                }
            } else {
                return false;
            }

        }

        function calculation(id) {
            var rate = parseFloat($('#rate_' + id).val()).toFixed(2);
            var hours = parseFloat($('#hours_' + id).val()).toFixed(2);
            var total = rate * hours || 0.00;
            var ytd_total = total * parseInt(days_number) || 0.00;
            setTimeout(function() {
                    $('#total_' + id).val(parseFloat(total).toFixed(2));
                    $('#period_' + id).val(parseFloat(total).toFixed(2));
                    $('#ytd_total_' + id).val(parseFloat(ytd_total).toFixed(2));
                    var auto_calculate = $('.auto_calculate').find(":selected").val();
                    /* if(auto_calculate == 'on'){
                        gross_total();
                    }else{
                        $('.taxes').each(function() {
                            var taxes_ids = $(this).data('id');
                            var auto_tax = $('#taxes_' + taxes_ids).val();
                            var auto_ytd_tax = $('#taxes_ytd_' + taxes_ids).val();
                            console.log('auto_tax'+taxes_ids, auto_tax);
                            console.log('auto_ytd_tax'+taxes_ids, auto_ytd_tax);
                        })
                    } */
                    gross_total();
            }, 300);
        }

        function gross_total() {
            var total = 0;
            $('.gross_total').each(function() {
                total += parseFloat(this.value) || 0.00;
            });
            var ytd_total = 0;
            $('.ytd_total').each(function() {
                ytd_total += parseFloat(this.value) || 0.00;
            });

            setTimeout(function() {
                $("#period_gross_total").val(parseFloat(total).toFixed(2));
                $("#ytd_gross_total").val(parseFloat(ytd_total).toFixed(2));
                default_tax();
            }, 300);
        }

        function default_tax() {
            var period_gross_total = $("#period_gross_total").val();
            var ytd_gross_total = $("#ytd_gross_total").val();
            var tax_state = $('option:selected', '.tax_rate').attr('data-tax');
            period_deduction_tax = 0;
            period_ytd_deduction_tax = 0;
            var time = 200;
            if(period_gross_total != 'NaN' || ytd_gross_total != 'NaN'){

                $('.taxes').each(function() {
                    var taxes_ids = $(this).data('id');

                    console.log('taxes_ids', taxes_ids);
                    var taxes_values = $(this).data('value');
                    var tax_name = $(this).val();

                    if (tax_name == 'State Tax') {
                        var tax_rate = $('.tax_rate').find(":selected").data('tax');
                        if (tax_rate != null) {
                            taxes_values = parseFloat(tax_state).toFixed(2);
                        } else {
                            taxes_values = 0.00;
                        }
                        taxes_values = taxes_values;
                    }
                    period_tax_price = parseFloat(period_gross_total).toFixed(2) * (taxes_values / 100);
                    period_ytd_tax_price = parseFloat(ytd_gross_total).toFixed(2) * (taxes_values / 100);

                    $('#taxes_' + taxes_ids).val(parseFloat(period_tax_price).toFixed(2));
                    $('#taxes_ytd_' + taxes_ids).val(parseFloat(period_ytd_tax_price).toFixed(2));

                    period_deduction_tax += period_tax_price;
                    period_ytd_deduction_tax += period_ytd_tax_price;
                    setTimeout(function() {
                        $(".deduction_tax").val(parseFloat(period_deduction_tax).toFixed(2));
                        $(".ytd_deduction_tax").val(parseFloat(period_ytd_deduction_tax).toFixed(2));

                    }, 200);
                    time += 200;
                });


                setTimeout(() => {
                    netPay();
                }, time);
            }
        }

        function tax_deduction(value) {

        }

        function netPay() {
            var period_gross_total = $("#period_gross_total").val();
            var ytd_gross_total = $("#ytd_gross_total").val();
            var deduction_tax = $(".deduction_tax").val();
            var ytd_deduction_tax = $(".ytd_deduction_tax").val();

            var total_net_pay = parseFloat(period_gross_total) - parseFloat(deduction_tax);
            var total_ytd_net_pay = parseFloat(ytd_gross_total) - parseFloat(ytd_deduction_tax);
            setTimeout(function() {
                $(".total_net_pay").val(parseFloat(total_net_pay).toFixed(2));
                $(".total_ytd_net_pay").val(parseFloat(total_ytd_net_pay).toFixed(2));
            }, 300);
        }

        function is_empty(){
            $('#rate_0').val('');
            $('#hours_0').val('');
            $('#total_0').val('');
            $('#period_0').val('');
            $('#ytd_total_0').val('');
            $(".deduction_tax").val('');
            $(".ytd_deduction_tax").val('');
            $(".total_net_pay").val('');
            $(".total_ytd_net_pay").val('');
            $('.taxes').each(function() {
                var taxes_ids = $(this).data('id');
                $('#taxes_' + taxes_ids).val('');
                $('#taxes_ytd_' + taxes_ids).val('');
            });
        }
    });
