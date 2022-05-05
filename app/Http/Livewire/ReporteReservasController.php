<?php

namespace App\Http\Livewire;

use App\Models\Reserva;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ReporteReservasController extends Component
{
    public $componentName, $data, $details, $sumaReservas, $countDetails, $reportType,
        $userId, $dateFrom, $dateTo, $reservaID;

    public function mount()
    {
        $this->componentName = 'Reportes de reservas de habitaciones';
        $this->data = [];
        $this->details = [];
        $this->sumaReservas = 0;
        $this->countDetails = 0;
        $this->reportType = 0;
        $this->userId = 0;
        $this->reservaID = 0;
        $this->dateFrom = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->dateTo = Carbon::parse(Carbon::now())->format('Y-m-d');
    }

    public function render()
    {
        $this->reservas();

        return view('livewire.reportes_reservas.component', [
            'users' => User::orderBy('name', 'asc')->get()
        ])->extends('layouts.theme.app')
            ->section('content');
    }

    public function reservas()
    {
        if ($this->reportType == 0) {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d')   . ' 23:59:59';
        } else {
            $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($this->dateTo)->format('Y-m-d')     . ' 23:59:59';
        }

        if ($this->reportType == 1 && ($this->dateFrom == '' || $this->dateTo == '')) {
            return;
        }

        if ($this->userId == 0) {
            $this->data = Reserva::join('users as u', 'u.id', 'reservas.user_id')
                ->join('reserva_room as rr', 'reservas.id', 'rr.reserva_id')
                ->join('rooms as r', 'r.id', 'rr.room_id')
                ->select(
                    'reservas.*',
                    'r.*',
                    'u.name as user',
                    'u.phone',
                )
                ->whereBetween('reservas.created_at', [$from, $to])
                ->get();
        } else {
            $this->data = Reserva::join('users as u', 'u.id', 'reservas.user_id')
                ->join('reserva_room as rr', 'reservas.id', 'rr.reserva_id')
                ->join('rooms as r', 'r.id', 'rr.room_id')
                ->select(
                    'reservas.*',
                    'r.*',
                    'u.name as user',
                    'u.phone',
                )
                ->whereBetween('reservas.created_at', [$from, $to])
                ->where('user_id', $this->userId)
                ->get();
        }
    }
}
