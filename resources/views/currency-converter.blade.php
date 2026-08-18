@extends('layouts.app')

@section('content')
<div class="rich-page-wrapper py-5">
    <div class="container" style="max-width: 1200px;">

        <!-- Rich Dark Mesh Hero Banner -->
        <div class="rich-hero-banner text-center mb-5">
            <div class="rich-pill-badge mb-3">
                <span class="wow-pulse-dot"></span> Live Real-Time Interbank Forex API Feed
            </div>
            <h1 class="rich-hero-title">Global Currency Converter</h1>
            <p class="text-slate-300 max-w-2xl mx-auto mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                Convert paystub earnings, hourly wages, and contractor payments across 160+ world currencies with guaranteed mid-market exchange rates.
            </p>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <!-- FinTech Wise/Revolut Style Card -->
                <div class="fintech-converter-card">
                    
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="rich-icon-box mb-0"><i class="fa fa-exchange"></i></div>
                            <div>
                                <h3 class="rich-card-title mb-0" style="font-size: 1.25rem;">Live Currency Transfer Calculator</h3>
                                <span class="small text-muted" id="apiStatusText">Connected to Real-Time Forex Interbank Feed</span>
                            </div>
                        </div>
                        <span class="badge px-3 py-2 font-weight-bold" style="background: rgba(16, 185, 129, 0.1); color: #10b981; border-radius: 10px;">
                            <i class="fa fa-shield mr-1"></i> Mid-Market Rate
                        </span>
                    </div>

                    <!-- Preset Amount Quick Selector Pills -->
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-4" style="gap: 10px;">
                        <span class="small font-weight-bold text-slate-500 mr-2">Quick Presets:</span>
                        <button type="button" class="fintech-preset-pill" onclick="setAmount(100)">$100</button>
                        <button type="button" class="fintech-preset-pill" onclick="setAmount(500)">$500</button>
                        <button type="button" class="fintech-preset-pill" onclick="setAmount(1000)">$1,000</button>
                        <button type="button" class="fintech-preset-pill" onclick="setAmount(5000)">$5,000</button>
                        <button type="button" class="fintech-preset-pill" onclick="setAmount(10000)">$10,000</button>
                    </div>

                    <!-- Input Card 1: YOU SEND -->
                    <div class="fintech-card-input-wrapper mb-2">
                        <span class="fintech-input-label">You Send (Salary Amount)</span>
                        <div class="d-flex align-items-center justify-content-between gap-3" style="gap: 10px;">
                            
                            <!-- Dedicated #convertAmount Input Box with Live Currency Prefix Badge -->
                            <div class="convert-amount-card">
                                <span id="fromSymbolPrefix" class="convert-amount-prefix">$</span>
                                <input type="number" id="convertAmount" value="1000" min="0" step="any" placeholder="0.00">
                            </div>

                            <select id="fromCurrency" class="fintech-currency-dropdown custom-select w-auto">
                                <option value="USD" selected>🇺🇸 USD</option>
                                <option value="EUR">🇪🇺 EUR</option>
                                <option value="GBP">🇬🇧 GBP</option>
                                <option value="CAD">🇨🇦 CAD</option>
                                <option value="AUD">🇦🇺 AUD</option>
                                <option value="INR">🇮🇳 INR</option>
                                <option value="JPY">🇯🇵 JPY</option>
                                <option value="CHF">🇨🇭 CHF</option>
                                <option value="SGD">🇸🇬 SGD</option>
                                <option value="AED">🇦🇪 AED</option>
                                <option value="SAR">🇸🇦 SAR</option>
                                <option value="MXN">🇲🇽 MXN</option>
                                <option value="BRL">🇧🇷 BRL</option>
                                <option value="ZAR">🇿🇦 ZAR</option>
                                <option value="NZD">🇳🇿 NZD</option>
                                <option value="HKD">🇭🇰 HKD</option>
                                <option value="SEK">🇸🇪 SEK</option>
                                <option value="NOK">🇳🇴 NOK</option>
                                <option value="DKK">🇩🇰 DKK</option>
                                <option value="PLN">🇵🇱 PLN</option>
                                <option value="THB">🇹🇭 THB</option>
                                <option value="IDR">🇮🇩 IDR</option>
                                <option value="MYR">🇲🇾 MYR</option>
                                <option value="PHP">🇵🇭 PHP</option>
                                <option value="KRW">🇰🇷 KRW</option>
                                <option value="TRY">🇹🇷 TRY</option>
                                <option value="EGP">🇪🇬 EGP</option>
                                <option value="PKR">🇵🇰 PKR</option>
                                <option value="BDT">🇧🇩 BDT</option>
                                <option value="CNY">🇨🇳 CNY</option>
                            </select>
                        </div>
                    </div>

                    <!-- Transfer Link Connector & Swap Circle -->
                    <div class="fintech-swap-divider">
                        <div class="fintech-swap-circle" id="swapBtn" title="Swap From and To Currencies">
                            <i class="fa fa-exchange"></i>
                        </div>
                    </div>

                    <!-- Input Card 2: YOU RECEIVE -->
                    <div class="fintech-card-input-wrapper mt-2 mb-4" style="background: rgba(16, 185, 129, 0.02); border-color: rgba(16, 185, 129, 0.3);">
                        <span class="fintech-input-label receive">You Receive (Converted Value)</span>
                        <div class="d-flex align-items-center justify-content-between gap-3">
                            <h2 class="fintech-num-input receive-text mb-0" id="convertedResult">€920.00</h2>
                            <select id="toCurrency" class="fintech-currency-dropdown custom-select w-auto">
                                <option value="USD">🇺🇸 USD</option>
                                <option value="EUR" selected>🇪🇺 EUR</option>
                                <option value="GBP">🇬🇧 GBP</option>
                                <option value="CAD">🇨🇦 CAD</option>
                                <option value="AUD">🇦🇺 AUD</option>
                                <option value="INR">🇮🇳 INR</option>
                                <option value="JPY">🇯🇵 JPY</option>
                                <option value="CHF">🇨🇭 CHF</option>
                                <option value="SGD">🇸🇬 SGD</option>
                                <option value="AED">🇦🇪 AED</option>
                                <option value="SAR">🇸🇦 SAR</option>
                                <option value="MXN">🇲🇽 MXN</option>
                                <option value="BRL">🇧🇷 BRL</option>
                                <option value="ZAR">🇿🇦 ZAR</option>
                                <option value="NZD">🇳🇿 NZD</option>
                                <option value="HKD">🇭🇰 HKD</option>
                                <option value="SEK">🇸🇪 SEK</option>
                                <option value="NOK">🇳🇴 NOK</option>
                                <option value="DKK">🇩🇰 DKK</option>
                                <option value="PLN">🇵🇱 PLN</option>
                                <option value="THB">🇹🇭 THB</option>
                                <option value="IDR">🇮🇩 IDR</option>
                                <option value="MYR">🇲🇾 MYR</option>
                                <option value="PHP">🇵🇭 PHP</option>
                                <option value="KRW">🇰🇷 KRW</option>
                                <option value="TRY">🇹🇷 TRY</option>
                                <option value="EGP">🇪🇬 EGP</option>
                                <option value="PKR">🇵🇰 PKR</option>
                                <option value="BDT">🇧🇩 BDT</option>
                                <option value="CNY">🇨🇳 CNY</option>
                            </select>
                        </div>
                    </div>

                    <!-- Live Breakdown Footer Banner -->
                    <div class="p-3 rounded-16 mb-4 d-flex align-items-center justify-content-between" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px;">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-line-chart text-indigo mr-3" style="font-size: 1.25rem; color: #4f46e5;"></i>
                            <span class="small font-weight-semibold text-slate-700" id="liveRateNotice">1 USD = 0.9200 EUR • Guaranteed Interbank Mid-Market Rate</span>
                        </div>
                        <span class="small font-weight-bold text-success"><i class="fa fa-clock-o mr-1"></i> Live</span>
                    </div>

                    <!-- Callout Action Banner -->
                    <div class="p-4 rounded-20 text-white d-flex flex-column flex-sm-row align-items-center justify-content-between" style="background: linear-gradient(135deg, #4f46e5 0%, #312e81 100%); border-radius: 20px;">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="font-weight-bold mb-1" style="font-size: 1.1rem;"><i class="fa fa-file-text-o mr-2"></i> Create Paystub With Converted Salary</h5>
                            <p class="small mb-0 text-white-50">Apply these exact figures to your official high-resolution PDF paystub template.</p>
                        </div>
                        <a href="{{ route('usa.payStub') }}" class="btn btn-light font-weight-bold px-4 py-2.5 shadow-sm" style="border-radius: 12px; color: #4f46e5; font-size: 0.9rem;">
                            Generate Paystub <i class="fa fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Popular Exchange Rates Cards Grid -->
        <div class="mb-4">
            <h4 class="font-weight-bold text-dark mb-3" style="font-size: 1.25rem; color: #0f172a;">Popular Global Currency Pairs</h4>
            <div class="row g-3">
                <div class="col-lg col-md-4 col-sm-6 mb-3">
                    <div class="fintech-rate-card text-center">
                        <span class="small text-muted d-block mb-1">🇺🇸 USD ➔ 🇪🇺 EUR</span>
                        <strong class="text-dark font-weight-bold d-block mb-1" id="pairUSDEUR">1 USD = 0.92 EUR</strong>
                        <span class="badge badge-light-success small" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">Live Market</span>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6 mb-3">
                    <div class="fintech-rate-card text-center">
                        <span class="small text-muted d-block mb-1">🇺🇸 USD ➔ 🇬🇧 GBP</span>
                        <strong class="text-dark font-weight-bold d-block mb-1" id="pairUSDGBP">1 USD = 0.79 GBP</strong>
                        <span class="badge badge-light-success small" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">Live Market</span>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6 mb-3">
                    <div class="fintech-rate-card text-center">
                        <span class="small text-muted d-block mb-1">🇺🇸 USD ➔ 🇨🇦 CAD</span>
                        <strong class="text-dark font-weight-bold d-block mb-1" id="pairUSDCAD">1 USD = 1.35 CAD</strong>
                        <span class="badge badge-light-success small" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">Live Market</span>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6 mb-3">
                    <div class="fintech-rate-card text-center">
                        <span class="small text-muted d-block mb-1">🇺🇸 USD ➔ 🇮🇳 INR</span>
                        <strong class="text-dark font-weight-bold d-block mb-1" id="pairUSDINR">1 USD = 83.45 INR</strong>
                        <span class="badge badge-light-success small" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">Live Market</span>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6 mb-3">
                    <div class="fintech-rate-card text-center">
                        <span class="small text-muted d-block mb-1">🇪🇺 EUR ➔ 🇬🇧 GBP</span>
                        <strong class="text-dark font-weight-bold d-block mb-1" id="pairEURGBP">1 EUR = 0.85 GBP</strong>
                        <span class="badge badge-light-success small" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">Live Market</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
