<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pages.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|same:password_confirmation',
            'role'          => 'required',
         ]);

        if ($validator->fails()) {
             return back()->withErrors($validator->errors());
        }else{
                if (empty($request->foto)) {
                    $namapic = "default.jpg";
                }else{       
                    $namapic = request()->foto->getClientOriginalName();
                    request()->foto->move(public_path('assets/img/user'),$namapic);
                }
    
                User::create([
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password),
                    'foto'          => $namapic,
                    'role'          => $request->role,
                    
                ]);
        
            return back()->with('success','Data User Berhasil Di Simpan');
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
        $item   = User::findOrFail($id);

        return view('pages.user.edit',compact('item'));
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
        $validator = Validator::make($request->all(),[
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email,' . $id,
            'password'      => 'same:password_confirmation',
            'role'          => 'required',
         ]);

        if ($validator->fails()) {
             return back()->withErrors($validator->errors());
        }else{
                if (!empty($request->password))
                {
                    $request->password = Hash::make($request->password);
                }

                // if (!empty($request->foto)) 
                // {     
                //     $user->foto = request()->foto->getClientOriginalName();
                //     request()->foto->move(public_path('assets/img/user'),$user->foto);
                // }

                if ($request->hasFile('foto')){
                    $namapic = request()->foto->getClientOriginalName();
                    request()->foto->move(public_path('assets/img/user'),$namapic);
                }else {   
                    $namapic = $request->input('foto_old');
        
                }
                // dd($namapic);
                $user               = User::findOrFail($id);
                $user->name         = $request->name;
                $user->email        = $request->email;
                $user->role         = $request->role;
                $user->foto         = $namapic;
                $user->save();

                return back()->with('success','Data User Berhasil Di Ubah');
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
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success','Data User Berhasil Di Hapus');
    }
}
