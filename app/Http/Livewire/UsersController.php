<?php

namespace App\Http\Livewire;
use Spatie\Permission\Models\Role;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;

class UsersController extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name,$phone,$email,$status,$image,
    $password,$selected_id,$fileLoaded,$role, $profile;
    public $pageTitle, $componentName, $search;
    private $pagination = 3;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle='Listado';
        $this->componentName = 'Usuarios';
        $this->status = 'Elegir';
    }




    public function render()
    {
        if(strlen($this->search) > 0){
            $data=User::where('name','like', '%' . $this->search . '%')
            ->select('*')->orderBy('name','asc')
            ->paginate($this->pagination);
        }else{
            $data=User::select('*')->orderBy('name','asc')
            ->paginate($this->pagination);

        }
        



        return view('livewire.users.component',[
            'data' => $data,
            'roles' => Role::orderBy('name','asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function resetUI()
    {
        $this->name ='';
        $this->email='';
        $this->password='';
        $this->phone='';
        $this->search='';
        $this->status='Elegir';
        $this->selected_id=0;
    }

    public function Edit(User $user)
    {
        $this->selected_id=$user->id;
        $this->name=$user->name;
        $this->phone=$user->phone;
        $this->profile=$user->profile;
        $this->status=$user->status;
        $this->email=$user->email;
        $this->password='';

        $this->emit('show-modal','open!');
    }

    protected $listeners = [
        'deleteRow' => 'destroy',
        'resetUI' => 'resetUI'
    ];

    public function Store()
    {
        $rules=[
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'status' => 'required|not_in:Elegir',
            'profile' => 'require|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages=[
            'name.required' => 'Ingresa el nombre del usuario',
            'name.min' => 'El nombre del usuario debe tener al menos 3 caracteres',
            'email.required' => 'Ingresa una direccion de correo electrónico',
            'email.email' => 'Ingresa una dirección de correo válida',
            'email.unique' => 'El email ya existe en el sistema',
            'status.required' => 'Selecciona el estatus del usuario',
            'status.not_in' => 'Seleccine un estado distinto a Elegir',
            'profile.required' => 'Selecciona el perfil/rol del usuario',
            'profile.not_in' => 'Seleccioa un perfil/rol distinto a Elegir',
            'password.required' => 'Ingresa el password',
            'password.min' => 'El password debe tener al menos 3 caracteres'
        ];

        $this->validate($rules, $messages);

        DB::beginTransaction();
        try {
            $user= User::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'status' => $this->status,
                'profile' => $this->profile,
                'password' => bcrypt($this->password)
            ]);
            $user->syncRoles($this->profile);

            DB::commit();
            $this->resetUI();
            $this->emit('user-added','Usuario Registrado');
        }catch(Exception $e){
            DB::rollback();
            $this->emit('user-msg', 'No se pudo crear el usuario ' . $e->getMessage());
        }
    }

    public function Update()
    {
        $rules=[
            'email' => "required|email|unique:users,email,{$this->selected_id}",
            'name' => 'required|min:3',
            'status' => 'required|not_in:Elegir',
            'profile' => 'require|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages=[
            'name.required' => 'Ingresa el nombre del usuario',
            'name.min' => 'El nombre del usuario debe tener al menos 3 caracteres',
            'email.required' => 'Ingresa una direccion de correo electrónico',
            'email.email' => 'Ingresa una dirección de correo válida',
            'email.unique' => 'El email ya existe en el sistema',
            'status.required' => 'Selecciona el estatus del usuario',
            'status.not_in' => 'Seleccine un estado distinto a Elegir',
            'profile.required' => 'Selecciona el perfil/rol del usuario',
            'profile.not_in' => 'Seleccioa un perfil/rol distinto a Elegir',
            'password.required' => 'Ingresa el password',
            'password.min' => 'El password debe tener al menos 3 caracteres'
        ];

        $this->validate($rules, $messages);

        $user=User::find($this->selected_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        $this->resetUI();
        $this->emit('user-deleted','Usuario eliminado');
    }

}
