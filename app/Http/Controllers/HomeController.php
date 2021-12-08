<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
    $data = [
        'nama_sekolah'=>'SMA Muhammadiyah 2 Yogyakarta, telah ikut berjuang dan berpartisipasi dalam merebut dan mengisi kemerdekaan Negara Republik Indonesia dengan berbagai cara, salah satu cara yang ditempuh adalah dengan mendirikan tempat-tempat belajar bagi tunas-tunas Bangsa. SMA Muhammadiyah 2 Yogyakarta adalah salah satu bentuk perjuangan Muhammadiyah dalam dunia pendidikan tersebut. Berdiri sejak tanggal 2 Oktober 1950 di Jalan Kauman Nomor 44 rumah Bapak H. Syarbini dengan dua kelas satu, jurusan A (Sastra) dan B (Ilmu Pasti). Sampai saat ini, SMA Muhammadiya 2 Yogyakarta telah berkembang pesat. Didukung oleh para pengajar yang profesional dibidangnya masing-masing dan dengan ketersediaan sarana dan prasarana pembelajaran yang memadai akan mampu menghantarkan putra-putri Bangsa ini meraih cita-citanya',
        'alamat' =>'Jalan Kapas'
    ];
    return view('v_home',$data);
    }

    public function about($id)
    {
        return 'Ini Halaman About'.$id;
    }
}
