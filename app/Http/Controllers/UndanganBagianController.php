<?php

namespace App\Http\Controllers;
use App\UndanganBagian;

use Illuminate\Http\Request;

class UndanganBagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $undangan_bagian = UndanganBagian::get();
        $data['undangan_bagian'] = $undangan_bagian;
        return view("undangan_bagian.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['undangan_bagian'] = UndanganBagian::all();;
        return view("undangan_bagian.create", $data);
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
            
            'undangan_id' => 'required|max:100',
            'bagian_id' => 'required|max:100'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi

        $check = UndanganBagian::where('undangan_bagian.create');
        if ($check >= ('undangan_bagian.create')) {
            $undangan_bagian = new UndanganBagian();
            $undangan_bagian->undangan_id = $request->get('undangan_id');
            $undangan_bagian->bagian_id = $request->get('bagian_id');
            $undangan_bagian->save();
            return redirect()->action('UndanganBagianController@index')->with('message_create', 'Data  Berhasil Ditambahkan');
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
        $undangan_bagian = UndanganBagian::findOrFail($id);
        $data['undangan_bagian'] = $undangan_bagian;
        return view("undangan_bagian.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $undangan_bagian = UndanganBagian::findOrFail($id);
        $data['undangan_bagian'] = $undangan_bagian;
        return view("undangan_bagian.edit", $data);
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
            'bagian_id' => 'required|max:100'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi

        $check = UndanganBagian::where('undangan_bagian.edit', $id);
        if ($check >= ('undangan_bagian.edit')) {
            $undangan_bagian = UndanganBagian::findOrFail($id);
            $undangan_bagian->undangan_id = $request->get('undangan_id');
            $undangan_bagian->bagian_id = $request->get('bagian_id');
            $undangan_bagian->save();
            return redirect()->action('UndanganBagianController@index')->with('message_create', 'Data  Berhasil Ditambahkan');
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
        $check=UndanganBagian::where('undangan_bagian.delete',$id);
        if($check>=('undangan_bagian.delete')){
            UndanganBagian::findOrFail($id)->delete();
            return redirect()->action('UndanganBagianController@index')->with('message_delete','Data  Berhasil Dihapus');
          
        }
    }
}
