@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 1100px; margin-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm p-4" style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0;">
                <div class="text-center mb-4">
                    <h2 style="font-family: 'Outfit', sans-serif; font-weight: 800; color: #115cae;">🌐 Global Currency Exchange Converter</h2>
                    <p class="text-muted" style="font-size: 15px;">Convert paystub salary figures and earnings live across USD, EUR, GBP, CAD, AUD, and INR.</p>
                </div>

                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold" style="color: #457bbe;">Salary Amount</label>
                        <input type="number" id="convertAmount" class="form-control form-control-lg py-3" style="border-radius: 10px; border: 1px solid #cbd5e1; font-size: 18px; font-weight: 600;" value="1000">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold" style="color: #457bbe;">From Currency</label>
                        <select id="fromCurrency" class="form-control form-control-lg" style="border-radius: 10px; border: 1px solid #cbd5e1; height: 50px; font-size: 16px; font-weight: 600;">
                            <option value="USD" selected>USD ($)</option>
                            <option value="EUR">EUR (€)</option>
                            <option value="GBP">GBP (£)</option>
                            <option value="CAD">CAD ($)</option>
                            <option value="INR">INR (₹)</option>
                        </select>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label class="form-label font-weight-bold" style="color: #457bbe;">Converted Value</label>
                        <div class="p-3 text-center" style="background: #f0fdf4; border-radius: 12px; border: 2px solid #bbf7d0;">
                            <h3 class="mb-0" id="convertedResult" style="color: #16a34a; font-weight: 800; font-family: 'Outfit', sans-serif;">€920.00 EUR</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const rates = { USD: 1.0, EUR: 0.92, GBP: 0.79, CAD: 1.35, INR: 83.12 };

    function convert() {
        const amt = parseFloat(document.getElementById("convertAmount").value) || 0;
        const from = document.getElementById("fromCurrency").value;
        
        const inUSD = amt / rates[from];
        const eur = inUSD * rates["EUR"];

        document.getElementById("convertedResult").innerText = "€" + eur.toFixed(2) + " EUR";
    }

    document.getElementById("convertAmount").addEventListener("input", convert);
    document.getElementById("fromCurrency").addEventListener("change", convert);
});
</script>
@endsection
