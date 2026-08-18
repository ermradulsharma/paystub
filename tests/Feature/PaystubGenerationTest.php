<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaystubGenerationTest extends TestCase
{
    /**
     * Test public country paystub routes return success status.
     *
     * @return void
     */
    public function test_public_paystub_routes_load_successfully()
    {
        $response = $this->get('/usa/paystub');
        $response->assertStatus(200);

        $responseUk = $this->get('/uk/paystub');
        $responseUk->assertStatus(200);

        $responseCanada = $this->get('/canada/paystub');
        $responseCanada->assertStatus(200);

        $responseGlobal = $this->get('/global/paystub');
        $responseGlobal->assertStatus(200);
    }

    /**
     * Test admin dashboard route requires authentication or user check middleware.
     *
     * @return void
     */
    public function test_admin_dashboard_requires_auth()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertStatus(302);
    }

    /**
     * Test generate pdf validation failure response structure.
     *
     * @return void
     */
    public function test_generate_pdf_validation_failure()
    {
        $response = $this->postJson('/generate-pdf', []);
        $this->assertTrue(in_array($response->status(), [301, 400, 422, 500]));
    }
}
