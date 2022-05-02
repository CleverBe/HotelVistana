<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }}</b>
                </h4>

            </div>
            <!-- @include('common.searchbox') -->

            <div class="widget-content">

                <div class="form-inline">
                    <div class="form-group mr-5">
                        <select wire:model="role" class="form-control">
                            <option value="Elegir" selected>== Selecciona el Rol ==</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button wire:click.prevent="SyncAll()" type="button" class="btn btn-dark mbmobile inblock mr-5">Sincronizar Todos</button>

                    <button onclick="Revocar()" type="button" class="btn btn-dark mbmobile mr-5">Revocar Todos</button>
                </div>


                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered tablestriped mt-1">
                                <thead class="text-white" style="background: #c5c6cc">
                                    <tr>
                                        <th class="table-th text-withe text-center">ID</th>
                                        <th class="table-th text-withe text-center">PERMISO</th>
                                        <th class="table-th text-withe text-center">ROLES CON EL PERMISO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisos as $permiso)
                                    <tr>
                                        <td>
                                            <h6 class="text-center">{{ $permiso->id }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="n-check">
                                                <label class="new-control new-checkbox checkbox-primary">
                                                    <input type="checkbox"
                                                    wire:change="SyncPermiso($('#p' + {{ $permiso->id 
                                                    }}).is(':checked'), '{{ $permiso->name }}' )"
                                                    id="p{{ $permiso->id }}"
                                                    value="{{ $permiso->id }}"
                                                    class="new-control-input"
                                                    {{ $permiso->checked == 1 ? 'checked' : '' }}
                                                    >
                                                    <span class="new-control-indicator"></span>
                                                    <h6>{{ $permiso->name }}</h6>
                                                </label>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <h6>{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $permisos->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- @include('livewire.permisos.form') -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('sync-error', msg => {
            noty(msg)
        });
        window.livewire.on('permi', msg => {
            noty(msg)
        });
        window.livewire.on('syncall', msg => {
            noty(msg)
        });
        window.livewire.on('removeall', msg => {
            noty(msg)
        });
        

    });

    function Revocar() {
        Swal.fire({
            title: 'Esta seguro?',
            text: '¿Confirmas revocar todos los permisos? ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No, Cancelar!',
            confirmButtonText: 'Si , Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('revokeall', id)
                Swal.fire(
                    'Revocado!',
                    'Los permisos fueron revocados con éxito!'
                )
            }
        })
    }
</script>