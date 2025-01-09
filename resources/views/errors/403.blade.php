<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container text-center">
        <h1>403 Forbidden</h1>
        <p>Sorry, you do not have permission to access this page.</p>
        <a href="{{ route('home.index') }}" class="btn btn-primary">Go to Home</a>
    </div>
</body>

</html>
<style>
    body {
        background-color: #f8f9fa;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        background-color: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #0056b3;
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    p {
        color: #6c757d;
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .btn-primary {
        background-color: #0056b3;
        border: none;
        padding: 10px 30px;
        font-size: 1.1rem;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background-color: #003d7a;
        transform: translateY(-2px);
    }
</style>
