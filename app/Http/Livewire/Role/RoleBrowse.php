<?php

namespace App\Http\Livewire\Role;
use App\Role;
use App\User;
use Auth;
use Livewire\Component;

class RoleBrowse extends Component
{
    public $roleId, $namaRole,$deskripsiRole,$message;
    public $updateMode = false;
    public function resetInput()
    {
        $this->roleId = null;
        $this->namaRole = null;
        $this->deskripsiRole = null;
        $this->message = null;
        $this->updateMode = false;
    }

    public function mount()
    {
        if(Auth::user()->role->name!='admin') {
            abort(404);
        }

        $this->roleId = null;
        $this->resetInput();
    }
    public function store()
    {

        $this->validate([
            'namaRole' => 'required|max:100',
            
        ]);
        
        if($this->roleId!=null) {
            $role=Role::findOrFail($this->roleId);
            $role->name=$this->namaRole;
            $role->description=$this->deskripsiRole;
            $role->save();
        }
        else {
            $role= new Role();
            $role->name=$this->namaRole;
            $role->description=$this->deskripsiRole;
            $role->save();
            
        }
        $this->resetInput();
        
    }

    public function render()
    {
        $role = Role::get();
        $data['role']  = $role;
        return view('livewire.role.role-browse', $data);
    }

    public function edit($id)
    {
        $this->roleId=$id;
        $role=Role::findOrFail($id);
        $this->namaRole = $role->name;
        $this->deskripsiRole = $role->description;
    }

    public function delete($id)
    {
        $check=User::where('role_id',$id)->count();
        if($check>=1) {
            $this->message="Data Sudah Digunakan Pada User";
            
        }
        else{
            $role=Role::findOrFail($id);
            $role->delete();
            $this->resetInput();
        }

    }
    
}
