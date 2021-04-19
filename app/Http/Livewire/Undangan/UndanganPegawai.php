<?php

namespace App\Http\Livewire\Undangan;


use Livewire\Component;
// buuat alias
use App\UndanganPegawai as dataUndanganPegawai;

class UndanganPegawai extends Component
{
    public $undanganId,$pegawaiId,$namaPegawai;

    protected $listeners = [
        'onShowUndanganPegawai' => 'show',
    ];

    public function mount($id)
    {
        $this->undanganId=$id;
    }

    public function show($id)
    {
        $this->undanganId=$id;
    }

    public function render()
    {
        $undanganPegawai = null;
        if($this->undanganId!=null){
            $undanganPegawai=dataUndanganPegawai::where('undangan_id',$this->undanganId)->get();
        }
        
        $data['undanganPegawai']  = $undanganPegawai;
        return view('livewire.undangan.undangan-pegawai',$data);
        // langsunggggg
        // return view('livewire.undangan.undangan-pegawai',['undanganPegawai'=>$undanganPegawai]);

    }
    public function destroy($id) {
        $undanganPegawai= dataUndanganPegawai::FindOrFail($id);
        $undanganPegawai->delete();
        
    }

    
}
