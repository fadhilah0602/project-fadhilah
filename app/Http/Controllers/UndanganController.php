<?php

namespace App\Http\Controllers;
use App\Undangan;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $undangan = Undangan::get();
        $data['undangan'] = $undangan;
        return view("undangan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['undangan'] = Undangan::all();;
        return view("undangan.create", $data);
        // return view("undangan.create");
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
            'judul' => 'required|max:100',
            // 'tanggal_mulai' => 'required|max:100|unique:undangans',
            // 'tanggal_akhir' => 'required|max:100|unique:undangans'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi
        if ($request->hasFile('file_undangan')) {
            $request->validate([
                'file_undangan' => 'required|mimetypes:application/pdf|max:10000'
            ]);
        }

        //cek jika ada upload file dengan nama input file_undangan, maka pindahkan dalam storage
        $urlFileUndangan = null;
        if ($request->hasFile('file_undangan')) {
            $file = $request->file('file_undangan');
            $strRand = Str::random(30); //membuat random string
            $filename = 'file_undangan_' . $strRand . '.'  . $request->file('file_undangan')->guessExtension();


            if (!Storage::disk('local')->exists('file_undangan')) {
                Storage::disk('local')->makeDirectory('file_undangan');
            }
            $path = Storage::disk('local')->path('file_undangan', true) . '/';
            $file->move($path, $filename);
            $urlFileUndangan = 'file_undangan/' . $filename;

        }

        $check = Undangan::where('undangan.create');
        if ($check >= ('undangan.create')) {
            $undangan = new Undangan();
            $undangan->judul = $request->get('judul');
            $undangan->lokasi = $request->get('lokasi');
            $undangan->tanggal_mulai = $request->get('tanggal_mulai');
            $undangan->tanggal_akhir = $request->get('tanggal_akhir');
            $undangan->jenis= $request->get('jenis');
            $undangan->keterangan = $request->get('keterangan');
            if ($request->hasFile('file_undangan')) {
                $undangan->file_undangan = $urlFileUndangan;
            }
            $undangan->save();
            return redirect()->action('UndanganController@index')->with('message_create', 'Data  Berhasil Ditambahkan');
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
        $undangan = Undangan::findOrFail($id);
        $data['undangan'] = $undangan;
        return view("undangan.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $undangan = Undangan::findOrFail($id);
        $data['undangan'] = $undangan;
        return view("undangan.edit", $data);
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
            'judul' => 'required|max:100',
            // 'tanggal_mulai' => 'required|max:100|unique:undangans',
            // 'tanggal_akhir' => 'required|max:100|unique:undangans'

        ]);
        //validasi jika ada file upload, pastikan input name dalam form input sesuai field dalam validasi
        if ($request->hasFile('file_undangan')) {
            $request->validate([
                'file_undangan' => 'required|mimetypes:application/pdf|max:10000'
            ]);
        }

        //cek jika ada upload file dengan nama input file_undangan, maka pindahkan dalam storage
        $urlFileUndangan = null;
        if ($request->hasFile('file_undangan')) {
            $file = $request->file('file_undangan');
            $strRand = Str::random(30); //membuat random string
            $filename = 'file_undangan_' . $strRand . '.'  . $request->file('file_undangan')->guessExtension();


            if (!Storage::disk('local')->exists('file_undangan')) {
                Storage::disk('local')->makeDirectory('file_undangan');
            }
            $path = Storage::disk('local')->path('file_undangan', true) . '/';
            $file->move($path, $filename);
            $urlFileUndangan = 'file_undangan/' . $filename;

        }

        $check = Undangan::where('undangan.edit', $id);
        if ($check >= ('undangan.edit')) {
            $undangan = Undangan::findOrFail($id);
            $undangan->judul = $request->get('judul');
            $undangan->lokasi = $request->get('lokasi');
            $undangan->tanggal_mulai = $request->get('tanggal_mulai');
            $undangan->tanggal_akhir = $request->get('tanggal_akhir');
            $undangan->jenis= $request->get('jenis');
            $undangan->keterangan = $request->get('keterangan');
            if ($request->hasFile('file_undangan')) {
                $undangan->file_undangan = $urlFileUndangan;
            }
            $undangan->save();
            return redirect()->action('UndanganController@index')->with('message_create', 'Data  Berhasil Di Edit');
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
        $check=Undangan::where('undangan.delete',$id);
        if($check>=('undangan.delete')){
            Undangan::findOrFail($id)->delete();
            return redirect()->action('UndanganController@index')->with('message_delete','Data  Berhasil Dihapus');
          
        }
    }
}
