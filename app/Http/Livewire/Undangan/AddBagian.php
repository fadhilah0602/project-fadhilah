<?php

namespace App\Http\Livewire\Undangan;

use Livewire\Component;
use App\Bagian;
use App\UndanganBagian;

class AddBagian extends Component
{
    public $undanganId,$bagianId;

    protected $listeners = [
        'onShowBagianListener' => 'show',
        'onAddundanganBagianListener' => 'addUndanganBagian', //listener untuk memisahkan add dan edit pegawai
    ];

    public $isShow='false';

    public function resetInput()
    {
        $this->isShow = 'false'; // ubah jadi false
        $this->undanganId = null;
        $this->bagianId = null;
    }

    public function mount()
    {
        $this->resetInput();
        
    }

    public function show($undanganId) {
        $this->isShow = 'true';
        $this->undanganId = $undanganId;
        $this->emit('onShowUndanganBagian', $undanganId);
    }

    public function hide() {
        $this->isShow = 'false';
    }

    public function addUndanganBagian($bagianId) {
        $this->bagianId = $bagianId;
        $undanganBagian=new UndanganBagian();
        $undanganBagian->undangan_id=$this->undanganId;
        $undanganBagian->bagian_id=$this->bagianId;
        $undanganBagian->save();
        $this->isShow='false';
        $this->emit('onShowUndanganBagian',$this->undanganId); // diambil dari listener UndanganBagian
    }

    public function render()
    {
        $bagian = Bagian::get();
        $data['bagian'] = $bagian;
        return view('livewire.undangan.add-bagian',$data);
    }

}
