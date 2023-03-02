<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function index()
    {
        // if(\Auth::guard('petugas')){
        //     return redirect('home/petugas');
        // }else if(\Auth::guard('masyarakat')){
        //     return redirect('home/masyarakat');
        // }
        return view('landing');
    }

    public function dashboard_masyarakat()
    {
        $pengaduan = Pengaduan::count();

        return view('_masyarakat.dashboard', compact('pengaduan'));
    }
    public function dashboard_petugas()
    {

        $unverified = Pengaduan::where('status', '0')->count();
        $process = Pengaduan::where('status', 'proses')->count();
        $verified = Pengaduan::where('status', 'selesai')->count();
        $pengaduan = Pengaduan::count();
        return view('_petugas.dashboard', compact('pengaduan' , 'unverified', 'process', 'verified'));
    }
}
