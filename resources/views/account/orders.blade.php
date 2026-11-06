@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold text-primary-pink mb-4">📦 Order History</h3>
    <div class="card border-0 shadow-sm p-4">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Order Number</th>
                    <th>កាលបរិច្ឆេទ</th>
                    <th>ទឹកប្រាក់សរុប</th>
                    <th>ស្ថានភាព</th>
                    <th>សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders ?? [] as $order)
                <tr>
                    <td><span class="fw-bold text-primary-pink">#{{ $order->order_number }}</span></td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td><span class="badge bg-secondary">{{ $order->status }}</span></td>
                    <td>
                        <a href="{{ route('orders.tracking', $order->order_number) }}" class="btn btn-sm btn-outline-dark">តាមដាន</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">មិនទាន់មានប្រវត្តិការបញ្ជាទិញនៅឡើយទេ។</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection