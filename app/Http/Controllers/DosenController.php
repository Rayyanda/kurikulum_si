<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    //
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'jabatan_fungsional' => 'required',
            'sertifikasi_dosen' => 'required',
            'bidang_pengajaran' => 'required',
            'qr_sign' =>'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imgSign = $request->file('qr_sign');

        if($imgSign){

            //menyimpan gambar baru
            $imgSign->storeAs('public/penyimpanan/dosen/sign', $imgSign->hashName());

        }else{
            $imgSign = null;
        }

        Dosen::create([
            'nama' => $request->nama,
            'jabatan_fungsional'=> $request->jabatan_fungsional,
            'sertifikasi_dosen' => $request->sertifikasi_dosen,
            'bidang_pengajaran' => $request->bidang_pengajaran,
            'qr_sign' => $imgSign->hashName(),
        ]);

        return redirect()->route('dosen.index')->with('success','Berhasil menambahkan data dosen');
    }

    public function edit($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jabatan_fungsional' => 'required',
            'sertifikasi_dosen' => 'required',
            'bidang_pengajaran' => 'required',
            'qr_sign' =>'image|mimes:png,jpg,jpeg|max:2048|nullable',
        ]);

        $dosen = Dosen::where('id','=',$id)->first();

        $imgSign = $request->file('qr_sign');

        if($imgSign){

            //menghapus gambar lama
            Storage::delete('public/penyimpanan/dosen/sign/'.$dosen->qr_sign);

            //menyimpan gambar baru
            $imgSign->storeAs('public/penyimpanan/dosen/sign', $imgSign->hashName());

        }else{
            $imgSign = null;
        }

        $dosen->update([
            'nama' => $request->nama,
            'jabatan_fungsional'=> $request->jabatan_fungsional,
            'sertifikasi_dosen' => $request->sertifikasi_dosen,
            'bidang_pengajaran' => $request->bidang_pengajaran,
            'qr_sign' => $imgSign ? $imgSign->hashName() : $dosen->qr_sign,
        ]);

        return redirect()->route('dosen.index')->with('success','Data berhasil di update');
    }

    public function destroy(Request $request,$id)
    {
        $dosen = Dosen::find($id);
        Storage::delete('public/penyimpanan/dosen/sign/'.$dosen->qr_sign);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success','Data di hapus');
    }

}
