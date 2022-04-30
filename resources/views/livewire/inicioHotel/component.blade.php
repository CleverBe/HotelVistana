<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b class="text-center">HABITACIONES DISPONIBLES EN EL HOTEL</b><br>
                    <b class="text-center">SELECCIONE UNA PARA HACER SU RESERVA</b>
                </h4>
            </div>
            <div>
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-sm-12 col-md-6 mb-4">
                            <div class="card component-card_2">
                                <img src="{{ asset('storage/habitaciones/' . $item->image) }}" class="card-img-top"
                                    alt="widget-card-2" height="450" width="180">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->tipo }}</h5>
                                    <p class="card-text">Habitacion amplia que incluye servicio de alimentación
                                        desayuno, almuerzo y cena.</p>
                                    <a href="#" class="btn btn-primary"
                                        wire:click.prevent="verDatos({{ $item->id }})">Ver Información</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('livewire.inicioHotel.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('item-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('item-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg)
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
        swal.fire({
            title: 'CONFIRMAR',
            icon: 'warning',
            text: '¿Confirmar eliminar la habitación ' + '"' + num + '"?.',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#383838',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                Swal.close()
            }
        })
    }
</script>
