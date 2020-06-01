<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use Validator;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian = Bagian::orderBy('created_at','DESC')->get();

        return view('pages.bagian.index',compact('bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bagian.create');
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
            'max' => ':attribute Harus Di Isi maksimal :max Digit',
        ];
        $validator = Validator::make($request->all(),[
            'nama'           => 'required|max:15',
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            Bagian::create([
                'nama' => $request->nama
            ]);
    
            return back()->with('success','Data Nama Bagian Berhasil Di Simpan');
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
        $bagian = Bagian::findOrFail($id);

        return view('pages.bagian.edit',compact('bagian'));
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
        $messages = [
            'required' => ':attribute Harus Di Isi',
            'max' => ':attribute Harus Di Isi maksimal :max Digit',
        ];
        $validator = Validator::make($request->all(),[
            'nama'           => 'required|max:15',
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            $bagian = Bagian::findOrFail($id);
            $bagian -> nama = $request->nama;
            $bagian->save();
    
            return back()->with('success','Data Bagian Berhasil Di Ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bagian =Bagian::findOrFail($id);
        $bagian->delete();

        return back()->with('success','Data Bagian Berhasil Di Hapus');
    }
}
