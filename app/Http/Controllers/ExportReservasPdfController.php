<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
use App\Models\User;


class ExportReservasPdfController extends Controller
{
    public function reportPDF($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $data = [];

        if ($reportType == 0) //ventas del dia
        {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d')   . ' 23:59:59';
        } else {
            $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($dateTo)->format('Y-m-d')     . ' 23:59:59';
        }

        if ($userId == 0) {
            $data = Reserva::join('users as u', 'u.id', 'reservas.user_id')
                ->join('reserva_room as rr', 'reservas.id', 'rr.reserva_id')
                ->join('rooms as r', 'r.id', 'rr.room_id')
                ->select(
                    'reservas.*',
                    'r.*',
                    'u.name as user',
                    'u.email',
                )
                ->whereBetween('reservas.created_at', [$from, $to])
                ->get();
        } else {
            $data = Reserva::join('users as u', 'u.id', 'reservas.user_id')
                ->join('reserva_room as rr', 'reservas.id', 'rr.reserva_id')
                ->join('rooms as r', 'r.id', 'rr.room_id')
                ->select(
                    'reservas.*',
                    'r.*',
                    'u.name as user',
                    'u.email',
                )
                ->whereBetween('reservas.created_at', [$from, $to])
                ->where('user_id', $userId)
                ->get();
        }

        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;

        $pdf = PDF::loadView('livewire.pdf.reporte', compact('data', 'reportType', 'user', 'dateFrom', 'dateTo'));

        return $pdf->stream('ReportReservas.pdf');
    }
}
