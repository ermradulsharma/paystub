
    <option data-name="" value="">Select Address</option>
            @foreach ($addressList ?? [] as $key => $address)
                <option data-name="{{ $address->name }}" data-address1="{{ $address->address_1 }}" data-address2="{{ $address->address_2 }}" data-city="{{ $address->city }}" data-state="{{ $address->state }}" data-zip="{{ $address->zip_code }}" data-emp_id="{{ $address->emp_id }}" data-emp_ssn="{{ $address->emp_ssn }}" value="{{ $address->name }}">{{ $address->name }}</option>
            @endforeach
    @if($type == 'employer')
    <option data-name="" value="add_address">Add New Address</option>
    @endif
    @if($type == 'employee')
    <option data-name="" value="add_address_1">Add New Address</option>
    @endif
s
