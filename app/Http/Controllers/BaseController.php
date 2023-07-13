<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendSuccess($result,$message) {
        return response()->json([
            'success' => true,
            'data' => $result,
            'message' => $message
        ],200);
    }

    public function sendError($error,$errorMessage,$code = 404) {
        return response()->json([
            'success' => false,
            'data' => $error,
            'message' => $errorMessage
        ],$code);
    }
}
