<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Redirect;
use View;
use Auth;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user())
        {
            $data = DB::table('jurusan')->orderBy('id_jurusan','asc')->paginate(5);
            return View::make('jurusan/view')->with('jurusan',$data);
        }else{

            return Redirect::to('login')->with('message','Harap Login Terlebih Dahulu');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user())
        {
            return View::make('jurusan/add');
        }else{

            return Redirect::to('login')->with('message','Harap Login Terlebih Dahulu');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();

        $data = array(
                        'jurusan'=>$param['jurusan']
            );

        DB::table('jurusan')->insert($data);
        return Redirect::to('/jurusan')->with('message','data berhasil disimpan');
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
        if(Auth::user())
        {
            $data = DB::table('jurusan')->where('id_jurusan',$id)->first();
            return View::make('jurusan/edit')->with('jurusan',$data);
        }else{

            return Redirect::to('login')->with('message','Harap Login Terlebih Dahulu');
        }
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
        $param = $request->all();
        $id = $param['id_jurusan'];
        $data = array(
                        'jurusan'=>$param['jurusan']
            );
        DB::table('jurusan')->where('id_jurusan','=',$id)->update($data);
        return Redirect::to('jurusan')->with('message','berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jurusan')->where('id_jurusan','=',$id)->delete();
        return Redirect::to('jurusan')->with('message','berhasil menghapus data');
    }

     public function search(Request $request){

        if(Auth::user())
        {

            $cari = $request->get('search');
            $data = DB::table('jurusan')->where('jurusan','LIKE','%'.$cari.'%')->paginate(5);
            return view('jurusan/view', compact($data))->with('jurusan',$data);;
        
        }else{

            return Redirect::to('login')->with('message','Harap Login Terlebih Dahulu'); 
        }
    }

}
