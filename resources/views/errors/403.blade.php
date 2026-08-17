<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden - Security Shield Active</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { background: #f8fafc; font-family: 'Plus Jakarta Sans', sans-serif; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .security-card { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 36px; max-width: 480px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-center: center; }
    </style>
</head>
<body>
    <div class="security-card text-center">
        <div class="mb-3">
            <span class="p-3 rounded-circle d-inline-block" style="background: #ffe4e6; color: #e11d48; font-size: 32px;">🛡️</span>
        </div>
        <h2 style="font-size: 20px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">403 - Security Block Triggered</h2>
        <p style="font-size: 13px; color: #64748b; margin-bottom: 24px;">Your request was blocked by PaystubX Real-Time Web Application Firewall (WAF) Shield due to suspicious payload patterns.</p>
        <a href="{{ url('/') }}" class="btn btn-sm text-white" style="background: #4f46e5; border-radius: 6px; font-weight: 600; padding: 8px 24px;">Return to Safe Homepage</a>
    </div>
</body>
</html>
