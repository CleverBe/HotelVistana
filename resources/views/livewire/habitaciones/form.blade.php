@include('common.modalHead')
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <h6>Número de habitacion</h6>
            <input type="text" wire:model.lazy="num_habitacion" class="form-control"
                maxlenght="25">
            @error('num_habitacion')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <h6>Tipo</h6>
            <select wire:model='tipo' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                <option value="NORMAL">NORMAL</option>
                <option value="MATRIMONIAL">MATRIMONIAL</option>
                <option value="VIP">VIP</option>
            </select>
            @error('tipo')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <h6>Precio</h6>
            <input type="text" wire:model.lazy="precio" class="form-control" maxlenght="25">
            @error('precio')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <h6>Piso</h6>
            <input type="text" wire:model.lazy="piso" class="form-control" maxlenght="25">
            @error('piso')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <h6>Wifi</h6>
            <select wire:model='wifi' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>
            @error('wifi')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input form-control" wire:model="image"
                accept="image/x-png,image/gif,image/jpeg">
            <label class="custom-file-label">Imagen {{ $image }}</label>

        </div>
    </div>

</div>
@include('common.modalFooter')
