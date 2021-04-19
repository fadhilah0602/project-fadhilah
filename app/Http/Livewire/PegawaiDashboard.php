<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Pegawai;
use App\Undangan;
use Carbon\Carbon;

class PegawaiDashboard extends Component
{
    
    public function render()
    {
        // undangan yang akan datang 
        $undangan = Undangan::whereHas('UndanganPegawais', function ($query) {
            $query->where('pegawai_id', Auth::user()->pegawai_id); 
        })->where('tanggal_mulai','>',Carbon::now()->format('Y-m-d'))->get();

        $data['undangan'] = $undangan;

        // undangan yang telah berlalu
        $historyundangan = Undangan::whereHas('UndanganPegawais', function ($query) {
            $query->where('pegawai_id', Auth::user()->pegawai_id); 
        })->where('tanggal_mulai','<=',Carbon::now()->format('Y-m-d'))->get();;

        $data['historyundangan'] = $historyundangan;

        $pegawai=Pegawai::where('id',Auth::user()->pegawai_id)->first();
        $data['pegawai']=$pegawai;
        return view('livewire.pegawai-dashboard',$data);
    }

    protected $listeners = [
        'onRefreshPegawaiDashboard' => 'refresh',
    ];

    public function refresh() {

    }
}
