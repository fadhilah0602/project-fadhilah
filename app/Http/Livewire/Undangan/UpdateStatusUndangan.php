<?php

namespace App\Http\Livewire\Undangan;
use Illuminate\Support\Facades\Auth;

use App\UndanganPegawai;
use Carbon\Carbon;
use Livewire\Component;

class UpdateStatusUndangan extends Component
{
    public $undanganId,$statusField,$isShow;

    public function mount() {
        $this->resetInput();
        
    }

    public function show($id,$field)
    {
        $this->isShow='true';
        $this->undanganId=$id;
        $this->statusField=$field;
    }

    public function resetInput() {
        $this->undanganId=null;
        $this->statusField=null;
        $this->isShow='false';
    }

    public function hide() {
        $this->isShow='false';
    }

    protected $listeners = [
        'onShowUpdateStatusUndanganListener' => 'show',
    ];

    public function update()
    {
        
        $pegawaiId=Auth::user()->pegawai->id;
        $undanganpegawai=UndanganPegawai::where('undangan_id',$this->undanganId)->where('pegawai_id',$pegawaiId)->first();
        if($this->statusField=='status_konfirmasi') {
            $undanganpegawai->status_konfirmasi='Sudah';
            $undanganpegawai->tanggal_konfirmasi=Carbon::now()->format('Y-m-d');
            $undanganpegawai->save();
        }
        elseif($this->statusField=='status_kehadiran'){
            $undanganpegawai->status_kehadiran='Hadir';
            $undanganpegawai->tanggal_kehadiran=Carbon::now()->format('Y-m-d');
            $undanganpegawai->save();
        }
        $this->resetInput();
        $this->emit('onRefreshPegawaiDashboard');
    }
    
    public function render()
    {
        return view('livewire.undangan.update-status-undangan');
    }
}
