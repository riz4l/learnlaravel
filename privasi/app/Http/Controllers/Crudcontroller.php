<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\validasilogin;
use App\Http\Requests\validasiregister;
use App\Http\Requests\validasitambah;    
use Input;
use DB;
use Redirect;
use View;
use Auth;

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

    public function tambahdata(Request $request,validasitambah $param)
    {
        $param = $request->all();
        // set validation
        $nama = $param['nama'];
        $alamat = $param['alamat'];
        $semester = $param['semester'];
        // end set validation
        $data = array(
                    'nama' => $nama,
                    'alamat'=> $alamat,
                    'semester'=> $semester,
                    'id_jurusan'=> $param['id_jurusan'],
                );

        $file_photo = $request->file('file_photo');
        $destinationPath = 'photos/';

        if($file_photo)
        {
            $filename = $file_photo->getClientOriginalName();
            $data['photo'] = $filename;
            $proses = $file_photo->move($destinationPath, $filename);
        }
        try {
            DB::table('siswa')->insert($data);
            return Redirect::to('/read')->with('message','data berhasil disimpan');
        }catch (\Exception $e) {
            return Redirect::to('/formtambah')->with('message','data gagal disimpan');
        }
    }

    public function lihatdata()
    {
       
        $data = DB::table('siswa')->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')->paginate(10);
        return View::make('read')->with('siswa',$data);
    }

    public function editdata($id)
    {
        $jurusan = DB::table('jurusan')->lists('jurusan','id_jurusan');
        $data = DB::table('siswa')->where('id','=',$id)->first();
        return view('form_edit', compact('jurusan'))->with('siswa', $data);
      
    }

    public function hapusdata($id)
    {
        DB::table('siswa')->where('id','=',$id)->delete();

        return Redirect::to('/read')->with('message','berhasil menghapus data');
    }

    public function imageTest() { 
        $menu = new Menu; 
        $input = Input::all(); 
        if (Input::hasFile('file')) {
         $file = Input::file('file');

        $destinationPath = 'menu_images';
        $filename = $file->getClientOriginalName();
        $upload_success = Input::file('file')->move($destinationPath, $filename);
 }

}
    public function proseseditdata(Request  $request)
{
    $param = $request->all();
    $data = [
        'nama' => $param['nama'],
        'alamat'=> $param['alamat'],
        'semester'=> $param['semester'],
        'id_jurusan'=> $param['id_jurusan']
    ];

    $file_photo = $request->file('file_photo');
    $destinationPath = 'photos/';

    if($file_photo) {
        $filename = $file_photo->getClientOriginalName();
        $data['photo'] = $filename;

        $proses = $file_photo->move($destinationPath, $filename);
    }
    
    try {
        DB::table('siswa')->where('id','=',input::get('id'))->update($data);
        return Redirect::to('read')->with('message','berhasil mengedit data');
    }
    catch (\Exception $e) { 
        return Redirect::to('read')->with('message','data gagal diedit');
    }
}

    public function search(Request $request){

        $cari = $request->get('search');
        $data = DB::table('siswa')->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')->where('nama','LIKE','%'.$cari.'%')->paginate(10);
        return view('read', compact($data))->with('siswa',$data);;
    }

    public function tambahlogin(validasiregister $data)
    {
        $username = $data->username;
        $password = bcrypt($data->password);
        $data = array(
                        'username'=>$username,
                        'password'=>$password,
                        'hak_akses'=>'user'

            );
        DB::table('login')->insert($data);
        return Redirect('/register')->with('message','Berhasil mendaftar');
    }

    public function login(validasilogin $validasi)
    {
        if(Auth::attempt(['username'=> Input::get('username'), 'password' => Input::get('password')]))
        {
            if(Auth::user()->hak_akses=="admin")
            {
                echo "admin";
            }else{
               return Redirect::to('home');
            }
        }else{
            return Redirect::to('login')->with('message','Gagal login, harap masukan username dan password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login')->with('message','Terima kasih, Anda berhasil keluar..');
    }

    // DEFAULT FUNCTION
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
