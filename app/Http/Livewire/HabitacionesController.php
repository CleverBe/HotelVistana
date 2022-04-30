<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class HabitacionesController extends Component
{
    use WithPagination;
    use WithFileUploads;
    public  $search, $selected_id;
    public  $pageTitle, $componentName;
    public $num_habitacion, $tipo, $precio, $piso, $wifi, $image;
    private $pagination = 5;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Habitaciones';
        $this->selected_id = 0;
        $this->num_habitacion = '';
        $this->tipo = 'Elegir';
        $this->precio = '';
        $this->piso = '';
        $this->wifi = 'Elegir';
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $data = Room::where('tipo', 'like', $this->search . '%')->paginate($this->pagination);
        } else {
            $data = Room::orderBy('id', 'desc')->paginate($this->pagination);
        }
        return view('livewire.habitaciones.component', [
            'data' => $data,
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Store()
    {
        $rules = [
            'num_habitacion' => 'required',
            'tipo' => 'required|not_in:Elegir',
            'precio' => 'required',
            'piso' => 'required',
            'wifi' => 'required|not_in:Elegir'
        ];
        $messages = [
            'num_habitacion.required' => 'El número de habitación es requerido',
            'tipo.required' => 'El tipo de habitación requerido',
            'tipo.not_in' => 'El tipo de habitación debe ser diferente de Elegir',
            'precio.required' => 'El precio de la habitación requerido',
            'piso.required' => 'El piso de la habitación es requerido',
            'wifi.required' => 'Este campo es requerido',
            'wifi.not_in' => 'El tipo de habitacion debe ser diferente de Elegir',
        ];
        $this->validate($rules, $messages);

        $room = Room::create([
            'numero_habitacion' => $this->num_habitacion,
            'tipo' => $this->tipo,
            'precio' => $this->precio,
            'piso' => $this->piso,
            'wifi' => $this->wifi,
        ]);
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/habitaciones', $customFileName);
            $room->image = $customFileName;
            $room->save();
        }
        $this->resetUI();

        $this->emit('item-added', 'Habitación Registrada');
    }
    public function Edit(Room $habitacion)
    {
        $this->selected_id = $habitacion->id;
        $this->num_habitacion = $habitacion->numero_habitacion;
        $this->tipo = $habitacion->tipo;
        $this->precio = $habitacion->precio;
        $this->piso = $habitacion->piso;
        $this->wifi = $habitacion->wifi;
        $this->image = null;

        $this->emit('show-modal', 'show modal!');
    }
    public function Update()
    {
        $rules = [
            'num_habitacion' => 'required',
            'tipo' => 'required|not_in:Elegir',
            'precio' => 'required',
            'piso' => 'required',
            'wifi' => 'required|not_in:Elegir'
        ];
        $messages = [
            'num_habitacion.required' => 'El número de habitación es requerido',
            'tipo.required' => 'El tipo de habitación requerido',
            'tipo.not_in' => 'El tipo de habitación debe ser diferente de Elegir',
            'precio.required' => 'El precio de la habitación requerido',
            'piso.required' => 'El piso de la habitación es requerido',
            'wifi.required' => 'Este campo es requerido',
            'wifi.not_in' => 'El tipo de habitacion debe ser diferente de Elegir',
        ];
        $this->validate($rules, $messages);
        $room = Room::find($this->selected_id);
        $room->update([
            'numero_habitacion' => $this->num_habitacion,
            'tipo' => $this->tipo,
            'precio' => $this->precio,
            'piso' => $this->piso,
            'wifi' => $this->wifi,
        ]);
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/habitaciones', $customFileName);
            $imageTemp = $room->image;
            $room->image = $customFileName;
            $room->save();

            if ($imageTemp != null) {
                if (file_exists('storage/habitaciones/' . $imageTemp)) {
                    unlink('storage/habitaciones/' . $imageTemp);
                }
            }
        }
        $this->resetUI();
        $this->emit('item-updated', 'Habitacion Actualizada');
    }
    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Room $room)
    {
        $imageTemp = $room->image;
        $room->delete();

        if ($imageTemp != null) {
            if (file_exists('storage/habitaciones/' . $imageTemp)) {
                unlink('storage/habitaciones/' . $imageTemp);
            }
        }
        $this->resetUI();
        $this->emit('item-deleted', 'Habitacion Eliminada');
    }
    public function resetUI()
    {
        $this->selected_id = 0;
        $this->num_habitacion = '';
        $this->tipo = 'Elegir';
        $this->precio = '';
        $this->piso = '';
        $this->wifi = 'Elegir';
        $this->image = null;
        $this->resetValidation();
    }
}
