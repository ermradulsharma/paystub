<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PaySlip extends Model
{
    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPdfAttribute($pdf = null)
    {
        return asset('uploads/mailData/'.$pdf);
    }

    protected $appends = ['membership'];

    public function getMembershipAttribute()
    {
        if (! Auth::check()) {
            return 0;
        }

        $subscription = Subscription::where(['user_id' => Auth::id(), 'country' => $this->type, 'device_type' => 'website'])
            ->whereDate('expiry_date', '>=', Carbon::now())
            ->first();

        return $subscription ? 1 : 0;
    }

    public static function generatePDF($request)
    {
        $service = app(\App\Services\PaystubService::class);
        return $service->generateAndStoreRecord($request->all());
    }
}
