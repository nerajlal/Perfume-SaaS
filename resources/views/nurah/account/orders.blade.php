@extends('nurah.layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; margin: 40px auto; padding: 0 20px;">
    <div style="margin-bottom: 30px; display: flex; align-items: center; justify-content: space-between;">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 700;">My Orders</h1>
        <a href="{{ route('account.index') }}" style="text-decoration: underline; color: #000; font-weight: 600;">Back to Account</a>
    </div>

    @if($orders->count() > 0)
        <div class="orders-list">
            @foreach($orders as $order)
                <div style="border: 1px solid #e0e0e0; border-radius: 8px; margin-bottom: 20px; overflow: hidden;">
                    <div style="background: #f8f8f8; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e0e0e0;">
                        <div>
                            <span style="font-weight: 700; color: #333;">{{ $order->order_number }}</span>
                            <span style="color: #666; font-size: 13px; margin-left: 10px;">{{ $order->created_at->format('M d, Y') }}</span>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-weight: 600; font-size: 14px; color: {{ $order->payment_status == 'paid' ? 'green' : '#d4a574' }}; text-transform: uppercase;">
                                {{ $order->status }}
                            </div>
                            @if($order->tracking_number)
                                <div style="font-size: 13px; color: #666; margin-top: 4px;">
                                    Tracking: <span style="font-weight: 700; color: #333;">{{ $order->tracking_number }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                            <div>
                                <div style="font-size: 13px; color: #666; margin-bottom: 5px;">Total Amount</div>
                                <div style="font-weight: 700; font-size: 16px;">₹{{ number_format($order->total_amount) }}</div>
                            </div>
                            <div>
                                <div style="font-size: 13px; color: #666; margin-bottom: 5px;">Payment</div>
                                <div style="font-weight: 600; font-size: 14px; text-transform: uppercase;">{{ $order->payment_method }}</div>
                            </div>
                            <div>
                                <div style="font-size: 13px; color: #666; margin-bottom: 5px;">Items</div>
                                <div style="font-weight: 600; font-size: 14px;">{{ $order->items->count() }}</div>
                            </div>
                        </div>
                        
                        <!-- Order Items Preview -->
                        <div style="background: #fafafa; padding: 15px; border-radius: 5px;">
                            @foreach($order->items as $item)
                                <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 5px; color: #444;">
                                    <span>{{ $item->quantity }}x {{ $item->name }} @if($item->size) ({{ $item->size }}) @endif</span>
                                    <span>₹{{ number_format($item->total) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div style="text-align: center; padding: 60px 20px; background: #f9f9f9; border-radius: 8px;">
            <i class="fas fa-shopping-bag" style="font-size: 48px; color: #ddd; margin-bottom: 20px;"></i>
            <h3 style="font-family: 'Playfair Display', serif; font-size: 22px; margin-bottom: 10px;">No orders yet</h3>
            <p style="color: #666; margin-bottom: 20px;">Looks like you haven't placed any orders yet.</p>
            <a href="{{ route('all-products') }}" style="display: inline-block; background: #000; color: #fff; padding: 10px 25px; text-decoration: none; border-radius: 4px; font-weight: 600;">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
