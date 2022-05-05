<?php

namespace App\Http\Livewire;

use App\Models\Reserva;
use App\Models\Room;
use Carbon\Carbon;
use Livewire\Component;

class InicioHotelController extends Component
{
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
        $this->componentName = 'Habitaciones Disponibles';
        $this->selected_id = 0;
        $this->num_habitacion = '';
        $this->tipo = '';
        $this->precio = 0;
        $this->piso = '';
        $this->wifi = '';
        $this->num_noches = 1;
        $this->fecha_inicio = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->fecha_fin = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->total = 1;
    }

    public function render()
    {
        if ($this->num_noches > 0) {
            $NOCHES = $this->num_noches - 1;
            $this->fecha_fin = strtotime('+' . $NOCHES . ' day', strtotime($this->fecha_inicio));
            $this->fecha_fin = date('Y-m-d', $this->fecha_fin);
            $this->total = $this->precio * $this->num_noches;
        }


        $data = Room::orderBy('id', 'desc')->where('disponibilidad', 'SI')->paginate($this->pagination);

        return view('livewire.inicioHotel.component', [
            'data' => $data,
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
    public function verDatos(Room $habitacion)
    {
        $this->selected_id = $habitacion->id;
        $this->num_habitacion = $habitacion->numero_habitacion;
        $this->tipo = $habitacion->tipo;
        $this->precio = $habitacion->precio;
        $this->piso = $habitacion->piso;
        $this->wifi = $habitacion->wifi;

        $this->emit('show-modal', 'show modal!');
    }
    public function Store()
    {
        $rules = [
            'num_noches' => 'required|integer|gt:0',
        ];
        $messages = [
            'num_noches.required' => 'El número de noches es requerido',
            'num_noches.integer' => 'El número de noches debe ser un número',
            'num_noches.gt' => 'El número de noches debe ser mínimo 1',
        ];
        $this->validate($rules, $messages);

        $reserva = Reserva::create([
            'numero_dias' => $this->num_noches,
            'total' => $this->total,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'estado' => 'REALIZADA',
            'user_id' => Auth()->user()->id,
        ]);

        $room = Room::find($this->selected_id);
        $room->update([
            'disponibilidad' => 'NO'
        ]);
        $room->save();

        $reserva->habitaciones()->attach($room);

        $this->resetUI();
        $this->emit('modal-hide', 'Se realizó la solicitud de la reserva');
    }
    public function resetUI()
    {
        $this->selected_id = 0;
        $this->num_habitacion = '';
        $this->tipo = '';
        $this->precio = 0;
        $this->piso = '';
        $this->wifi = '';
        $this->num_noches = 1;
        $this->fecha_inicio = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->fecha_fin = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->total = 1;
        $this->resetValidation();
    }
}
