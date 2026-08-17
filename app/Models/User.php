<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'social_id',
        'first_name',
        'last_name',
        'name',
        'email',
        'google_id',
        'code',
        'password',
        'country_code',
        'mobile',
        'image',
        'device_type',
        'device_token',
        'role_id',
        'subscription_type',
        'is_completed',
        'temp_mail',
        'usa_expiry_date',
        'uk_expiry_date',
        'canada_expiry_date',
        'expiryDate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function deactivateAccount($request)
    {
        $response['status'] = STATUS_BAD_REQUEST;
        $response['message'] = ENTER_VALID_CREDENTIAL;
        $userObj = User::find(Auth::user()->id);
        if ($userObj->delete()) {
            $response['message'] = ACCOUNT_DEACTIVATED_SUCCESSFULLY;
            $response['success'] = true;
            $response['status'] = STATUS_OK;
        }

        return $response;
    }

    public static function restoreAccount($request)
    {
        $requestData = $request->all();

        $userObj = User::withTrashed()->where('username', $requestData['username'])->orWhere('mobile', $requestData['username'])->orWhere('email', $requestData['username'])->first();
        if ($userObj) {
            if (Hash::check($request->get('password'), $userObj['password'])) {
                $userObj->restore();

                $response['status'] = STATUS_OK;
                $response['message'] = ACCOUNT_RESTORE_SUCCESSFULLY;
            } else {
                $response['status'] = STATUS_BAD_REQUEST;
                $response['message'] = ENTER_VALID_CREDENTIAL;
            }
        }

        return $response;
    }

    public static function deleteAccount($request)
    {
        $userObj = User::find(Auth::user()->id);
        PaySlip::where(['user_id' => Auth::user()->id])->forceDelete();
        $userObj->forceDelete();
        $request->user()->token()->revoke();

        $response['message'] = ACCOUNT_DELETED_SUCCESSFULLY;
        $response['success'] = true;
        $response['status'] = STATUS_OK;

        return $response;
    }
}
