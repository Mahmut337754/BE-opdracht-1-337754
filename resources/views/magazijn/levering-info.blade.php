<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leveringsinformatie Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Leveringsinformatie Product</h1>

        @if(isset($message))
            <div class="alert alert-warning">
                {{ $message }}
            </div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Naam leverancier</th>
                        <th>Contactpersoon leverancier</th>
                        <th>Leveranciernummer</th>
                        <th>Mobiel</th>
                        <th>Datum levering</th>
                        <th>Aantal</th>
                        <th>Verwachte eerstvolgende levering</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leveringen as $levering)
                    <tr>
                        <td>{{ $levering->naam }}</td>
                        <td>{{ $levering->contactpersoon }}</td>
                        <td>{{ $levering->leveranciernummer }}</td>
                        <td>{{ $levering->mobiel }}</td>
                        <td>{{ $levering->datum_levering }}</td>
                        <td>{{ $levering->aantal }}</td>
                        <td>{{ $levering->datum_eerstvolgende_levering ?? 'N.v.t.' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('magazijn.overzicht') }}" class="btn btn-primary mt-3">Terug naar overzicht</a>
    </div>
</body>
</html>
