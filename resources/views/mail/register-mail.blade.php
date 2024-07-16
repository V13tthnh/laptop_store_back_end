<!-- resources/views/emails/verify-email.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Xác nhận Email</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; margin: 0; padding: 20px;">
    <div
        style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #333333;">Xác nhận Email của bạn</h2>
        <p>Xin chào {{ $account->full_name }},</p>
        <p>Cảm ơn bạn đã đăng ký tài khoản. Vui lòng nhấn vào nút bên dưới để xác nhận địa chỉ email của bạn:</p>
        <a href="http://localhost:3000/email/verify/{{$account->email}}"
            style="display: inline-block; background-color: #28a745; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Xác
            nhận Email</a>
        <p>Nếu bạn không tạo tài khoản này, vui lòng bỏ qua email này.</p>
        <p>Trân trọng,<br>Đội ngũ của chúng tôi</p>
    </div>
</body>

</html>
