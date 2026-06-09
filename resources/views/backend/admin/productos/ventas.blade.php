@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
<section class="py-5" style="background: var(--crema);">
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Ventas</h2>
        <a href="{{ route('admin') }}" class="btn btn-outline-dark">← Volver al panel</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- SELECTOR DE PERÍODO --}}
    <div class="card shadow rounded-4 p-3 mb-4">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="fw-semibold me-1">Período:</span>
            @foreach(['7' => 'Últimos 7 días', '30' => 'Últimos 30 días', '90' => 'Últimos 90 días', 'año' => 'Este año'] as $val => $label)
                <a href="{{ route('admin.ventas', ['periodo' => $val]) }}"
                   class="btn btn-sm {{ $periodo == $val ? 'btn-dark' : 'btn-outline-secondary' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- KPIs --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <p class="text-muted small mb-1">Ventas concretadas</p>
                <p class="fs-4 fw-semibold mb-0">{{ $totalVentas }}</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <p class="text-muted small mb-1">Ingresos totales</p>
                <p class="fs-4 fw-semibold mb-0">${{ number_format($ingresoTotal, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <p class="text-muted small mb-1">Ticket promedio</p>
                <p class="fs-4 fw-semibold mb-0">${{ number_format($ticketPromedio, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <p class="text-muted small mb-1">Pedidos cancelados</p>
                <p class="fs-4 fw-semibold mb-0">{{ $cancelados }}</p>
                <p class="text-muted small mb-0">(no incluidos en ventas)</p>
            </div>
        </div>
    </div>

    {{-- GRÁFICOS --}}
    <div class="card shadow rounded-4 p-4 mb-4">
        <h6 class="mb-3">Ingresos por día</h6>
        <canvas id="lineChart" height="80"></canvas>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow rounded-4 p-4 h-100">
                <h6 class="mb-3">Método de pago</h6>
                <canvas id="pagoChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow rounded-4 p-4 h-100">
                <h6 class="mb-3">Productos más vendidos</h6>
                <table class="table table-sm mb-0">
                    <thead><tr><th>#</th><th>Producto</th><th>Uds.</th><th>Ingresos</th></tr></thead>
                    <tbody>
                        @forelse($topProductos as $i => $prod)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $prod->nombre }}</td>
                            <td>{{ $prod->unidades }}</td>
                            <td>${{ number_format($prod->ingresos, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-muted text-center">Sin datos</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- FILTROS DE TABLA --}}
    <div class="card shadow rounded-4 p-4 mb-4">
        <h6 class="mb-3">Buscar ventas</h6>
        <form method="GET" action="{{ route('admin.ventas') }}">
            <input type="hidden" name="periodo" value="{{ $periodo }}">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Método de pago</label>
                    <select name="metodo_pago" class="form-select">
                        <option value="">Todos</option>
                        <option value="efectivo"        {{ request('metodo_pago') == 'efectivo'        ? 'selected' : '' }}>Efectivo</option>
                        <option value="transferencia"   {{ request('metodo_pago') == 'transferencia'   ? 'selected' : '' }}>Transferencia</option>
                        <option value="tarjeta_debito"  {{ request('metodo_pago') == 'tarjeta_debito'  ? 'selected' : '' }}>Tarjeta débito</option>
                        <option value="tarjeta_credito" {{ request('metodo_pago') == 'tarjeta_credito' ? 'selected' : '' }}>Tarjeta crédito</option>
                        <option value="mercado_pago"    {{ request('metodo_pago') == 'mercado_pago'    ? 'selected' : '' }}>Mercado Pago</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Cliente</label>
                    <input type="text" name="cliente" class="form-control"
                        placeholder="Nombre del cliente"
                        value="{{ request('cliente') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Desde</label>
                    <input type="date" name="fecha_desde" class="form-control"
                        value="{{ request('fecha_desde') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Hasta</label>
                    <input type="date" name="fecha_hasta" class="form-control"
                        value="{{ request('fecha_hasta') }}">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-dark w-100">Filtrar</button>
                </div>

            </div>

            @if(request()->hasAny(['metodo_pago', 'cliente', 'fecha_desde', 'fecha_hasta']))
                <div class="mt-2">
                    <a href="{{ route('admin.ventas', ['periodo' => $periodo]) }}"
                       class="btn btn-outline-secondary btn-sm">Limpiar filtros</a>
                </div>
            @endif
        </form>
    </div>

    {{-- TABLA DE VENTAS --}}
    @if($ventas->isEmpty())
        <div class="alert alert-info text-center">No hay ventas que coincidan con los filtros.</div>
    @else
        <div class="card shadow rounded-4 mb-4">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha entrega</th>
                        <th>Total</th>
                        <th>Método de pago</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->user->name ?? 'Sin usuario' }}</td>
                        <td>{{ $venta->updated_at->format('d/m/Y H:i') }}</td>
                        <td>${{ number_format($venta->total, 0, ',', '.') }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $venta->metodo_pago)) }}</td>
                        <td>
                            <a href="{{ route('admin.pedidos.ver', $venta->id) }}"
                               class="btn btn-sm btn-dark">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $ventas->links() }}
        </div>
    @endif

</div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    const diasLabels = @json($ingresosPorDia->pluck('fecha')->map(fn($f) => \Carbon\Carbon::parse($f)->format('d/m')));
    const diasData   = @json($ingresosPorDia->pluck('total')->map(fn($v) => (int) $v));

    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: diasLabels,
            datasets: [{
                label: 'Ingresos',
                data: diasData,
                borderColor: '#212529',
                backgroundColor: 'rgba(33,37,41,0.07)',
                borderWidth: 2,
                pointRadius: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { ticks: { callback: v => '$' + v.toLocaleString('es-AR') } }
            }
        }
    });

    const pagoLabels = @json($porMetodoPago->pluck('metodo_pago')->map(fn($m) => ucfirst(str_replace('_', ' ', $m))));
    const pagoData   = @json($porMetodoPago->pluck('cantidad'));

    new Chart(document.getElementById('pagoChart'), {
        type: 'doughnut',
        data: {
            labels: pagoLabels,
            datasets: [{
                data: pagoData,
                backgroundColor: ['#212529','#495057','#868e96','#ced4da','#adb5bd'],
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom', labels: { font: { size: 12 } } } }
        }
    });
</script>
@endpush
@endsection