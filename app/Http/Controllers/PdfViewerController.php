<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDF;

class PdfViewerController extends Controller
{
    /**
     * Display the PDF Viewer & Testbench page.
     *
     * @param Request $request
     * @param string|null $formType
     * @param string|null $template
     * @return \Illuminate\View\View
     */
    public function index(Request $request, ?string $formType = 'usa', ?string $template = null)
    {
        $allTemplates = $this->discoverTemplates();

        if (!isset($allTemplates[$formType])) {
            $formType = array_key_first($allTemplates) ?? 'usa';
        }

        if (!$template || !in_array($template, $allTemplates[$formType] ?? [])) {
            $template = $allTemplates[$formType][0] ?? 'aegean';
        }

        $orientation = $request->query('orientation', 'portrait');

        return view('pdf-viewer', compact('allTemplates', 'formType', 'template', 'orientation'));
    }

    /**
     * Stream inline DomPDF output for the selected template.
     *
     * @param Request $request
     * @param string $formType
     * @param string $template
     * @return \Illuminate\Http\Response
     */
    public function streamPdf(Request $request, string $formType, string $template)
    {
        $orientation = $request->query('orientation', 'portrait');
        $invoiceData = $this->getDummyInvoiceData();

        $viewPath = "allForms.{$formType}.{$template}";
        
        // Handle root-level allForms templates if needed
        if ($formType === 'root') {
            $viewPath = "allForms.{$template}";
        }

        if (!view()->exists($viewPath)) {
            abort(404, "Template {$viewPath} not found.");
        }

        $html = view($viewPath, $invoiceData)->render();
        $processedHtml = $this->preprocessDomPdfHtml($html);

        // Temporarily suppress PHP 8.4+ vendor deprecation warnings (E_STRICT in DomPDF Helpers.php)
        $oldLevel = error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

        try {
            $pdf = PDF::loadHtml($processedHtml)
                ->setPaper('a4', $orientation)
                ->setOption('isRemoteEnabled', true)
                ->setOption('isHtml5ParserEnabled', true)
                ->setOption('chroot', [public_path(), storage_path()]);

            return $pdf->stream("{$template}.pdf");
        } finally {
            error_reporting($oldLevel);
        }
    }

