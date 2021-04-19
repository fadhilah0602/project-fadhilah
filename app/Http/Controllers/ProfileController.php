<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit()
    {
        $profile=Auth::user();
        $data['profile']  = $profile;
        return view("profile.edit",$data);
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'email:rfc,dns|unique:users,email,'.Auth::user()->id,

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimetypes:image/png,image/jpeg,image/jpg|max:5120',
            ]);
        }

        //cek jika ada upload file dengan nama input photo, maka pindahkan dalam storage

        
        $user = Auth::user();
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
            $user->photo = $urlPhoto;
        }

        // tanpa pesan 
        // $user->name = $request->get('name');
        
        // $user->email = $request->get('email');
        // if($request->get('password')){
        //     $user->password = Hash::make($request->get('password'));
        // }
        
        // $user->save();
        // return redirect()->action('UserController@index');

        
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if($request->get('password')){
            $user->password = Hash::make($request->get('password'));
            }
            $user->save();
            return redirect()->action('ProfileController@edit')->with('message_edit','Data  Berhasil Di Edit');
          
        
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
