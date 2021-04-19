<?php

namespace App\Http\Controllers;
use App\UndanganPegawai;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UndanganPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $undangan_pegawai = UndanganPegawai::get();
        $data['undangan_pegawai'] = $undangan_pegawai;
        return view("undangan_pegawai.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['undangan_pegawai'] = UndanganPegawai::all();;
        return view("undangan_pegawai.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'judul' => 'required|max:100',
            'undangan_id' => 'required|max:100',
            'pegawai_id' => 'required|max:100'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi

        $check = UndanganPegawai::where('undangan_pegawai.create');
        if ($check >= ('undangan_pegawai.create')) {
            $undangan_pegawai = new UndanganPegawai();
            $undangan_pegawai->undangan_id = $request->get('undangan_id');
            $undangan_pegawai->pegawai_id = $request->get('pegawai_id');
            $undangan_pegawai->save();
            return redirect()->action('UndanganPegawaiController@index')->with('message_create', 'Data  Berhasil Ditambahkan');
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
        $undangan_pegawai = UndanganPegawai::findOrFail($id);
        $data['undangan_pegawai'] = $undangan_pegawai;
        return view("undangan_pegawai.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $undangan_pegawai = UndanganPegawai::findOrFail($id);
        $data['undangan_pegawai'] = $undangan_pegawai;
        return view("undangan_pegawai.edit", $data);
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
        $validatedData = $request->validate([
            // 'judul' => 'required|max:100',
            'undangan_id' => 'required|max:100',
            'pegawai_id' => 'required|max:100'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi

        $check = UndanganPegawai::where('undangan_pegawai.edit', $id);
        if ($check >= ('undangan_pegawai.edit')) {
            $undangan_pegawai = UndanganPegawai::findOrFail($id);
            $undangan_pegawai->undangan_id = $request->get('undangan_id');
            $undangan_pegawai->pegawai_id = $request->get('pegawai_id');
            $undangan_pegawai->save();
            return redirect()->action('UndanganPegawaiController@index')->with('message_create', 'Data  Berhasil Ditambahkan');
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
        $check=UndanganPegawai::where('undangan_pegawai.delete',$id);
        if($check>=('undangan_pegawai.delete')){
            UndanganPegawai::findOrFail($id)->delete();
            return redirect()->action('UndanganPegawaiController@index')->with('message_delete','Data  Berhasil Dihapus');
          
        }
    }
}
