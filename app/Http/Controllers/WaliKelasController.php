<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function showDashboard () {
        return view('wali_kelas.dashboard');
    }
}
