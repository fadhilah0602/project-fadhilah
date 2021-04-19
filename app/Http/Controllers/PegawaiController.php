<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Bagian;
use App\UndanganPegawai;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::get();
        // dd($pegawai);
        $data['pegawai'] = $pegawai;
        return view("pegawai.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pegawai=Pegawai::findOrFail($id);  
        // $data['pegawai']= $pegawai;
        $data['bagian'] = Bagian::all();
        return view("pegawai.create", $data);
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
            'nip' => 'required|max:100|unique:pegawais',
            'email' => 'email:rfc,dns|unique:pegawais',
            'jabatan' => 'required|max:100',

            'bagian_id' => 'exists:bagians,id'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimetypes:image/png,image/jpeg,image/jpg|max:5120',
                // "file" => "required|mimetypes:application/pdf|max:10000"
            ]);
        }

        //cek jika ada upload file dengan nama input photo, maka pindahkan dalam storage
        $urlPhoto = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $strRand = Str::random(30); //membuat random string
            $filename = 'photo_' . $strRand . '.' . $request->file('photo')->guessExtension();


            if (!Storage::disk('local')->exists('image/photo')) {
                Storage::disk('local')->makeDirectory('image/photo');
            }
            $path = Storage::disk('local')->path('image/photo', true) . '/';
            $file->move($path, $filename);
            $urlPhoto = 'image/photo/' . $filename;
        }

        // $pegawai=new Pegawai();
        // $pegawai->name=$request->get('name');
        // //pada saat prosses save /update isi field photo dengan url path filenya misal
        // $pegawai->photo = $urlPhoto;
        // $pegawai->nip=$request->get('nip');
        // $pegawai->jabatan=$request->get('jabatan');
        // $pegawai->bagian_id=$request->get('bagian_id');
        // $pegawai->bagian="";
        // $pegawai->tanggal_lahir=$request->get('tanggal_lahir');
        // $pegawai->jenis_kelamin=$request->get('jenis_kelamin');
        // $pegawai->nohp=$request->get('nohp');
        // $pegawai->email=$request->get('email');
        // $pegawai->alamat=$request->get('alamat');
        // $pegawai->status=$request->get('status');
        // $pegawai->save();
        // return redirect()->action('PegawaiController@index');

        $check = Pegawai::where('pegawai.create');
        if ($check >= ('pegawai.create')) {
            $pegawai = new Pegawai();
            $pegawai->name = $request->get('name');
            $pegawai->photo = $urlPhoto;
            $pegawai->nip = $request->get('nip');
            $pegawai->jabatan = $request->get('jabatan');
            $pegawai->bagian_id = $request->get('bagian_id');
            $pegawai->bagian = "";
            $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
            $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
            $pegawai->nohp = $request->get('nohp');
            $pegawai->email = $request->get('email');
            $pegawai->alamat = $request->get('alamat');
            $pegawai->status = $request->get('status');
            $pegawai->save();
            return redirect()->action('App\Http\Controllers\PegawaiController@index')->with('message_create', 'Data  Berhasil Ditambahkan');
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
        $pegawai = Pegawai::findOrFail($id);
        $data['pegawai'] = $pegawai;
        return view("pegawai.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $data['pegawai'] = $pegawai;
        $data['bagian'] = Bagian::all();;
        return view("pegawai.edit", $data);
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
            'name' => 'required|max:100',
            'nip' => 'required|max:100|unique:pegawais,nip,' . $id,
            'email' => 'email:rfc,dns|unique:pegawais,email,' . $id,
            'jabatan' => 'required|max:100',

            'bagian_id' => 'exists:bagians,id'



        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimetypes:image/png,image/jpeg,image/jpg|max:5120|unique:pegawais,photo',
            ]);
        }

        
        //cek jika ada upload file dengan nama input photo, maka pindahkan dalam storage
        $urlPhoto = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $strRand = Str::random(30); //membuat random string
            $filename = 'photo_' . $strRand . '.'  . $request->file('photo')->guessExtension();


            if (!Storage::disk('local')->exists('image/photo')) {
                Storage::disk('local')->makeDirectory('image/photo');
            }
            $path = Storage::disk('local')->path('image/photo', true) . '/';
            $file->move($path, $filename);
            $urlPhoto = 'image/photo/' . $filename;

        }

        if ($request->hasFile('dokumen')) {
            $request->validate([
                'dokumen' => 'required|mimetypes:application/pdf|max:10000'
            ]);
        }

        $urlDokumen = null;
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $strRand = Str::random(30); //membuat random string
            $filename = 'dokumen_' . $strRand . '.'  . $request->file('dokumen')->guessExtension();


            if (!Storage::disk('local')->exists('dokumen')) {
                Storage::disk('local')->makeDirectory('dokumen');
            }
            $path = Storage::disk('local')->path('dokumen', true) . '/';
            $file->move($path, $filename);
            $urlDokumen = 'dokumen/' . $filename;

        }

            // $urlPhoto = null;
            // $user = User::findOrFail($id);
            // if ($request->hasFile('photo')) {
            // $file = $request->file('photo');
            // $strRand = Str::random(30); //membuat random string
            // $filename = 'photo_' . $strRand . '.' . $request->file('photo')->guessExtension();


            // if (!Storage::disk('local')->exists('image/photo')) {
            //     Storage::disk('local')->makeDirectory('image/photo');
            // }
            // $path = Storage::disk('local')->path('image/photo', true) . '/';
            // $file->move($path, $filename);
            // $urlPhoto = 'image/photo/' . $filename;
            // $user->photo = $urlPhoto;
            // }
        
        // $pegawai= Pegawai::findOrFail($id);
        // $pegawai->name=$request->get('name');
        // if($request->hasFile('photo')) {
        //     $pegawai->photo=$urlPhoto;
        // }

        // $pegawai= Pegawai::findOrFail($id);  
        // $pegawai->name=$request->get('name');
        // //pada saat prosses save /update isi field photo dengan url path filenya misal
        // $pegawai->photo = $urlPhoto;
        // $pegawai->nip=$request->get('nip');
        // $pegawai->jabatan=$request->get('jabatan');
        // $pegawai->bagian_id=$request->get('bagian_id');
        // $pegawai->tanggal_lahir=$request->get('tanggal_lahir');
        // $pegawai->jenis_kelamin=$request->get('jenis_kelamin');
        // $pegawai->nohp=$request->get('nohp');
        // $pegawai->email=$request->get('email');
        // $pegawai->alamat=$request->get('alamat');
        // $pegawai->status=$request->get('status');
        // $pegawai->save();
        // return redirect()->action('PegawaiController@index');

        $check = Pegawai::where('pegawai.edit', $id);
        if ($check >= ('pegawai.edit')) {
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->name = $request->get('name');
            if ($request->hasFile('photo')) {
                $pegawai->photo = $urlPhoto;
            }
            //pada saat prosses save /update isi field photo dengan url path filenya misal
            // $pegawai->photo = $urlPhoto;
            $pegawai->nip = $request->get('nip');
            $pegawai->jabatan = $request->get('jabatan');
            $pegawai->bagian_id = $request->get('bagian_id');
            $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
            $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
            $pegawai->nohp = $request->get('nohp');
            $pegawai->email = $request->get('email');
            $pegawai->alamat = $request->get('alamat');
            $pegawai->status = $request->get('status');
            if ($request->hasFile('dokumen')) {
                $pegawai->dokumen = $urlDokumen;
            }
            $pegawai->save();
            return redirect()->action('App\Http\Controllers\PegawaiController@index')->with('message_edit', 'Data  Berhasil Di Edit');
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
        $check = UndanganPegawai::where('pegawai_id', $id)->count();
        if ($check >=0) {
            return redirect()->action('App\Http\Controllers\PegawaiController@index')->with('message_delete', 'Data  Berhasil Dihapus');
        }
        else{
            Pegawai::findOrFail($id)->delete();
            return redirect()->action('App\Http\Controllers\PegawaiController@index');
        }
            
        
    }
}
