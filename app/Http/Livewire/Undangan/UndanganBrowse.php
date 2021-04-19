<?php


namespace App\Http\Livewire\Undangan;

use Livewire\Component;
use App\Undangan;
use App\UndanganBagian;
use App\UndanganPegawai;
use Auth;


class UndanganBrowse extends Component
{
    public $undanganId,$message;
    public $updateMode = false;

    protected $listeners = [
        'onRefreshUndangan' => 'refresh',
    ];

    public function refresh(){
        $this->updateMode = false; // setelah simpan menjalani fungsi refresh data
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->undanganId = null;
        $this->message = null;
        $this->updateMode = false;
    }

    public function mount()
    {
        if(Auth::user()->role->name!='admin') {
            abort(404);
        }

        $this->resetInput();
    }

    public function render()
    {
        $undangan = Undangan::get();
        $data['undangan'] = $undangan;
        return view('livewire.undangan.undangan-browse',$data);
    }

    public function destroy($id)
    {
            UndanganPegawai::where('undangan_id',$id)->delete();
            // UndanganBagian::where('undangan_id',$id)->delete();
            Undangan::findOrFail($id)->delete();
    }
}
