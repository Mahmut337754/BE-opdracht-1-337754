<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leveringsinformatie Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function redirectToOverview() {
            setTimeout(() => {
                window.location.href = "{{ route('magazijn.overzicht') }}";
            }, 4000);
        }
    </script>
</head>
<body class="p-4 bg-light">
    <div class="container">
        <h1 class="mb-4 text-center">Leveringsinformatie Product</h1>

        @if(!$leveringen || $leveringen->isEmpty())
            <div class="alert alert-warning text-center fs-5" id="noStockAlert">
                <strong>Er is van dit product op dit moment geen voorraad aanwezig,</strong><br>
                de verwachte eerstvolgende levering is: <strong>{{ $volgendeLevering ?? '30-04-2023' }}</strong>
            </div>
            <script>
                window.onload = redirectToOverview;
            </script>
        @else
            <table class="table table-bordered table-striped text-center align-middle">
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
                        <td>{{ $levering->datum_eerstvolgende_levering }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="text-center mt-3">
            <a href="{{ route('magazijn.overzicht') }}" class="btn btn-primary">Terug naar overzicht</a>
        </div>
    </div>
</body>
</html>
