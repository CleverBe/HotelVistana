<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{ $componentName }}</b></h4>
            </div>

            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <h6>Elige el usuario</h6>
                        <div class="form-group">
                            <select wire:model="userId" class="form-control">
                                <option value="">Todos</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <h6>Elige el tipo de Reporte</h6>
                        <div class="form-group">
                            <select wire:model="reportType" class="form-control">
                                <option value="0">Transacciones del Día</option>
                                <option value="1">Transacciones por Fecha</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <h6>Fecha desde</h6>
                        <div class="form-group">
                            <input @if ($reportType == 0) disabled @endif type="date" wire:model="dateFrom"
                                class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <h6>Fecha hasta</h6>
                        <div class="form-group">
                            <input @if ($reportType == 0) disabled @endif type="date" wire:model="dateTo"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 mt-4">
                        <a class=" btn btn-dark btn-block {{ count($data) < 1 ? 'disabled' : '' }}"
                            href="{{ url('reporteReservas/pdf' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}">
                            Generar
                            PDF</a>
                    </div>


                    <div class="col-sm-12 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-unbordered table-hover mt-1">
                                <thead class="text-white" style="background: #c5c6cc">
                                    <tr>
                                        <th class="table-th text-withe text-center">NOMBRE CLIENTE</th>
                                        <th class="table-th text-withe text-center">EMAIL CLIENTE</th>
                                        <th class="table-th text-withe text-center">NUM. HABITACION</th>
                                        <th class="table-th text-withe text-center">TIPO</th>
                                        <th class="table-th text-withe text-center">PISO</th>
                                        <th class="table-th text-withe text-center">PRECIO HABITACION</th>
                                        <th class="table-th text-withe text-center">NUMERO DIAS</th>
                                        <th class="table-th text-withe text-center">TOTAL</th>
                                        <th class="table-th text-withe text-center">FECHA INICIO</th>
                                        <th class="table-th text-withe text-center">FECHA FIN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) < 1)
                                        <tr>
                                            <td colspan="9">
                                                <h5 class="text-center">Sin Resultados</h5>
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach ($data as $d)
                                        <tr>
                                            <td class="text-center">
                                                <h6>{{ $d->user }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->email }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->numero_habitacion }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->tipo }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->piso }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->precio }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->numero_dias }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->total }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>
                                                    {{ \Carbon\Carbon::parse($d->fecha_inicio)->format('d/m/Y') }}
                                                </h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>
                                                    {{ \Carbon\Carbon::parse($d->fecha_fin)->format('d/m/Y') }}
                                                </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('item', msg => {
            noty(msg)
        });

        //eventos
        window.livewire.on('show-modal', msg => {
            $('#modalDetails').modal('show')
        });
    })
</script>
