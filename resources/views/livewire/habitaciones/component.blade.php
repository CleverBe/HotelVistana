<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">

                    <a href="javascript:void(0)" class="btn btn-dark" data-toggle="modal" data-target="#theModal">Agregar</a>

                </ul>
            </div>
            @include('common.searchbox')

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-unbordered table-hover mt-2">
                        <thead class="text-white" style="background: #c5c6cc">
                            <tr>
                                <th class="table-th text-withe text-center">Número habitación</th>
                                <th class="table-th text-withe text-center">Tipo</th>
                                <th class="table-th text-withe text-center">Precio</th>
                                <th class="table-th text-withe text-center">Piso</th>
                                <th class="table-th text-withe text-center">Wifi</th>
                                <th class="table-th text-withe text-center">Imagen</th>
                                <th class="table-th text-withe text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>
                                    <h6 class="text-center">{{ $item->numero_habitacion }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $item->tipo }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $item->precio }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $item->piso }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $item->wifi }}</h6>
                                </td>
                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/habitaciones/' . $item->image) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" wire:click="Edit({{ $item->id }})" class="btn btn-dark mtmobile" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="Confirm('{{ $item->id }}','{{ $item->numero_habitacion }}')" class="btn btn-dark" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.habitaciones.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('item-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('item-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg);
        });
        window.livewire.on('item-deleted', msg => {
            noty(msg)
        });
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
    });

    function Confirm(id, num) {
        Swal.fire({
            title: 'Esta seguro?',
            text: '¿Confirmar eliminar la habitación ' + '"' + num + '"?.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No, Cancelar!',
            confirmButtonText: 'Si , Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('deleteRow', id)
                Swal.fire(
                    'Eliminado!',
                    'La habitacion fue eliminada.'
                )
            }
        })
    }
</script>