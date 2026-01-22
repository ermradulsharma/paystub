<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewRoutesTest extends TestCase
{
    /** @test */
    public function root_route_works()
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test */
    public function privacy_route_works()
    {
        $this->get('/privacy')->assertStatus(200);
    }

    /** @test */
    public function terms_route_works()
    {
        $this->get('/terms')->assertStatus(200);
    }

    /** @test */
    public function refund_route_works()
    {
        $this->get('/refund')->assertStatus(200);
    }

    /** @test */
    public function contact_route_works()
    {
        $this->get('/contact')->assertStatus(200);
    }

    /** @test */
    public function w2form_paystub_route_works()
    {
        $this->get('/w2form/paystub')->assertStatus(200);
    }

    /** @test */
    public function usa_paystub_route_works()
    {
        $this->get('/usa/paystub')->assertStatus(200);
    }

    /** @test */
    public function canada_paystub_route_works()
    {
        $this->get('/canada/paystub')->assertStatus(200);
    }

    /** @test */
    public function uk_paystub_route_works()
    {
        $this->get('/uk/paystub')->assertStatus(200);
    }

    /** @test */
    public function user_dashboard_works()
    {
        $this->get('/userDashboard')->assertStatus(200);
    }

    /**
     * @test
     */
    public function protected_routes_should_require_login()
    {
        $protectedRoutes = [
            '/profile',
            '/invoiceList',
            '/subscription',
        ];

        foreach ($protectedRoutes as $route) {
            $response = $this->get($route);
            $response->assertRedirect('/');
        }
    }
}
