<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;

class GuruController extends Controller
{
    

    public function __construct()
    {
        $this->GuruModel = new GuruModel();
    }
    public function index()
    {
        $data = [
            'guru'=> $this->GuruModel->allData(),
        ];
       return view('v_guru',$data);
    }
    public function detail($id_guru)
    {
        $data = [
            'guru'=> $this->GuruModel->detailData($id_guru),
        ];
       return view('v_detailguru',$data);
       
    }
    public function add()
    {
        return view('v_addguru');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4|max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' =>'required|mimes:jpg,jpeg,png|max:1024',
        ],[
            'nip.required'=> 'WAJIB DIISI BRODY!',
            'nip.unique'=> 'NIP SUDAH ADA!',
            'nip.min' => 'Min 4 KARAKTER',
            'nip.max' => 'Maks 5 KARAKTER',
            'nama_guru.required'=> 'WAJIB DIISI BRODY!',
            'mapel.required'=> 'WAJIB DIISI BRODY!',
            'foto_guru.required'=> 'WAJIB UPLOAD BRODY!',
        ]);

        //upload gambar/foto
        
        $file = Request()->foto_guru;
        $fileName = Request()->nip .'.'. $file ->extension();
        $file->move(public_path('foto_guru'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto_guru' => $fileName,
        ];
        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan','Data Berhasil Di tambah');
    }
}
