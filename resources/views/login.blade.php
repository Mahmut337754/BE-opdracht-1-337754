<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Login</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Wachtwoord</label>
            <input type="password" name="wachtwoord" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>

    <div class="mt-4 p-3 border rounded bg-white text-center">
        <strong>Gebruikersnaam:</strong> admin@example.com<br>
        <strong>Wachtwoord:</strong> admin123
    </div>
</div>

</body>
</html>
