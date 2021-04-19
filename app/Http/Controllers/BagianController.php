<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use App\Pegawai;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian = Bagian::get();
        $data['bagian']  = $bagian;
        return view("bagian.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bagian.create");
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
            'name' => 'required|max:100',
        ]);
        // tanpa edit
        // $bagian=new Bagian();
        // $bagian->name=$request->get('name');
        // $bagian->save();
        // return redirect()->action('BagianController@index');

        $check=Bagian::where('bagian.create');
        if($check>=('bagian.create')){
            $bagian=new Bagian();
            $bagian->name=$request->get('name');
            $bagian->save();
            return redirect()->action('BagianController@index')->with('message_create','Data  Berhasil Di Tambahkan');
          
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
        $bagian=Bagian::findOrFail($id);
        $data['bagian']  = $bagian;
        return view("bagian.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bagian=Bagian::findOrFail($id);
        $data['bagian']  = $bagian;
        return view("bagian.edit",$data);
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
        // tanpa pesan 
        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);
        // tanpa pesan 
        // $bagian= Bagian::findOrFail($id);
        // $bagian->name=$request->get('name');
        // $bagian->save();
        // return redirect()->action('BagianController@index');

        $check=Bagian::where('bagian.edit',$id);
        if($check>=('bagian.edit')){
            $bagian= Bagian::findOrFail($id);
            $bagian->name=$request->get('name');
            $bagian->save();
            return redirect()->action('BagianController@index')->with('message_edit','Data  Berhasil Di Edit');
          
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
        $check=Pegawai::where('bagian_id',$id)->count();
        if($check>=1) {
            return redirect()->back()->with('message_delete','Data Sudah Digunakan Pada Pegawai');
        }
        
        // tanpa pesan
        // Bagian::findOrFail($id)->delete();
        // return redirect()->action('BagianController@index');
        else {
            Bagian::findOrFail($id)->delete();
            return redirect()->action('BagianController@index')->with('message_del','Data  Berhasil Dihapus');
          
        }
    }
}
