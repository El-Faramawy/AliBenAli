<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function download($file_name) {
        $file_path = public_path('uploads/reports/'.$file_name);
        return response()->download($file_path);
    }
}
