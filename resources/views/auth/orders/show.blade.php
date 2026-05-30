@extends('auth.layouts.head')

@section('main-content')
<div class="container-fluid px-4 mt-4 mb-5">
    <div class="mb-4">
        <a href="{{ route('auth.orders.index') }}" class="text-decoration-none text-info fw-bold">
            <i class="bi bi-arrow-left me-1"></i> Back to Orders Management
        </a>
    </div>

    <div class="card border-0 shadow-lg mb-4" style="background-color: #1e293b; border-radius: 15px;">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <span class="text-secondary small">Order Details</span>
                    <h2 class="text-white fw-bold mb-1">
                        <i class="bi bi-receipt me-2 text-info"></i> Order #ORD-{{ $order->id }}
                    </h2>
                    <div class="text-secondary small mt-2">
                        <i class="bi bi-calendar3 me-1 text-info"></i> Created at: {{ $order->created_at->format('M d, Y \a\t H:i') }}
                    </div>
                </div>

                <div class="bg-dark p-3 rounded-3 border border-secondary" style="min-width: 280px;">
                    @php
                    $statusClass = [
                    'pending' => 'bg-warning text-dark',
                    'processing' => 'bg-info text-white',
                    'completed' => 'bg-success text-white',
                    'cancelled' => 'bg-danger text-white'
                    ][$order->status] ?? 'bg-secondary';
                    @endphp

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-secondary small">Current Status:</span>
                        <span class="badge {{ $statusClass }} px-2 py-1 text-uppercase small" style="border-radius: 6px; font-size: 10px;">
                            {{ $order->status }}
                        </span>
                    </div>

                    <form action="{{ route('auth.orders.update', $order->id) }}" method="POST" class="input-group input-group-sm">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select bg-secondary bg-opacity-20 text-white border-secondary small">
                            <option value="pending" class="bg-dark text-white" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" class="bg-dark text-white" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" class="bg-dark text-white" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" class="bg-dark text-white" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-info text-white fw-bold px-3">
                            <i class="bi bi-arrow-repeat"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="mt-2 mb-3">
                <h4 class="text-white fw-bold mb-0">
                    <i class="bi bi-box-seam me-2 text-info"></i> Order Contents
                </h4>
            </div>

            <div class="card border-0 shadow-lg" style="background-color: #1e293b; border-radius: 15px; overflow: hidden;">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 table-dark">
                        <thead style="background-color: rgba(51, 65, 85, 0.5);">
                            <tr>
                                <th class="ps-4 py-3 border-0 text-secondary" style="font-size: 11px;">PRODUCT</th>
                                <th class="border-0 text-secondary" style="font-size: 11px;">PRICE</th>
                                <th class="border-0 text-secondary" style="font-size: 11px; width: 100px;">QTY</th>
                                <th class="text-end border-0 pe-4 text-secondary" style="font-size: 11px;">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05); transition: all 0.2s;" class="table-row-hover">
                                <td class="ps-4">
                                    <span class="fw-bold text-white small d-block">{{ $item->product_name ?? 'Product Deleted' }}</span>
                                    <span class="text-muted small" style="font-size: 11px;">Product ID: #{{ $item->product_id ?? '---' }}</span>
                                </td>
                                <td>
                                    <span class="text-light small">{{ number_format($item->price, 2) }} TMT</span>
                                </td>
                                <td class="text-secondary fw-bold small">
                                    {{ $item->quantity }} pcs.
                                </td>
                                <td class="text-end pe-4">
                                    <span class="text-info fw-bold small">{{ number_format($item->price * $item->quantity, 2) }} TMT</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mt-2 mb-3">
                <h4 class="text-white fw-bold mb-0">
                    <i class="bi bi-person-lines-fill me-2 text-info"></i> Delivery Info
                </h4>
            </div>

            <div class="card border-0 shadow-lg p-4 h-100" style="background-color: #1e293b; border-radius: 15px; min-height: 250px;">
                <div class="mb-3 pb-3" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <span class="text-secondary small d-block mb-1">Customer</span>
                    <span class="text-white fw-bold"><i class="bi bi-person me-2 text-info"></i>{{ $order->user_name ?? 'Guest User' }}</span>
                </div>

                <div class="mb-3 pb-3" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <span class="text-secondary small d-block mb-1">Phone Number</span>
                    <a href="tel:{{ $order->phone }}" class="text-info text-decoration-none fw-bold">
                        <i class="bi bi-telephone me-2"></i>{{ $order->phone ?? 'Not provided' }}
                    </a>
                </div>

                <div class="mb-4">
                    <span class="text-secondary small d-block mb-1">Delivery Address</span>
                    <span class="text-light small"><i class="bi bi-geo-alt me-2 text-danger"></i>{{ $order->delivery_address ?? 'Pickup / Not provided' }}</span>
                </div>

                <div class="mt-auto bg-dark p-3 rounded-3 border border-secondary text-center">
                    <span class="text-secondary small d-block mb-1">Grand Total</span>
                    <h3 class="text-success fw-bold mb-0">{{ number_format($order->total_price, 2) }} <small class="fs-6">TMT</small></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection