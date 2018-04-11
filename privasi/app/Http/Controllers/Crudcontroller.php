<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Redirect;
use View;

class Crudcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('/home');
    }

    public function tambah()
    {
        $jurusan = DB::table('jurusan')->orderBy('id_jurusan', 'asc')->lists('jurusan','id_jurusan');
        return View::make('form_add')->with('jurusan',$jurusan);   
    }

    public function tambahdata()
    {
        $data = array(
                'nama' => input::get('nama'),
                'alamat'=> input::get('alamat'),
                'semester'=> input::get('semester'),
                'id_jurusan'=> input::get('id_jurusan')
            );

        DB::table('siswa')->insert($data);
        return Redirect::to('/read')->with('message','data berhasil disimpan');
    }

    public function lihatdata()
    {
       
        $data = DB::table('siswa')->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')->paginate(5);
        return View::make('read')->with('siswa',$data);
    }

    public function editdata($id)
    {
        $jurusan = DB::table('jurusan')->lists('jurusan','id_jurusan');
        // $selectedJurusan = DB::table('jurusan')->where('id_jurusan', '=', $jurusan)->first();
        $data = DB::table('siswa')->where('id','=',$id)->first();
        return view('form_edit', compact('jurusan'))->with('siswa', $data);
        //return View::make('form_edit',array('siswa' => $data, 'jurusan' => $jurusan));
    }

    public function hapusdata($id)
    {
        DB::table('siswa')->where('id','=',$id)->delete();

        return Redirect::to('/read')->with('message','berhasil menghapus data');
    }

    public function proseseditdata()
    {
        $data = array(
                'nama' => Input::get('nama'),
                'alamat' => Input::get('alamat'),
                'semester' => Input::get('semester'),
                'id_jurusan' => Input::get('id_jurusan')
            );

        DB::table('siswa')->where('id','=',input::get('id'))->update($data);

        return Redirect::to('read')->with('message','berhasil mengedit data');
    }

    public function search(Request $request){

        $cari = $request->get('search');
        $data = DB::table('siswa')->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')->where('nama','LIKE','%'.$cari.'%')->paginate(10);
        return view('read', compact($data))->with('siswa',$data);;
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
        //
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