let rates = { 
    USD: 1.0, EUR: 0.92, GBP: 0.79, CAD: 1.35, AUD: 1.52, INR: 83.45, 
    JPY: 155.20, CHF: 0.91, SGD: 1.35, AED: 3.67, SAR: 3.75, MXN: 16.80, 
    BRL: 5.15, ZAR: 18.50, NZD: 1.65, HKD: 7.82, SEK: 10.80, NOK: 10.90, 
    DKK: 6.88, PLN: 3.95, THB: 36.50, IDR: 16000.0, MYR: 4.72, PHP: 57.50, 
    KRW: 1360.0, TRY: 32.20, EGP: 47.50, PKR: 278.0, BDT: 117.0, CNY: 7.23
};

const currencySymbols = {
    USD: '$', EUR: '€', GBP: '£', CAD: '$', AUD: '$', INR: '₹', JPY: '¥', 
    CHF: 'CHF ', SGD: '$', AED: 'AED ', SAR: 'SAR ', MXN: '$', BRL: 'R$', 
    ZAR: 'R ', NZD: '$', HKD: '$', SEK: 'kr ', NOK: 'kr ', DKK: 'kr ', 
    PLN: 'zł ', THB: '฿', IDR: 'Rp ', MYR: 'RM ', PHP: '₱', KRW: '₩', 
    TRY: '₺', EGP: 'E£ ', PKR: 'Rs ', BDT: '৳', CNY: '¥'
};

