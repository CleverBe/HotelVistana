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
                            @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <h6 class="text-center">{{ $role->id }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $role->name }}</h6>
                                </td>
                                
                                <td class="text-center">
                                    <a href="javascript:void(0)" 
                                    wire:click="Edit({{ $role->id }})" 
                                    class="btn btn-dark mtmobile" title="Editar Registro">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    onclick="Confirm('{{ $role->id }}')" 
                                    class="btn btn-dark" title="Eliminar Registro">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $roles->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.roles.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('role-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('role-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg);
        });
        window.livewire.on('role-deleted', msg => {
            noty(msg)
        });
        window.livewire.on('role-exists', msg => {
            noty(msg)
        });
        window.livewire.on('role-error', msg => {
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
            text: '¿Confirmar eliminar el Rol? ',
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
                    'El rol fue eliminado.'
                )
            }
        })
    }
</script>