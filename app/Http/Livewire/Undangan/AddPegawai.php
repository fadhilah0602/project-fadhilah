<?php

namespace App\Http\Livewire\Undangan;

use Livewire\Component;
use App\Pegawai;
use App\UndanganPegawai;
use App\Mail\SendUndanganPegawai;
use Illuminate\Support\Facades\Mail;

class AddPegawai extends Component
{
    public $undanganId,$pegawaiId;

    protected $listeners = [
        'onShowPegawaiListener' => 'show',
        'onAddundanganPegawaiListener' => 'addUndanganPegawai', //listener untuk memisahkan add dan edit pegawai
    ];


    public $isShow='false';

    public function resetInput()
    {
        $this->isShow = 'false'; // ubah jadi false
        $this->undanganId = null;
        $this->pegawaiId = null;
    }
    
    public function mount()
    {
        $this->resetInput();
        
    }

    public function show($undanganId) {
        $this->isShow = 'true';
        $this->undanganId = $undanganId;
        $this->emit('onShowUndanganPegawai', $undanganId); // onShowUndanganPegawai diambil dari Listener UndanganPegawai
    }

    public function hide() {
        $this->isShow = 'false';
    }

    public function render()
    {
        
        $pegawai = Pegawai::get();
        $data['pegawai'] = $pegawai;
        return view('livewire.undangan.add-pegawai',$data);
    }

    public function addUndanganPegawai($pegawaiId) {


        $this->pegawaiId = $pegawaiId;
        $undanganPegawai=new UndanganPegawai();
        $undanganPegawai->undangan_id=$this->undanganId;
        $undanganPegawai->pegawai_id=$this->pegawaiId;
        $undanganPegawai->status_konfirmasi='Belum';
        $undanganPegawai->status_kehadiran='Tidak';
        $undanganPegawai->save();

        $data["email"] = $undanganPegawai->pegawai->email;
        $data["nama"] = $undanganPegawai->pegawai->name;
        $data["title"] = "Undangan Pegawai";
        $data["nama_undangan"]=$undanganPegawai->undangan->judul;
        
        $files = [
            public_path($undanganPegawai->undangan->file_undangan), 
            // url($undanganPegawai->undangan->file_undangan)
        ];
  
        Mail::send('email-undangan-pegawai', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            $message->from('febrianadila1@gmail.com');
            foreach ($files as $file){
                $message->attach($file);
            }
            
        });

        // Mail::to($undanganPegawai->pegawai->email)->send(new SendUndanganPegawai());
        // $this->isShow='false';
        $this->emit('onShowUndanganPegawai',$this->undanganId);
    }
}
