<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class petugascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['petugas']= DB::table('petugas')->get();

        return view('/petugas/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dasboard/petugas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('petugas')->insert([
            'nama_petugas'=>$request->get('nama_petugas'),
            'username'=>$request->get('username'),
            'password'=>bcrypt($request->get('password')),
            'telepon'=>$request->get('telepon'),
        ]);

        return redirect('/dashboard/petugas');
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
        $data['petugas'] =DB::table('petugas')->where('id',crypt::decrypt($id))->first();

        return view('/dasboard/petugas/edit', $data);
                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('petugas')->where('id',$request->get('id'))->update([
            'nama_petugas'=>$request->get('nama_petugas'),
            'username'=>$request->get('username'),
            'password'=> bcrypt($request->get('password')),
            'telepon'=>$request->get('telepon'),
        ]);
        return redirect('/dashboard/petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('profil')->where('id',crypt::decrypt($id))->delete();

        return rediret('/dashboard/petugas');
    }
}
