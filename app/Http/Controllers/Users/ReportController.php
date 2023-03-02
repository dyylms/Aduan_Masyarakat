<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $tanggapan = Tanggapan::with(['petugas', 'pengaduan'])->get();
        return view('_admin.report', compact('tanggapan'));
    }

    public function generate_report()
    {
        $tanggapan = Tanggapan::with(['petugas', 'pengaduan'])->get();
        return view('_admin.generate_report', compact('tanggapan'));
    }
}
