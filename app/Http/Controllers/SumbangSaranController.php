<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\SumbangSaran;
use App\Karyawan;
use App\Penilaian;

class SumbangSaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumbangsaran = SumbangSaran::with('karyawan')->orderBY('created_at','DESC')->get();
        //dd($sumbangsaran);
        return view('pages.sumbang-saran.index',compact('sumbangsaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ss = SumbangSaran::with('karyawan')->findorFail($id);

        return view('pages.sumbang-saran.show',compact('ss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ss = SumbangSaran::findOrFail($id);
        $ss->delete();

        $penilaian = Penilaian::where('sumbang_saran_id',$id);
        $penilaian->delete();

        return back()->with('success','Data Sumbang Saran Berhasil Di Hapus');
    }
}
