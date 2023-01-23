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
