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
            $template = $allTemplates[$formType][0] ?? 'paystubx';
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

        $pdf = PDF::loadView($viewPath, $invoiceData)
            ->setPaper('a4', $orientation)
            ->setOption('isRemoteEnabled', true);

        return $pdf->stream("{$template}.pdf");
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
     * Provide comprehensive sample invoice data to ensure zero missing variable errors during PDF rendering.
     *
     * @return array
     */
    private function getDummyInvoiceData(): array
    {
        $requestData = [
            'watermark' => 'yes',
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
            'emp_name' => 'Alexander Vance',
            'employee_name' => 'Alexander Vance',
            'emp_first_name' => 'Alexander',
            'emp_last_name' => 'Vance',
            'emp_id' => 'EMP-84578',
            'employee_id' => 'EMP-84578',
            'emp_ssn' => '5678',
            'ssn' => '5678',
            'emp_street_1' => '742 Evergreen Terrace',
            'emp_street_2' => '',
            'emp_city' => 'Springfield',
            'emp_state' => 'OR',
            'emp_zip_code' => '97477',
            'emp_address' => '742 Evergreen Terrace, Springfield, OR 97477',
            'employee_address' => '742 Evergreen Terrace, Springfield, OR 97477',
            'pay_start' => '2026-08-01',
            'pay_end' => '2026-08-15',
            'pay_period' => '08/01/2026 - 08/15/2026',
            'pay_date' => '2026-08-18',
            'stub_no' => '100452',
            'check_no' => '100452',
            'rate' => '45.00',
            'hours' => '80',
            'gross_pay' => '3600.00',
            'wages' => '3600.00',
            'net_pay' => '2840.00',
            'fed_tax' => '420.00',
            'federal_tax' => '420.00',
            'state_tax' => '180.00',
            'state_income_tax' => '180.00',
            'state_wages' => '3600.00',
            'social_security' => '223.20',
            'ss_tax' => '223.20',
            'ss_wages' => '3600.00',
            'medicare' => '52.20',
            'medicare_tax' => '52.20',
            'medicare_wages' => '3600.00',
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
            'local_wages' => '3600.00',
            'local_income_tax' => '115.20',
            'total_deductions' => '760.00',
            'ytd_gross' => '43200.00',
            'ytd_net' => '34080.00',
            'ytd_fed_tax' => '5040.00',
            'ytd_state_tax' => '2160.00',
            'ytd_social_security' => '2678.40',
            'ytd_medicare' => '626.40',
            'ytd_deductions' => '9120.00',
            'deposit_type' => 'Direct Deposit',
            'account_number' => 'XXXX-XXXX-4321',
            'routing_number' => '123456789',
            'check_number' => '100452',
            'logo' => null,
            'color' => '#4f46e5',
            'date' => date('Y-m-d'),
        ];

        $invoiceData = $requestData;
        $invoiceData['requestData'] = $requestData;
        $invoiceData['invoiceData'] = $requestData;
        $invoiceData['data'] = $requestData;

        return $invoiceData;
    }
}
