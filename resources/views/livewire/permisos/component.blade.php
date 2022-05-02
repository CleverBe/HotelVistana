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
                                <th class="table-th text-withe text-center">ID</th>
                                <th class="table-th text-withe text-center">DESCRIPCIÓN</th>
                                <th class="table-th text-withe text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permisos as $permiso)
                            <tr>
                                <td>
                                    <h6 class="text-center">{{ $permiso->id }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $permiso->name }}</h6>
                                </td>
                                
                                <td class="text-center">
                                    <a href="javascript:void(0)" 
                                    wire:click="Edit({{ $permiso->id }})" 
                                    class="btn btn-dark mtmobile" title="Editar Registro">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    onclick="Confirm('{{ $permiso->id }}')" 
                                    class="btn btn-dark" title="Eliminar Registro">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $permisos->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.permisos.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('permiso-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('permiso-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg);
        });
        window.livewire.on('permiso-deleted', msg => {
            noty(msg)
        });
        window.livewire.on('permiso-exists', msg => {
            noty(msg)
        });
        window.livewire.on('permiso-error', msg => {
            noty(msg)
        });
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        
    });

    function Confirm(id) {
        Swal.fire({
            title: 'Esta seguro?',
            text: '¿Confirmar eliminar el Permiso? ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No, Cancelar!',
            confirmButtonText: 'Si , Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('destroy', id)
                Swal.fire(
                    'Eliminado!',
                    'El permiso fue eliminado.'
                )
            }
        })
    }
</script>