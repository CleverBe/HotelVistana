<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Reservas</title>
    <link rel="stylesheet" href="{{ asset('css/custom_pdf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_page.css') }}">
</head>

<body>
    <section class="header" style="top: -287px">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" colspan="2">
                    <span style="font-size: 25px; font-weight:bold;">HOTEL VISTANA</span>
                </td>
            </tr>
            <tr>
                <td width="30%" style="vertical-align: top; padding-top:10px; position:relative;">
                    <img src="{{ asset('assets/img/sie.png') }}" alt="" class="invoice-logo">
                </td>

                <td width="70%" class="text-left text-company" style="vertical-align: top; padding-top:10px;">
                    @if ($reportType == 0)
                        <span style="font-size: 16px;"><strong>Reporte de reservas del día</strong></span>
                    @else
                        <span style="font-size: 16px;"><strong>Reporte de reservas por fecha</strong></span>
                    @endif
                    <br>
                    @if ($reportType != 0)
                        <span style="font-size: 16px;"><strong>Fecha de consulta: {{ $dateFrom }} al
                                {{ $dateTo }}</strong></span>
                    @else
                        <span style="font-size: 16px;"><strong>Fecha de consulta:
                                {{ \Carbon\Carbon::now()->format('d-M-Y') }}</strong></span>
                    @endif

                    <br>

                    <span style="font-size: 14px;">Usuario: {{ $user }}</span>
                </td>
            </tr>
        </table>
    </section>

    <section style="margin-top: -110px;">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <thead>
                <tr>
                    <th width="10%">NOMBRE CLIENTE</th>
                    <th width="10%">EMAIL CLIENTE</th>
                    <th width="10%">NUM. HABITACION</th>
                    <th width="10%">TIPO</th>
                    <th width="10%">PISO</th>
                    <th width="10%">PRECIO HABITACION</th>
                    <th width="10%">NUMERO DIAS</th>
                    <th width="10%">TOTAL</th>
                    <th width="10%">FECHA INICIO</th>
                    <th width="10%">FECHA FIN</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td align="center">
                            {{ $d->user }}
                        </td>
                        <td align="center">
                            {{ $d->email }}
                        </td>
                        <td align="center">
                            {{ $d->numero_habitacion }}
                        </td>
                        <td align="center">
                            {{ $d->tipo }}
                        </td>
                        <td align="center">
                            {{ $d->piso }}
                        </td>
                        <td align="center">
                            {{ $d->precio }}
                        </td>
                        <td align="center">
                            {{ $d->numero_dias }}
                        </td>
                        <td align="center">
                            {{ $d->total }}
                        </td>
                        <td align="center">
                            {{ \Carbon\Carbon::parse($d->fecha_inicio)->format('d/m/Y') }}
                        </td>
                        <td align="center">
                            {{ \Carbon\Carbon::parse($d->fecha_fin)->format('d/m/Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <br>

            <tfoot>
                <tr>
                    <td align="center">
                        <span><b>TOTALES</b></span>
                    </td>
                    <td align="center" colspan="1">
                        <span><strong>${{ number_format($data->sum('total'), 2) }}</strong></span>
                    </td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
    </section>

    <section class="footer">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="20%">
                    <span>HOTEL VISTANA</span>
                </td>
            </tr>
        </table>
    </section>
</body>

</html>
