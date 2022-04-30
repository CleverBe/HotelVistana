<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #414141">
                <h5 class="modal-title text-white">
                    <b>Información de la habitación</b> | Realizar reserva
                </h5>
                <h6 class="text-center text-warning" wire:loading>POR FAVOR ESPERE</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Tipo de habitación</h6>
                            <h6 class="form-control"> {{ $tipo }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Piso en la que se encuentra</h6>
                            <h6 class="form-control"> {{ $piso }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Wifi</h6>
                            <h6 class="form-control"> {{ $wifi }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Precio por noche</h6>
                            <h6 class="form-control"> {{ $precio }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Numero de noches</h6>
                            <input type="number" wire:model="num_noches" class="form-control" maxlenght="25">
                            @error('num_noches')
                                <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Fecha inicio</h6>
                            <input type="date" wire:model.lazy="fecha_inicio" class="form-control">
                            @error('fecha_inicio')
                                <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Fecha Fin</h6>
                            <input type="date" wire:model.lazy="fecha_fin" disabled class="form-control">
                            @error('fecha_fin')
                                <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <h6>Total</h6>
                            <input type="number" wire:model.lazy="total" disables class="form-control" maxlenght="25">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info"
                    data-dismiss="modal" style="background: #3b3f5c">CANCELAR</button>
                <button type="button" wire:click.prevent="Store()"
                    class="btn btn-dark close-btn text-info">RESERVAR</button>
            </div>
        </div>
    </div>
</div>