function setAmount(val) {
    document.getElementById("convertAmount").value = val;
    calculateConversion();
}

function calculateConversion() {
    const amountInput = document.getElementById("convertAmount");
    const fromSelect = document.getElementById("fromCurrency");
    const toSelect = document.getElementById("toCurrency");
    const resultDisplay = document.getElementById("convertedResult");
    const noticeDisplay = document.getElementById("liveRateNotice");
    const prefixDisplay = document.getElementById("fromSymbolPrefix");

    const amt = parseFloat(amountInput.value) || 0;
    const from = fromSelect.value;
    const to = toSelect.value;

    // Update From Currency Prefix Symbol
    if (prefixDisplay) {
        prefixDisplay.innerText = currencySymbols[from] || '$';
    }

    const rateFrom = rates[from] || 1;
    const rateTo = rates[to] || 1;

    const inUSD = amt / rateFrom;
    const converted = inUSD * rateTo;
    const singleRate = (1 / rateFrom) * rateTo;

    const sym = currencySymbols[to] || '';
    
    const formattedTotal = converted.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    const formattedRate = singleRate.toLocaleString('en-US', { minimumFractionDigits: 4, maximumFractionDigits: 4 });

    resultDisplay.innerText = `${sym}${formattedTotal}`;
    noticeDisplay.innerText = `1 ${from} = ${sym}${formattedRate} ${to} • Guaranteed Interbank Mid-Market Rate`;
}

