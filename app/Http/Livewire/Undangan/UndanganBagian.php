<?php

namespace App\Http\Livewire\Undangan;

use Livewire\Component;

use App\UndanganBagian as dataUndanganBagian;

class UndanganBagian extends Component
{
    public $undanganId,$bagianId,$namaBagian;

    protected $listeners = [
        'onShowUndanganBagian' => 'show',
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
        $undanganBagian = null;
        if($this->undanganId!=null){
            $undanganBagian=dataUndanganBagian::where('undangan_id',$this->undanganId)->get();
        }
        
        $data['undanganBagian']  = $undanganBagian;
        return view('livewire.undangan.undangan-bagian',$data);
    }

    public function destroy($id) { // untuk menghapus data
        $undanganBagian= dataUndanganBagian::FindOrFail($id);
        $undanganBagian->delete();
        
    }
}
