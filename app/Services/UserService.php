<?php

namespace App\Services;

use App\Models\Address;
use App\Models\PaySlip;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService
{
    /**
     * Store new address for authenticated user.
     *
     * @param array $data
     * @param int $userId
     * @return array
     */
    public function storeAddress(array $data, int $userId): array
    {
        $address = new Address();
        $address->user_id = $userId;
        $address->type = $data['type'];
        $address->name = $data['name'];
        $address->tel = $data['tel'] ?? '';
        $address->address_1 = $data['address_1'];
        $address->address_2 = $data['address_2'] ?? '';
        $address->city = $data['city'];
        $address->state = $data['state'];
        $address->zip_code = $data['zip_code'];
        if ($data['type'] === 'employee') {
            $address->emp_id = $data['emp_id'] ?? '';
            $address->emp_ssn = $data['emp_ssn'] ?? '';
        }

        $address->save();

        return [
            'success' => true,
            'status' => 200,
            'message' => 'Address saved successfully',
            'data' => $address,
        ];
    }

    /**
     * Update existing address with strict user ownership guard.
     *
     * @param array $data
     * @param int $userId
     * @return array
     */
    public function updateAddress(array $data, int $userId): array
    {
        $address = Address::where(['id' => $data['address_id'], 'user_id' => $userId])->first();
        if (!$address) {
            return [
                'success' => false,
                'status' => 400,
                'message' => "Address doesn't exist or is unauthorized.",
            ];
        }

        $address->type = $data['type'];
        $address->name = $data['name'];
        if ($data['type'] === 'employer') {
            $address->tel = $data['tel'] ?? '';
        }
        $address->address_1 = $data['address_1'];
        $address->address_2 = $data['address_2'] ?? '';
        $address->city = $data['city'];
        $address->state = $data['state'];
        $address->zip_code = $data['zip_code'];
        if ($data['type'] === 'employee') {
            $address->emp_id = $data['emp_id'] ?? '';
            $address->emp_ssn = $data['emp_ssn'] ?? '';
        }

        $address->save();

        return [
            'success' => true,
            'status' => 200,
            'message' => 'Address updated successfully',
            'data' => $address,
        ];
    }

    /**
     * Bulk delete user addresses with ownership verification.
     *
     * @param array $addressIds
     * @param int $userId
     * @return array
     */
    public function deleteAddresses(array $addressIds, int $userId): array
    {
        $deletedCount = Address::where('user_id', $userId)
            ->whereIn('id', $addressIds)
            ->delete();

        return [
            'success' => $deletedCount > 0,
            'status' => $deletedCount > 0 ? 200 : 400,
            'message' => $deletedCount > 0 ? 'Address deleted successfully' : 'Address deletion failed or unauthorized',
        ];
    }

    /**
     * Get user addresses filtered by type.
     *
     * @param int $userId
     * @param string|null $type
     * @return array
     */
    public function getUserAddresses(int $userId, ?string $type = null): array
    {
        $query = Address::where('user_id', $userId)->orderBy('id', 'desc');
        if ($type) {
            $query->where('type', $type);
        }

        return [
            'success' => true,
            'status' => 200,
            'data' => $query->get(),
        ];
    }

    /**
     * Soft delete user account.
     *
     * @param int $userId
     * @return array
     */
    public function deactivateAccount(int $userId): array
    {
        $user = User::find($userId);
        if ($user && $user->delete()) {
            return [
                'success' => true,
                'status' => 200,
                'message' => 'Account deactivated successfully',
            ];
        }

        return [
            'success' => false,
            'status' => 400,
            'message' => 'Unable to deactivate account',
        ];
    }

    /**
     * Restore soft deleted user account.
     *
     * @param string $username
     * @param string $password
     * @return array
     */
    public function restoreAccount(string $username, string $password): array
    {
        $user = User::withTrashed()
            ->where('username', $username)
            ->orWhere('email', $username)
            ->orWhere('mobile', $username)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            $user->restore();
            return [
                'success' => true,
                'status' => 200,
                'message' => 'Account restored successfully',
            ];
        }

        return [
            'success' => false,
            'status' => 400,
            'message' => 'Invalid credentials or user not found',
        ];
    }

    /**
     * Force delete user account and associated records in a transaction.
     *
     * @param int $userId
     * @return array
     */
    public function deleteAccount(int $userId): array
    {
        return DB::transaction(function () use ($userId) {
            PaySlip::where('user_id', $userId)->forceDelete();
            Address::where('user_id', $userId)->forceDelete();
            
            $user = User::find($userId);
            if ($user) {
                $user->forceDelete();
            }

            return [
                'success' => true,
                'status' => 200,
                'message' => 'Account permanently deleted',
            ];
        });
    }
}
