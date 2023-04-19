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
            @if($address->type == 'employer')<td>{{$address->tel ?? ''}}</td>@endif
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