    /**
     * Preprocess DomPDF HTML to convert all local image paths under public/images and public/user
     * into inline Base64 Data URIs. Prevents any DomPDF "Image not found or type unknown" errors.
     *
     * @param string $html
     * @return string
     */
    private function preprocessDomPdfHtml(string $html): string
    {
        return preg_replace_callback('/<img[^>]+src=["\']([^"\']+)["\']/i', function ($matches) {
            $imgPath = $matches[1];
            
            // Skip if already a base64 data URI
            if (str_starts_with($imgPath, 'data:')) {
                return $matches[0];
            }

            // Clean file protocols and normalize slashes
            $cleanPath = str_replace(['file:///', 'file://', 'file:'], '', $imgPath);
            $cleanPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $cleanPath);

            // Check if file exists directly on disk
            if (!File::exists($cleanPath)) {
                $relativeClean = ltrim(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $imgPath), DIRECTORY_SEPARATOR);
                $cleanPath = public_path($relativeClean);
            }

            // If file exists, convert to Base64 Data URI for 100% reliable DomPDF rendering
            if (File::exists($cleanPath)) {
                $ext = strtolower(pathinfo($cleanPath, PATHINFO_EXTENSION));
                $mime = match ($ext) {
                    'png' => 'image/png',
                    'jpg', 'jpeg' => 'image/jpeg',
                    'gif' => 'image/gif',
                    'svg' => 'image/svg+xml',
                    'webp' => 'image/webp',
                    default => 'image/png'
                };

                $imageData = File::get($cleanPath);
                $base64 = 'data:' . $mime . ';base64,' . base64_encode($imageData);
                return str_replace($imgPath, $base64, $matches[0]);
            }

            return $matches[0];
        }, $html);
    }

    /**
     * Discover all template files under resources/views/allForms.
     *
     * @return array
     */
    private function discoverTemplates(): array
    {
        $baseDir = resource_path('views/allForms');
        $templates = [];

        if (File::exists($baseDir)) {
            $dirs = File::directories($baseDir);
            foreach ($dirs as $dir) {
                $category = basename($dir);
                $files = File::files($dir);
                foreach ($files as $file) {
                    if (str_ends_with($file->getFilename(), '.blade.php')) {
                        $templates[$category][] = str_replace('.blade.php', '', $file->getFilename());
                    }
                }
            }

            // Root files in allForms
            $rootFiles = File::files($baseDir);
            foreach ($rootFiles as $file) {
                if (str_ends_with($file->getFilename(), '.blade.php')) {
                    $templates['root'][] = str_replace('.blade.php', '', $file->getFilename());
                }
            }
        }

        return $templates;
    }

    /**
     * Provide complete comprehensive sample invoice data for aegean.blade.php and all paystub templates.
     *
     * @return array
     */
    private function getDummyInvoiceData(): array
    {
        $requestData = [
            'watermark' => 'yes',
            'currency' => '$',
            'cname' => 'PaystubX Global Systems Corp',
            'company_name' => 'PaystubX Global Systems Corp',
            'address_1' => '100 Enterprise Way',
            'address_2' => 'Suite 400',
            'city' => 'New York',
            'state' => 'NY',
            'zip_code' => '10001',
            'company_address' => '100 Enterprise Way, Suite 400, New York, NY 10001',
            'company_ssn' => 'XX-XXXXXXX',
            'company_in' => '12-3456789',
            'control_number' => 'CN-90812',
            
            // Employee details
            'emp_name' => 'Alexander Vance',
            'employee_name' => 'Alexander Vance',
            'emp_first_name' => 'Alexander',
            'emp_last_name' => 'Vance',
            'emp_id' => '84578',
            'employee_id' => '84578',
            'emp_ssn' => '5678',
            'ssn' => '5678',
            'emp_street_1' => '742 Evergreen Terrace',
            'emp_street_2' => '',
            'emp_city' => 'Springfield',
            'emp_state' => 'OR',
            'emp_zip_code' => '97477',
            'emp_address' => '742 Evergreen Terrace, Springfield, OR 97477',
            'employee_address' => '742 Evergreen Terrace, Springfield, OR 97477',
            
            // Dates & Numbers
            'pay_start' => '2026-08-01',
            'pay_end' => '2026-08-15',
            'pay_period' => '08/01/2026 - 08/15/2026',
            'pay_date' => '2026-08-18',
            'stub_no' => '100452',
            'check_no' => '100452',
            'advice_number' => '452901',
            'account_number_last_4' => '4321',
            'transit_aba_number' => '98765',
            'marital_status' => 'Single',
            'exemptions' => '0',

            // Earnings Array for aegean.blade.php & advanced tables
            'earning' => [
                'Regular Pay',
                'Overtime Pay'
            ],
            'rate' => [
                45.00,
                67.50
            ],
            'hours' => [
                80.00,
                5.00
            ],
            'period' => [
                3600.00,
                337.50
            ],
            'ytd_total' => [
                43200.00,
                4050.00
            ],
            'period_gross_total' => 3937.50,
            'ytd_gross_total' => 47250.00,

            // Taxes Array for aegean.blade.php & advanced tables
            'taxes' => [
                'Federal Income Tax',
                'Social Security Tax',
                'Medicare Tax',
                'State Income Tax'
            ],
            'taxes_rate' => [
                420.00,
                244.13,
                57.09,
                180.00
            ],
            'taxes_ytd' => [
                5040.00,
                2929.56,
                685.08,
                2160.00
            ],
            'tax_deduction' => [],
            'period_tax_deduction' => [],
            'ytd_tax_deduction' => [],

            'deduction_tax' => 901.22,
            'total_net_pay' => 3036.28,
            'total_ytd_net_pay' => 36435.36,
            'gross_pay' => 3937.50,
            'wages' => 3937.50,
            'net_pay' => 3036.28,

            'fed_tax' => 420.00,
            'federal_tax' => 420.00,
            'state_tax' => 180.00,
            'state_income_tax' => 180.00,
            'state_wages' => 3937.50,
            'social_security' => 244.13,
            'ss_tax' => 244.13,
            'ss_wages' => 3937.50,
            'medicare' => 57.09,
            'medicare_tax' => 57.09,
            'medicare_wages' => 3937.50,

            // W-2 Specific attributes
            'ss_tips' => '0.00',
            'allocated_tips' => '0.00',
            'dependent_care' => '0.00',
            'nonqualified' => '0.00',
            'instructions_box_1' => '0.00',
            'instructions_box_2' => '0.00',
            'instructions_box_3' => '0.00',
            'instructions_box_4' => '0.00',
            'pie_1' => '',
            'pie_2' => '',
            'pie_3' => '',
            'pie_4' => '',
            'other' => '',
            'statutory_emp' => false,
            'retirement_plan' => false,
            'third_party_sick' => false,
            'employee_state_id' => 'ST-99881',
            'locality_name' => 'New York City',
            'local_wages' => '3937.50',
            'local_income_tax' => '115.20',

            // Miscellaneous
            'deposit_type' => 'Direct Deposit',
            'account_number' => 'XXXX-XXXX-4321',
            'routing_number' => '123456789',
            'logo' => null,
            'color' => '#587193',
            'date' => date('Y-m-d'),
        ];

        $invoiceData = $requestData;
        $invoiceData['requestData'] = $requestData;
        $invoiceData['invoiceData'] = $requestData;
        $invoiceData['data'] = $requestData;

        return $invoiceData;
    }
}
