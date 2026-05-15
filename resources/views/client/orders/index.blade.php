@extends('client.layouts.head')

@section('main-content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-white mb-0">
                    <i class="bi bi-box-seam me-2 text-info"></i> {{ __('app.my_orders') }}
                </h2>
                <span class="badge bg-soft-info text-info border border-info px-3 py-2">
                    {{ __('app.total_count') }}: {{ $orders->total() }}
                </span>
            </div>

            <div class="card border-0 shadow-lg" style="background: #1e293b; border-radius: 24px; overflow: hidden;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0 align-middle">
                            <thead class="bg-black bg-opacity-20">
                                <tr>
                                    <th class="px-4 py-4 border-0 text-secondary small text-uppercase">{{ __('app.order_no') }}</th>
                                    <th class="py-4 border-0 text-secondary small text-uppercase">{{ __('app.product') }}</th>
                                    <th class="py-4 border-0 text-secondary small text-uppercase">{{ __('app.date') }}</th>
                                    <th class="py-4 border-0 text-secondary small text-uppercase">{{ __('app.status') }}</th>
                                    <th class="py-4 border-0 text-secondary small text-uppercase">{{ __('app.amount') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr style="border-bottom: 1px solid #334155; transition: all 0.3s ease;">
                                    <td class="px-4 py-4 fw-bold">#{{ $order->id }}</td>
                                    <td class="py-4">
                                        <div class="d-flex align-items-center">
                                            @if($order->items->isNotEmpty())
                                            @php $firstItem = $order->items->first(); @endphp
                                            <img src="{{ (file_exists(public_path('img/' . $firstItem->product_id . '.jpg'))) 
                          ? asset('img/' . $firstItem->product_id . '.jpg') 
                          : asset('img/default.jpg') }}"
                                                class="rounded-3 bg-secondary me-2"
                                                style="width: 40px; height: 40px; object-fit: cover;"
                                                alt="product">

                                            <div>
                                                <span class="d-block text-white">
                                                    {{ $firstItem->product->{'name_' . app()->getLocale()} ?? $firstItem->product->name }}
                                                    <span class="text-info fw-bold">x{{ $firstItem->quantity }}</span>
                                                </span>

                                                @if($order->items->count() > 1)
                                                <small class="text-muted">+ {{ __('app.more_items', ['count' => $order->items->count() - 1]) }}</small>
                                                @endif
                                            </div>
                                            @else
                                            <span class="text-muted small">{{ __('app.empty_order') }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 text-secondary">{{ $order->created_at->format('d.m.Y') }}</td>
                                    <td class="py-4">
                                        @php
                                        $statusColors = [
                                        'pending' => 'bg-warning text-dark',
                                        'completed' => 'bg-success',
                                        'cancelled' => 'bg-danger',
                                        'processing' => 'bg-info'
                                        ];
                                        $badgeClass = $statusColors[$order->status] ?? 'bg-secondary';
                                        @endphp
                                        <span class="badge {{ $badgeClass }} rounded-pill px-3 py-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            {{ __('app.status_' . $order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-4">
                                        <span class="text-info fw-bold">{{ number_format($order->total_price, 2) }}</span>
                                        <small class="text-secondary">TMT</small>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-secondary">
                                        <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
                                        {{ __('app.no_orders') }}
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <div class="custom-pagination">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection