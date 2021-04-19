<?php

namespace App\Http\Livewire\Undangan;

use Livewire\Component;
use App\Undangan;
use Livewire\WithFileUploads;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;


class AddUndangan extends Component
{
    use WithFileUploads;
    public $undanganId, $judul, $lokasi, $tanggalMulai, $tanggalAkhir, $jenis, $keterangan, $fileUndangan, $fileUndanganUrl;
    public function render()
    {
        // $undangan = Undangan::get();
        // $data['undangan'] = $undangan;
        return view('livewire.undangan.add-undangan');
    }

    protected $listeners = [
        'onEditUndangan' => 'edit',
        'onAddUndangan' => 'add',
    ];

    public function resetInput()
    {
        $this->undanganId = null;
        $this->judul = null;
        $this->lokasi = null;
        $this->tanggalMulai = null;
        $this->tanggalAkhir = null;
        $this->jenis = null;
        $this->keterangan = null;
        $this->fileUndangan = null;
        $this->fileUndanganUrl = null;
    }

    public function mount($id)
    {
        $this->resetInput();
        $this->undanganId = $id;
        
      
    
    }
    public function add()
    {
        $this->resetInput();
        $this->emit('onShowUndanganPegawai', null);
        $this->emit('onShowUndanganBagian', null);
      
    
    }

    public function edit($id)
    {
        $this->resetInput();
        $undangan = Undangan::FindOrFail($id);
        $this->undanganId = $undangan->id;
        $this->judul = $undangan->judul;
        $this->lokasi = $undangan->lokasi;
        $this->tanggalMulai = $undangan->tanggal_mulai;
        $this->tanggalAkhir = $undangan->tanggal_akhir;
        $this->jenis = $undangan->jenis;
        $this->keterangan = $undangan->keterangan;
        // $this->fileUndangan = $undangan->file_undangan;
        $this->fileUndanganUrl = $undangan->file_undangan;
        $this->emit('onShowUndanganPegawai', $id);
        $this->emit('onShowUndanganBagian', $id);
    }

    public function store()
    {
        $this->validate([
            'tanggalMulai' => 'required|max:100', //sesuai variabel /inputan
            'tanggalAkhir' => 'required|max:100',
            'jenis' => 'required',
            'judul' => 'required|max:100'
        ]);

        if ($this->fileUndangan != null) {
            $this->validate([
                'fileUndangan' => 'required|mimetypes:application/pdf|max:10000'
            ]);
        }

        // $check = Undangan::where('undangan.create');
        if ($this->undanganId != null) {
            $undangan = Undangan::FindOrFail($this->undanganId);
        } else {
            $undangan = new Undangan();
        }

        $undangan->judul = $this->judul;
        $undangan->lokasi = $this->lokasi;
        $undangan->tanggal_mulai = $this->tanggalMulai;
        $undangan->tanggal_akhir = $this->tanggalAkhir;
        $undangan->jenis = $this->jenis;
        $undangan->keterangan = $this->keterangan;

        if ($this->fileUndangan != null) {
            $filename = $this->fileUndangan->store('file_undangan'); // sesuai storage
            $undangan->file_undangan = $filename;
        }
        $undangan->save();
        $this->resetInput();                // setelah disimpan di riset
        $this->emit('onRefreshUndangan');   // trigger -> menyuruh action komponen yang lain
        $this->dispatchBrowserEvent('undangan-after-save'); // trigger -> event ke browser
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedFileUndangan()
    {
        $this->validate([
            'fileUndangan' => 'required|mimetypes:application/pdf|max:10000'
        ]);
        //$this->fileUndanganUrl = $this->fileUndangan->temporaryUrl();
    }
}
