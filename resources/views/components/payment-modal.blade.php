@props(['id' => 'paymentModal', 'amount' => '0.00', 'currency' => 'USD'])

<!-- Payment Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">Complete Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3>Total: {{ $currency }} <span id="payment-amount">{{ $amount }}</span></h3>
                    <p class="text-muted">Secure payment via PayPal</p>
                </div>

                <div id="paypal-button-container"></div>

                <form id="payment-form" action="{{ route('payment.process') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="amount" id="form-amount" value="{{ $amount }}">
                    <input type="hidden" name="currency" value="{{ $currency }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitPayment()">Pay Now</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitPayment() {
        // This function simulates the payment submission. 
        // In a real integration with PayPal JS SDK, you would handle the button click 
        // or smart buttons rendering here. For this server-side integration flow:
        document.getElementById('payment-form').submit();
    }
</script>
