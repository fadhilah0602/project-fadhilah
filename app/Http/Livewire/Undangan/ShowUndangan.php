<?php

namespace App\Http\Livewire\Undangan;

use Livewire\Component;
use App\Undangan;

class ShowUndangan extends Component
{
    public $undanganId;

    public function render()
    {
        $undangan=null;
        if($this->undanganId!=null) {
            $undangan=Undangan::FindOrFail($this->undanganId);
        }
        $data['undangan'] = $undangan;
        return view('livewire.undangan.show-undangan',$data);
    }

    public function mount($id)
    {
        $this->undanganId = null;
    }

    public function show($id)
    {
        $this->undanganId = $id;
        $this->emit('onShowUndanganPegawai',$id);
    }

    protected $listeners = [
        'onShowUndangan' => 'show',
    ];
}
