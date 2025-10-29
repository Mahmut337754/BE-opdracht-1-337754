<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Allergenen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @if(isset($message))
        <meta http-equiv="refresh" content="4;url={{ route('magazijn.overzicht') }}">
    @endif
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Allergeneninformatie Product</h1>

        @if(isset($message))
            <div class="alert alert-warning">{{ $message }}</div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Naam allergeen</th>
                        <th>Omschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allergenen as $allergeen)
                    <tr>
                        <td>{{ $allergeen->naam }}</td>
                        <td>{{ $allergeen->omschrijving }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('magazijn.overzicht') }}" class="btn btn-primary mt-3">Terug naar overzicht</a>
    </div>
</body>
</html>
