@extends('auth.layouts.head')

@section('main-content')
<div class="container-fluid px-4 mt-4">
    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4 justify-content-between text-white" style="background-color: #10b981; border-radius: 12px;">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-white fw-bold mb-0">
                <i class="bi bi-cart-check me-2 text-info"></i> Orders Management
            </h2>
            <span class="text-secondary small">Manage customer purchases and delivery statuses</span>
        </div>
    </div>

    <div class="card bg-dark border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="bg-secondary bg-opacity-10 text-secondary">
                    <tr>
                        <th class="ps-4 py-3 border-0">ORDER ID</th>
                        <th class="border-0">CUSTOMER / CONTACT</th>
                        <th class="border-0">TOTAL PRICE</th>
                        <th class="border-0">STATUS</th>
                        <th class="border-0">DATE</th>
                        <th class="text-center border-0 pe-4">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td class="ps-4 fw-bold">#ORD-{{ $order->id }}</td>
                        <td>
                            <div class="text-white">{{ $order->user_name ?? 'Guest User' }}</div>
                            <div class="text-muted small"><i class="bi bi-telephone me-1"></i>{{ $order->phone ?? 'No phone' }}</div>
                        </td>
                        <td>
                            <span class="text-info fw-bold fs-5">{{ number_format($order->total_price, 2) }} <small>TMT</small></span>
                        </td>
                        <td>
                            @php
                            $statusClass = [
                            'pending' => 'bg-warning text-dark',
                            'processing' => 'bg-info text-white',
                            'completed' => 'bg-success text-white',
                            'cancelled' => 'bg-danger text-white'
                            ][$order->status] ?? 'bg-secondary';
                            @endphp
                            <span class="badge {{ $statusClass }} px-3 py-2 fw-normal" style="border-radius: 8px; text-transform: uppercase; font-size: 10px;">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="text-muted small">
                            {{ $order->created_at->format('d M Y') }}<br>
                            {{ $order->created_at->format('H:i') }}
                        </td>
                        <td class="pe-4 text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-light border-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Manage
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark shadow-lg border-secondary">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i> View Details</a></li>
                                    <li>
                                        <hr class="dropdown-divider border-secondary">
                                    </li>
                                    <li>
                                        <h6 class="dropdown-header small text-info text-uppercase">Change Status</h6>
                                    </li>

                                    <form action="{{ route('auth.orders.update', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <li><button name="status" value="pending" class="dropdown-item small">Pending</button></li>
                                        <li><button name="status" value="processing" class="dropdown-item small">Processing</button></li>
                                        <li><button name="status" value="completed" class="dropdown-item small text-success">Completed</button></li>
                                        <li><button name="status" value="cancelled" class="dropdown-item small text-danger">Cancelled</button></li>
                                    </form>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4 mb-5">
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection