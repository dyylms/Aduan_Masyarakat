<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:masyarakat')->only('create');
    }

    public function index(){
        return view('_pengaduan.index',[
            'pengaduan' => Pengaduan::with('masyarakat')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function index_petugas(){
        return view('_pengaduan.index',[
            'pengaduan' => Pengaduan::with('masyarakat')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function create(){
        return view('_pengaduan.create');
    }

    public function store(Request $request){
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes:jpg,png,gif,jpeg,svg|max:2048'
        ]);
        $file = $request->file('foto');
        $berkas = $file->move(public_path('pengaduan/berkas_pengaduan/'), time() . '-' . $file->getClientOriginalName());
        $data['foto'] = $berkas;
        Pengaduan::create([
            'isi_laporan' => $request->isi_laporan,
            'foto' => time() . '-' . $file->getClientOriginalName(),
            'tgl_pengaduan' => now(),
            'nik' => auth()->guard('masyarakat')->user()->nik,
            'status' => '0'
        ]);
        return redirect('pengaduan/index')->with('status', 'Data Pengaduan Berhasil dikirim');
    }

    public function show($id_pengaduan){

        $dec = Crypt::Decrypt($id_pengaduan);
        Pengaduan::where('id_pengaduan',$dec)->update(['status' => 'proses']);
        return view('_pengaduan.tanggapan', ['pengaduan' => Pengaduan::with('tanggapan')->where('id_pengaduan', $dec)->first()]);
    }

    public function detail($id_pengaduan)
    {
        $dec = Crypt::Decrypt($id_pengaduan);
        $pengaduan = Pengaduan::with('tanggapan')->where('id_pengaduan', $dec)->first();
        $tanggapan = Tanggapan::with('petugas')->where('id_pengaduan', $pengaduan->id_pengaduan)->first();
        return view('_pengaduan.detail_pengaduan', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
        ]);
    }

    public function create_tanggapan(Request $request, $id_pengaduan)
    {
        $request->validate(['tanggapan' => 'required']);
        Tanggapan::create([
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => now(),
            'tanggapan' => $request->tanggapan,
            'id_petugas' => Auth::guard('petugas')->user()->id_petugas,
        ]);
        Pengaduan::where(['id_pengaduan' => $id_pengaduan])->update(['status' => 'selesai']);
        return redirect()->route('halaman.pengaduan')->with('status', 'Tanggapan Berhasil dikirim');
    }

    public function status(Request $request, $id){
        $request->validate([
            'status' => 'required|in:selesai'
        ]);

        $dec = Crypt::decrypt($id);
        $pengaduan = Pengaduan::findOrfail($dec);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('status', 'Status Pengaduan Berhasil diubah');
    }
}
