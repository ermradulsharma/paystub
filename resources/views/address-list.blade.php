@if($addressData->count() > 0)
    @foreach ($addressData as $key => $address)

        <tr style="border:1px solid #ddd;">
            <th scope="row">{{ $addressData->firstItem() + $key }}</th>
            <td>{{$address->name ?? ''}}</td>
            <td>{{$address->address_1 ?? ''}}</td>
            <td>{{$address->address_2 ?? ''}}</td>
            <td>{{$address->city ?? ''}}</td>
            <td>{{$address->state ?? ''}}</td>
            <td>{{$address->zip_code ?? ''}}</td>
            <td style="padding-right:0; padding-left:0;" ><img style="width:22px;"
                    src="images/icons/edit-icon.png" class="btn-edit" data-record="{{ $address->id }}"></td>
            <td style="padding-right:0; padding-left:0;"><img style="width:20px;"
                    src="images/icons/del-icon.png"></td>
        </tr>
        
    @endforeach
@else
<tr style="border:1px solid #ddd;"> 
    <td colspan="9">Address data not available</td>
</tr>
@endif