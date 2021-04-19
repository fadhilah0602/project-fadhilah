<?php

namespace App\Http\Livewire\Undangan;

use Livewire\Component;
use App\Undangan;

class KelolaUndanganBagian extends Component
{
    public $undanganId;

    public function render()
    {
        $undangan=null;
        if($this->undanganId!=null) {
            $undangan=Undangan::FindOrFail($this->undanganId);
        }
        $data['undangan'] = $undangan;
        return view('livewire.undangan.kelola-undangan-bagian',$data);
    }

    public function mount()
    {
        $this->undanganId = null;
    }

    public function show($id)
    {
        $this->undanganId = $id;
        $this->emit('onShowUndanganPegawai',$id);

    }

    protected $listeners = [
        'onShowKelolaUndanganBagian' => 'show',
    ];  

    public $isShow='false';
    public function resetInput()
    {
        $this->isShow = 'false'; // ubah jadi false
        $this->undanganId = null;
    }
    public function hide() {
        $this->isShow = 'false';
    }
}
