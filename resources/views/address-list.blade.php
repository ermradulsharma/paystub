<table class="table" style="border:1px solid #ddd;">
    <thead>
        <tr>
            <th scope="col">#</th>
            @if($empType == 'employer')<th scope="col">Employer Name</th>@else<th scope="col">Employee Name</th>@endif
            <th scope="col">Street Address 1</th>
            <th scope="col">Street Address 2</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
            @if($empType == 'employer')<th scope="col">Telephone</th>@endif
        </tr>
    </thead>
    <tbody>
        @if($addressData->count() > 0)
            @foreach ($addressData as $key => $address)

                <tr style="border:1px solid #ddd;">
                    <td scope="row">{{ $addressData->firstItem() + $key }}</td>
                    <td>{{$address->name ?? ''}}</td>
                    <td>{{$address->address_1 ?? ''}}</td>
                    <td>{{$address->address_2 ?? ''}}</td>
                    <td>{{$address->city ?? ''}}</td>
                    <td>{{$address->full_state_name ?? ''}}</td>
                    <td>{{$address->zip_code ?? ''}}</td>
                    @if($empType == 'employer')<td>{{$address->tel ?? ''}}</td>@endif
                    <td style="padding-right:0; padding-left:0;" ><img class="editicon btn-edit"
                            src="images/icons/edit-icon.png" data-record="{{ $address->id }}"></td>
                    <td style="padding-right:0; padding-left:0;"><img class="dlticon btn-delete-add"
                            data-route="{{route('delete.address',$address->id)}}"
                            src="images/icons/del-icon.png"></td>
                </tr>

            @endforeach
        @else
        <tr style="border:1px solid #ddd;">
            <td colspan="9">Address data not available</td>
        </tr>
    @endif
    </tbody>
</table>
{{ $addressData->links() }}

