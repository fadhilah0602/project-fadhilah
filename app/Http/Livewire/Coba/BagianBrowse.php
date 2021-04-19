<?php

namespace App\Http\Livewire\Coba;

use App\Bagian;
use App\Pegawai;
use Livewire\Component;

class BagianBrowse extends Component
{
    public $bagianId, $namaBagian,$message;
    public $updateMode = false;
    public function resetInput()
    {
        $this->bagianId = null;
        $this->namaBagian = null;
        $this->message = null;
        $this->updateMode = false;
    }

    public function mount()
    {
        $this->resetInput();
    }
    public function store()
    {

        $this->validate([
            'namaBagian' => 'required|max:100',
            
        ]);
        
        if($this->bagianId!=null) {
            $bagian=Bagian::findOrFail($this->bagianId);
            $bagian->name=$this->namaBagian;
            $bagian->save();
        }
        else {
            $bagian= new Bagian();
            $bagian->name=$this->namaBagian;
            $bagian->save();
            
        }
        $this->resetInput();
        
    }

    public function render()
    {
        $bagian = Bagian::get();
        $data['bagian']  = $bagian;
        return view('livewire.coba.bagian-browse', $data);
    }

    public function edit($id)
    {
        $this->bagianId=$id;
        $bagian=Bagian::findOrFail($id);
        $this->namaBagian = $bagian->name;
    }


    public function delete($id)
    {
        $check=Pegawai::where('bagian_id',$id)->count();
        if($check>=1) {
            $this->message="Data Sudah Digunakan Pada Pegawai";
            
        }
        else{
            $bagian=Bagian::findOrFail($id);
            $bagian->delete();
            $this->resetInput();
        }
        

    }
}
