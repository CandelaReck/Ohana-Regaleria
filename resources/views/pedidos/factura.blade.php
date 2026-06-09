<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #2E3A30;
            font-size: 13px;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #3F5643;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
        }
        .header p {
            margin: 4px 0 0;
            font-size: 12px;
            opacity: 0.85;
        }
        .factura-num {
            text-align: right;
            color: #D4A94D;
            font-size: 18px;
            font-weight: bold;
        }
        .contenido {
            padding: 30px;
        }
        .seccion {
            margin-bottom: 24px;
        }
        .seccion h3 {
            color: #3F5643;
            font-size: 14px;
            border-bottom: 2px solid #D4A94D;
            padding-bottom: 4px;
            margin-bottom: 10px;
        }
        .grid-2 {
            width: 100%;
        }
        .grid-2 td {
            width: 50%;
            vertical-align: top;
            padding: 0 10px 0 0;
        }
        table.productos {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.productos th {
            background-color: #3F5643;
            color: white;
            padding: 8px 10px;
            text-align: left;
            font-size: 12px;
        }
        table.productos td {
            padding: 8px 10px;
            border-bottom: 1px solid #eee;
        }
        table.productos tr:nth-child(even) td {
            background-color: #f9f5f0;
        }
        .total-box {
            text-align: right;
            margin-top: 16px;
        }
        .total-box .total-linea {
            font-size: 18px;
            font-weight: bold;
            color: #3F5643;
        }
        .total-box .monto {
            color: #D4A94D;
            font-size: 22px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #888;
            font-size: 11px;
            border-top: 1px solid #eee;
            padding-top: 12px;
        }
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            background-color: #f4ead8;
            color: #3F5643;
        }
    </style>
</head>
<body>

    <div class="header">
    <div style="display:flex; align-items:center; gap:14px">
        <img src="{{ $logoSrc }}" style="width:55px; height:55px; border-radius:50%; border:2px solid #D4A94D;">
        <div>
            <h1>Ohana Regalería</h1>
            <p>Detalles únicos pensados para sorprender</p>
        </div>
    </div>
    <div class="factura-num">
        Factura #{{ str_pad($pedido->id, 6, '0', STR_PAD_LEFT) }}
    </div>
</div>

    <div class="contenido">

        <table class="grid-2">
            <tr>
                <td>
                    <div class="seccion">
                        <h3>Datos del cliente</h3>
                        <p><strong>Nombre:</strong> {{ $pedido->cliente_nombre }}</p>
                        <p><strong>Email:</strong> {{ $pedido->cliente_email ?? '-' }}</p>
                        <p><strong>Teléfono:</strong> {{ $pedido->cliente_telefono ?? '-' }}</p>
                        <p><strong>Dirección:</strong> {{ $pedido->cliente_direccion ?? '-' }}</p>
                    </div>
                </td>
                <td>
                    <div class="seccion">
                        <h3>Detalle del pedido</h3>
                        <p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Estado:</strong> <span class="badge">{{ ucfirst($pedido->estado) }}</span></p>
                        <p><strong>Método de pago:</strong> {{ ucfirst(str_replace('_', ' ', $pedido->metodo_pago)) }}</p>
                        <p><strong>Estado pago:</strong> {{ ucfirst($pedido->estado_pago) }}</p>
                    </div>
                </td>
            </tr>
        </table>

        <div class="seccion">
            <h3>Productos</h3>
            <table class="productos">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido->items as $item)
                    <tr>
                        <td>{{ $item->producto_nombre }}</td>
                        <td>${{ number_format($item->precio_unitario, 0, ',', '.') }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>${{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-box">
                <span class="total-linea">Total: <span class="monto">${{ number_format($pedido->total, 0, ',', '.') }}</span></span>
            </div>
        </div>

        <div class="footer">
            Ohana Regalería · {{ config('app.url') }} · Gracias por tu compra 🌺
        </div>

    </div>

</body>
</html>