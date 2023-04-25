@extends('layouts.app')
@section('content')
<div>
    <div class="container mb-5 p-5 mt-2" style="background:#f6ebe4;">
        <div class="row " style="justify-content: center;">
            <div class="col-md-6">
                <h4 class="text-center">How can we help?</h4>
                <form action="" method="post">
                    <label for="fname" class="finame">First name:</label><br>
                    <input type="text" id="name" name="fname" class="w-100"><br>

                    <label for="fname" class="finame mt-5">Email *</label><br>
                    <input type="text" id="name" name="fname" class="w-100"><br>

                    <label for="w3review" class="finame mt-5">Tell us what you need help with</label>
                    <textarea id="name" name="w3review" rows="7" cols="56"></textarea>
                    <div class="text-center"><button type="submit" class="sendbtn">Send</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).on('click', '.sendbtn', function(e) {
        submitUserData($('#deleteItem')[0]);
        $('#deleteAcModal').modal('hide');
    });
    function submitUserData(form) {
        $.ajax({
            type: 'POST',
            url: form.action,
            data: $(form).serialize(),
            success: function(data) {
                console.log('data', data);
                if ($.isEmptyObject(data.error)) {
                    toastr.success(data.message);
                    if (data.pageReload == 'no') {
                        form.reset();
                        getAddressBook();
                        $('#addressBook').modal('hide');
                        return false;
                    }
                    location.reload(true);
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            toastr.error(value);
        });
    }
</script>
@endsection
