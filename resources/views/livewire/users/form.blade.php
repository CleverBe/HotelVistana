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
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <h6>Nombre del permiso</h6>
                            <input type="text" wire:model.lazy="name" 
                            class="form-control" placeholder="ej: Pedro" maxlength="255">
                            @error('name')
                            <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <h6>Teléfono</h6>
                            <input type="text" wire:model.lazy="phone" 
                            class="form-control" placeholder="ej: 77889988" maxlength="10">
                            @error('phone')
                            <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Email</h6>
                            <input type="text" wire:model.lazy="email" 
                            class="form-control" placeholder="ej: pedro@gmail.com">
                            @error('email')
                            <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Contraseña</h6>
                            <input type="text" wire:model.lazy="password" 
                            class="form-control">
                            @error('password')
                            <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Status</h6>
                            <select wire:model.lazy="status" class="form-control">
                                <option value="Elegir" selected>Elegir</option>
                                <option value="ACTIVE" selected>Activo</option>
                                <option value="LOCKED" selected>Bloqueado</option>
                            </select>
                            @error('status')
                            <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Asignar rol</h6>
                            <select wire:model.lazy="profile" class="form-control">
                                <option value="Elegir" selected>Elegir</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('profile')
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
                    <button type="button" wire:click.prevent="Store()" 
                    class="btn btn-dark close-btn text-info">GUARDAR</button>
                @else
                    <button type="button" wire:click.prevent="Update()" 
                    class="btn btn-dark close-btn text-info">ACTUALIZAR</button>
                @endif
            </div>
        </div>
    </div>
</div>