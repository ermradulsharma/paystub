<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TemplatesController extends Controller
{
    public function getTemplate(Request $request)
    {
        $response = [];
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $dataObj = Template::getTemplate($request);
            if($dataObj['status'] == 200){
                $response['basic'] = $dataObj['basic'];
                $response['advance'] = $dataObj['advance'];

                $response['message'] = "Templates fetched successfully";
                $response['status'] = STATUS_OK;
                $response['success'] = TRUE;
            }

        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
}
