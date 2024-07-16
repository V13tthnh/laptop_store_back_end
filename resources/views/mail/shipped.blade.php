<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
</head>

<body style="font-family: Arial, sans-serif; color: #333;">
    <div style="max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd;">
        <h2 style="text-align: center; color: #333;">Thông tin đơn hàng</h2>

        <!-- Thông tin khách hàng -->
        <h3 style="color: #333;">Thông tin khách hàng</h3>
        <p><strong>Họ tên:</strong> {{ $order->name }}</p>
        <p><strong>Địa chỉ:</strong> {{$order->address->address_detail}}, {{$order->address->ward}},
            {{$order->address->district}},
            {{$order->address->provinces}}
        </p>
        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        <p><strong>Phương thức thanh toán:</strong>
            {{ $order->formality === 1 ? "Thanh toán VNPay" : "Thanh toán khi nhận hàng" }}</p>

        <!-- Bảng sản phẩm -->
        <h3 style="color: #333;">Sản phẩm</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>

                    <th style="border: 1px solid #ddd; padding: 8px;">Tên</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Số lượng</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Giá bán</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>

                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->name }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                            {{ $product->pivot->quantity }}
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">
                            {{ number_format($product->pivot->price, 0, ',', '.') . ' đ' }}
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">
                            {{ number_format($product->pivot->price * $product->pivot->quantity, 0, ',', '.') . ' đ' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Thông tin tổng kết -->
        <h3 style="color: #333; margin-left: 600px">Thông tin tổng kết</h3>
        <p style="margin-left: 600px"><strong>Tạm tính:</strong> {{number_format($order->subtotal, 0, ',', '.') . ' đ' }}</p>
        <p style="margin-left: 600px"><strong>Giảm giá:</strong> {{number_format($order->discount, 0, ',', '.') . ' đ'}}</p>
        <p style="margin-left: 600px"><strong>Tổng tiền thực tế:</strong> {{$order->total}} </p>
        <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
    </div>
</body>

</html>
