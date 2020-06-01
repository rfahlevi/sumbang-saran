<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SumbangSaran;
use App\Penilaian;
use App\Karyawan;
use Validator;

class PenilaianController extends Controller
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
        $sumbangsaran = SumbangSaran::with('penilaian','karyawan')->orderBY('created_at','DESC')->get();
        //dd($sumbangsaran);
        return view('pages.penilaian.index',compact('sumbangsaran'));
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
        $messages = [
            'required' => ':attribute Harus Di Isi',
        ];
        $validator = Validator::make($request->all(),[
            'nilai'        => 'required',
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{

            Penilaian::create([
                'sumbang_saran_id'     => $request->sumbang_saran_id,
                'karyawan_id'          => $request->karyawan_id,
                'nilai'                => $request->nilai, 
            ]);
                
            return back()->with('success', 'Data Penilaian Berhasil Di Simpan');
        }
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
        // dd($ss);
        return view('pages.penilaian.show',compact('ss'));
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
        //
    }
}
