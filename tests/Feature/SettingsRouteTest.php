<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingsRouteTest extends TestCase
{
    // use RefreshDatabase; // Be careful strictly using this on existing DB without config

    public function test_settings_route_redirects_on_validation_error()
    {
        // Mock auth
        $user = User::first();
        if (!$user) {
            $this->markTestSkipped('No user found');
        }
        $this->actingAs($user);

        // Try to change password with invalid data
        $response = $this->post(route('settings'), [
            'request_type' => 'change_password',
            'old_password' => 'short',
            'password' => 'mismatch',
            'password_confirmation' => 'other',
        ]);

        // Should verify it redirects back to settings
        $response->assertRedirect(route('settings'));

        // Also check if session has errors
        $response->assertSessionHasErrors(['old_password', 'password']);
    }

    public function test_settings_implict_return()
    {
        // Mock auth
        $user = User::first();
        if (!$user) {
            $this->markTestSkipped('No user found');
        }
        $this->actingAs($user);

        // Post with NO request_type or invalid one
        $response = $this->post(route('settings'), [
            'request_type' => 'invalid_type_xyz',
        ]);

        // If it returns null, this might fail or show 500
        // We expect a redirect or some response. 
        // If it fails, we found a bug.
        $response->assertStatus(200); // or 302
    }
}
