<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use App\Ext;
use Validator;

class ExtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extension = Ext::with('bagian')->orderBY('created_at','DESC')->get();

        return view('pages.ext.index',compact('extension'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagian = Bagian::all();

        return view('pages.ext.create',compact('bagian'));
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
            'bagian_id'      => 'required'
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            Ext::create([
                'bagian_id' => $request->bagian_id,
                'nama'  => $request->nama
            ]);
    
            return back()->with('success','Data Extension Berhasil Di Simpan');
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
        $bagian = Bagian::all();
        $ext = Ext::with('bagian')->findOrFail($id);
        
        return view('pages.ext.edit',compact('ext','bagian'));
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
            'bagian_id'      => 'required'
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            $extension =Bagian::findOrFail($id);
            $extension->bagian_id = $request->bagian_id;
            $extension->nama = $request->nama;
            $extension->save();

            return back()->with('success','Data Bagian Berhasil Di Hapus');
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
        $extension = Ext::findOrFail($id);
        $extension->delete();

        return back()->with('success','Data Extension Berhasil Di Hapus');
    }
}
