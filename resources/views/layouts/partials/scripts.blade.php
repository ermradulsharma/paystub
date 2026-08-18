<!-- Global Javascript Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#forgotPasswordButton').click(function() {
            $("#loginPasswordModal").modal("hide");
            $("#forgotPasswordModal").modal("show");
        });

        $('#backToSignin').click(function() {
            $("#forgotPasswordModal").modal("hide");
            $("#loginPasswordModal").modal("show");
        });

        $('.inputdatepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm/dd/yyyy",
        }).datepicker('setDate', 'today');

        $("#resendOtpButton").click(function() {
            var email = $('#hidden_email').val();
            var formType = $('#formType').val();
            startTimer();
            $.ajax({
                url: "{{ route('sendOtp') }}?email=" + email + "&formType="+formType,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.message);
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        $(document).on('click', '.confirm-toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#confirm_password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');
        });

        $(document).on('click', '.new-toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#new_password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.add_address').change(function() {
            var type = $('.add_address').data('type');
            var value = $(this).val();
            var userId = {{ Auth::check() == true ? 'true' : 'false' }};

            if (value == 'add_address') {
                if (userId == true) {
                    window.location.href = "{{ route('profile') }}?tab=2&emp=1";
                } else {
                    if (userAuth) {
                        window.location.href = "{{ route('profile') }}?tab=2&emp=1";
                    } else {
                        $(this).val('');
                        $("#loginModal").modal("show");
                    }
                }

            } else if (value == 'add_address_1') {
                if (userId == true) {
                    window.location.href = "{{ route('profile') }}?tab=2&emp=2";
                } else {
                    if (userAuth) {
                        window.location.href = "{{ route('profile') }}?tab=2&emp=2";
                    } else {
                        $(this).val('');
                        $("#loginModal").modal("show");
                    }
                }

            }
            return false;
        });
    });
</script>

<script src="{{ asset('user') }}/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key={{ env('GOOGLE_MAPS_API_KEY', 'AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao') }}&loading=async&callback=initAutocomplete" async defer></script>

<!-- Global Loader Markup & CSS -->
<style>
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 9999;
        width: 120px;
        height: 120px;
        margin: -76px 0 0 -76px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #4f46e5;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    #loaderDiv {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        background: rgba(15, 23, 42, 0.4);
        z-index: 9999;
    }
</style>

<div id="loaderDiv" style="display: none;">
    <div id="loader"></div>
</div>

@if ($errors->first())
    <script>
        toastr.error('{{ $errors->first() }}');
    </script>
@endif

@if (Session::has('message'))
    <script>
        toastr.success("{{ Session::get('message') }}");
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif

@yield('script')
@yield('checked')
