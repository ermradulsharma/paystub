<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AddressBookController extends Controller
{
    public function fetchAddress(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            }
            $empType = $request->type;
            $addressData = Address::where(['type' => $empType, 'user_id' => Auth::id()])->orderBy('id', 'DESC')->paginate(10);
            if ($request->ajax()) {
                return view('address-list', compact('addressData', 'empType'));
            }
            // return response()->json(['user' => $addressData,'message' => 'Address fetch successfully.']);
        } catch (\Exception $e) {
            Log::info('Fetch Address Function', ['Exception' => $e->getMessage()]);

            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    public function fetchAddressById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'record' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            }

            $addressData = Address::where(['id' => $request->record])->first();

            return response()->json(['addressObj' => $addressData]);
        } catch (\Exception $e) {
            Log::info('Fetch AddressById Function', ['Exception' => $e->getMessage()]);

            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    public function storeAddress(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type' => 'required',
                'fullName' => 'required',
                'addressLine1' => 'required',
                // 'addressLine2' => 'required',
                'cityName' => 'required',
                'stateName' => 'required',
                'zipCode' => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            }
            if (! $request->addressId) {
                $addressObj = new Address();
                $addressObj->user_id = Auth::id();
                $addressObj->type = $request->type ?? '';
                $addressObj->name = $request->fullName ?? '';
                $addressObj->tel = $request->tel ?? '';
                $addressObj->address_1 = $request->addressLine1 ?? '';
                $addressObj->address_2 = $request->addressLine2 ?? '';
                $addressObj->city = $request->cityName ?? '';
                $addressObj->state = $request->stateName ?? '';
                $addressObj->zip_code = $request->zipCode ?? '';
                $addressObj->emp_id = $request->emp_id ?? '';
                $addressObj->emp_ssn = $request->emp_ssn ?? '';
                if ($addressObj->save()) {
                    return response()->json(['pageReload' => 'no', 'message' => 'Address saved successfully.']);
                }
            } else {
                $addressObj = Address::where('id', $request->addressId)->first();
                $addressObj->type = $request->type ?? '';
                $addressObj->name = $request->fullName ?? '';
                $addressObj->tel = $request->tel ?? '';
                $addressObj->address_1 = $request->addressLine1 ?? '';
                $addressObj->address_2 = $request->addressLine2 ?? '';
                $addressObj->city = $request->cityName ?? '';
                $addressObj->state = $request->stateName ?? '';
                $addressObj->zip_code = $request->zipCode ?? '';
                $addressObj->emp_id = $request->emp_id ?? '';
                $addressObj->emp_ssn = $request->emp_ssn ?? '';
                if ($addressObj->save()) {
                    return response()->json(['pageReload' => 'no', 'message' => 'Address update successfully.']);
                }
            }

            return response()->json(['error' => 'Address saved unsuccessfull.']);
        } catch (\Exception $e) {
            Log::info('Store Address Function', ['Exception' => $e->getMessage()]);

            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    public function deleteAddress($id)
    {
        try {
            if (Address::find($id)->delete()) {
                // return redirect()->back()->with('message', 'Address deleted successfully');
                return response()->json(['pageReload' => 'no', 'message' => 'Address deleted successfully.']);
            }

            return response()->json(['pageReload' => 'no', 'message' => 'Address deleted unsuccessfull.']);
            // return edirect()->back()->with('error' , 'Address deleted unsuccessfull.');
        } catch (\Exception $e) {
            Log::info('Delete Address Function', ['Exception' => $e->getMessage()]);

            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    public function addressOptions(Request $request)
    {
        try {

            $employerData = $employeeData = '';
            if ($request->ajax()) {

                $addressList = Address::where(['type' => 'employer', 'user_id' => $request->user()->id])->get();
                $type = 'employer';
                $employerData = view('address-options', compact('addressList', 'type'))->render();

                $addressList = Address::where(['type' => 'employee', 'user_id' => $request->user()->id])->get();
                $type = 'employee';
                $employeeData = view('address-options', compact('addressList', 'type'))->render();

                return response()->json(['employerData' => $employerData, 'employeeData' => $employeeData]);
            }
            // return response()->json(['user' => $addressData,'message' => 'Address fetch successfully.']);
        } catch (\Exception $e) {
            Log::info('Fetch Address Function', ['Exception' => $e->getMessage()]);

            return response()->json(['error' => 'Something went wrong.']);
        }
    }
}