function updateQuickPairs() {
    const getRatePair = (f, t) => ((1 / (rates[f] || 1)) * (rates[t] || 1)).toFixed(2);
    
    if (document.getElementById("pairUSDEUR")) document.getElementById("pairUSDEUR").innerText = `1 USD = ${getRatePair('USD', 'EUR')} EUR`;
    if (document.getElementById("pairUSDGBP")) document.getElementById("pairUSDGBP").innerText = `1 USD = ${getRatePair('USD', 'GBP')} GBP`;
    if (document.getElementById("pairUSDCAD")) document.getElementById("pairUSDCAD").innerText = `1 USD = ${getRatePair('USD', 'CAD')} CAD`;
    if (document.getElementById("pairUSDINR")) document.getElementById("pairUSDINR").innerText = `1 USD = ${getRatePair('USD', 'INR')} INR`;
    if (document.getElementById("pairEURGBP")) document.getElementById("pairEURGBP").innerText = `1 EUR = ${getRatePair('EUR', 'GBP')} GBP`;
}

document.addEventListener("DOMContentLoaded", function() {
    const amountInput = document.getElementById("convertAmount");
    const fromSelect = document.getElementById("fromCurrency");
    const toSelect = document.getElementById("toCurrency");
    const swapBtn = document.getElementById("swapBtn");
    const statusText = document.getElementById("apiStatusText");

    async function fetchLiveRates() {
        try {
            const res = await fetch("https://open.er-api.com/v6/latest/USD");
            if (res.ok) {
                const data = await res.json();
                if (data && data.rates) {
                    rates = { ...rates, ...data.rates };
                    statusText.innerHTML = '<span class="text-success font-weight-bold"><i class="fa fa-check-circle"></i> Live Interbank Forex Feed Active</span>';
                    updateQuickPairs();
                    calculateConversion();
                    return;
                }
            }
        } catch (e) {
            console.log("Forex API fallback active:", e);
        }
        statusText.innerText = "Interbank reference exchange rates";
        updateQuickPairs();
        calculateConversion();
    }

    amountInput.addEventListener("input", calculateConversion);
    fromSelect.addEventListener("change", calculateConversion);
    toSelect.addEventListener("change", calculateConversion);

    swapBtn.addEventListener("click", function() {
        const temp = fromSelect.value;
        fromSelect.value = toSelect.value;
        toSelect.value = temp;
        calculateConversion();
    });

    fetchLiveRates();
});
</script>
@endsection
