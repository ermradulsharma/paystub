<?php

namespace Tests\Unit;

use App\Services\PayPalService;
use Mockery;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Tests\TestCase;

class PayPalServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_create_order_returns_response()
    {
        // Mock the PayPalClient
        $mockProvider = Mockery::mock(PayPalClient::class);
        // Methods are NOT called when provider is injected
        // $mockProvider->shouldReceive('setApiCredentials')->once();
        // $mockProvider->shouldReceive('getAccessToken')->once();
        $mockProvider->shouldReceive('createOrder')->once()->with(Mockery::type('array'))->andReturn([
            'id' => 'ORDER-123',
            'status' => 'CREATED',
            'links' => [['rel' => 'approve', 'href' => 'http://paypal.com/approve']],
        ]);

        // Initialize Service with Mock Provider
        $service = new PayPalService($mockProvider);

        // Execute
        $result = $service->createOrder(100.00);

        // Assert
        $this->assertIsArray($result);
        $this->assertEquals('CREATED', $result['status']);
        $this->assertEquals('ORDER-123', $result['id']);
    }
}
