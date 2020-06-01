<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Validator;
use App\SumbangSaran;
use App\Karyawan;
use App\Bagian;
use App\Ext;
use App\Jadwal;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian = Bagian::all();
        $ext    = Ext::all();
        $jadwal = Jadwal::where('status','=',0)->first();

        return view('form',compact('bagian','ext','jadwal'));
    }

    public function search(Request $request)
    {
        // $bagian_id = $request->bagian;
        $bagian_id = $request->get('bagian');
        $extension = Ext::where('bagian_id','=',$bagian_id)->get();

        return Response::json($extension);

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
            'min' => ':attribute Harus Di Isi minimal :min Digit',
            'max' => ':attribute Harus Di Isi maksimal :max Digit',
            'mimes' => ':attribute Foto Harus JPG,JPEG,PNG'
        ];
        $validator = Validator::make($request->all(),[
            'nik'           => 'required|min:5|max:10',
            'nama'          => 'required',
            'bagian'        => 'required',
            'ext'           => 'required|max:5',
            'judul'         => 'required',
            'kondisi_awal'  => 'required',
            'foto'          => 'required|mimes:jpg,jpeg,png',
            'kondisi_akhir' => 'required',
            'manfaat'       => 'required'
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            $namapic = request()->foto->getClientOriginalName();
            request()->foto->move(public_path('assets/images'),$namapic);
            
            $karyawan = Karyawan::all();
            
                if ($karyawan->contains('nik', $request->nik) == $request->nik) {
                    $flight = Karyawan::firstOrCreate(
                        ['nik' => $request->nik,
                        'nama'      => $request->nama,
                        'bagian_id'    => $request->bagian,
                        'ext_id'       => $request->ext,
                    ]);
                    SumbangSaran::create([
                        'karyawan_id'   => $flight->id,
                        // 'nik'           => $request->nik,
                        // 'nama'          => $request->nama,
                        // 'bagian'        => $request->bagian,
                        // 'ext'           => $request->ext,
                        'judul'         => $request->judul,
                        'foto'          => $namapic,
                        'kondisi_awal'  => $request->kondisi_awal,
                        'kondisi_akhir' => $request->kondisi_akhir,
                        'manfaat'       => $request->manfaat,
                        'periode'       => $request->periode
                    ]);

           

      
                }else{
                    $flight = Karyawan::create([
                        'nik'       => $request ->nik,
                        'nama'      => $request->nama,
                        'bagian_id'    => $request->bagian,
                        'ext_id'       => $request->ext,
                    ]);
                    
                    SumbangSaran::create([
                        'karyawan_id'   => $flight->id,
                        'judul'         => $request->judul,
                        'foto'          => $namapic,
                        'kondisi_awal'  => $request->kondisi_awal,
                        'kondisi_akhir' => $request->kondisi_akhir,
                        'manfaat'       => $request->manfaat,
                        'periode'       => $request->periode
                    ]);
                    
 
                }
            
            return back()->with('success', 'Terima Kasih Sudah Berpartipasi Untuk Sumbang Saran');
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
        //
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
