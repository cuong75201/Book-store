<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Không Tồn Tại</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .error-title {
            font-size: 48px;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        .back-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-title">404</div>
        <div class="error-message">Trang bạn yêu cầu không tồn tại hoặc đã bị xóa.</div>
        <a href="<?php echo $data['href'] ?>" class="back-button">Quay về trang chủ</a>
    </div>
</body>

</html>