<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Pegawai;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        if(Auth::user()->role->name!='admin') {
            abort(404);
        }

        $user = User::get();
        $data['user'] = $user;
        return view("user.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /// yang asli
    // public function create()
    // {
    //     $data['user'] = User::all();;
    //     return view("user.create", $data);
    // }

    public function create()
    {
        $data['user'] = user::all();;
        $role=Role::all();
        $data['role'] =$role;

        $pegawai=Pegawai::all();
        $data['pegawai'] =$pegawai;
        return view("user.create", $data);
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
            'email' => 'email:rfc,dns|unique:users',
            'password' => 'required|max:100'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimetypes:image/png,image/jpeg,image/jpg|max:5120',
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
       
        $check=User::where('user.create');
        if($check>=('user.create')){
            $user = new User();
            $user->name = $request->get('name');
            $user->photo = $urlPhoto;
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password')) ;
            $user->role_id = $request->get('role_id');
            $user->pegawai_id = $request->get('pegawai_id');
            $user->save();
            return redirect()->action('App\Http\Controllers\UserController@index')->with('message_create','Data  Berhasil Ditambahkan');
          
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
        $user = User::findOrFail($id);
        $data['user'] = $user;
        return view("user.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // yang asli
    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     $data['user'] = $user;
    //     return view("user.edit", $data);
    // }

    public function edit($id)
    {
        $data['user'] = User::FindorFail($id);;
        $role=Role::all();
        $data['role'] =$role;

        $pegawai=Pegawai::all();
        $data['pegawai'] =$pegawai;
        return view("user.edit", $data);
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
            'email' => 'email:rfc,dns|unique:users,email,'.$id,

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimetypes:image/png,image/jpeg,image/jpg|max:5120',
            ]);
        }

        //cek jika ada upload file dengan nama input photo, maka pindahkan dalam storage

        $urlPhoto = null;
        $user = User::findOrFail($id);
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
            $user->role_id = $request->get('role_id');
            $user->pegawai_id = $request->get('pegawai_id');
            $user->save();
            return redirect()->action('App\Http\Controllers\UserController@index')->with('message_edit','Data  Berhasil Di Edit');
          
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::findOrFail($id)->delete();
        // return redirect()->action('UserController@index');

        $check=User::where('user.delete',$id);
        if($check>=('pegawai.delete')){
            User::findOrFail($id)->delete();
            return redirect()->action('App\Http\Controllers\UserController@index')->with('message_delete','Data  Berhasil Dihapus');
          
        }
    }
}
