<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #414141">
                <h5 class="modal-title text-white">
                    <b>{{$componentName}}</b> | {{$selected_id > 0 ? 'EDITAR':'CREAR'}}
                </h5>
                <h6 class="text-center text-warning" wire:loading>POR FAVOR ESPERE</h6>
            </div>
            <div class="modal-body">



                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Nombre del rol</h6>
                            <input type="text" wire:model.lazy="roleName" class="form-control" placeholder="ej: Admin" maxlength="255">
                            @error('roleName')
                            <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="resetUI()" 
                class="btn btn-dark close-btn text-info" data-dismiss="modal" 
                style="background: #3b3f5c">CANCELAR</button>

                @if ($selected_id < 1)
                    <button type="button" wire:click.prevent="CreateRole()" 
                    class="btn btn-dark close-btn text-info">GUARDAR</button>
                @else
                    <button type="button" wire:click.prevent="UpdateRole()" 
                    class="btn btn-dark close-btn text-info">ACTUALIZAR</button>
                @endif
            </div>
        </div>
    </div>
</div>