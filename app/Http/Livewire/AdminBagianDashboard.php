<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Pegawai;
use App\Undangan;

class AdminBagianDashboard extends Component
{
    public function render()
    {
        $undangan = Undangan::whereHas('UndanganBagians', function ($query) {
        $query->where('bagian_id', Auth::user()->pegawai->bagian_id); 
        })->get();

        $data['undangan'] = $undangan;

        $pegawai=Pegawai::where('id',Auth::user()->pegawai_id)->first();
        $data['pegawai']=$pegawai;
        return view('livewire.admin-bagian-dashboard',$data);
    }
}
