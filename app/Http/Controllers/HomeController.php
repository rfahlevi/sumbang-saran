<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SumbangSaran;
use App\Karyawan;
use App\Penilaian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $sumbangsaran = SumbangSaran::all();
        $karyawan = Karyawan::all();
        $peserta = Penilaian::with('karyawan','sumbangsaran')->where('nilai','>',300)->count();
        $penilaian = Penilaian::all();

        return view('pages.dashboard',compact('sumbangsaran','karyawan','peserta','penilaian'));
    }
}
