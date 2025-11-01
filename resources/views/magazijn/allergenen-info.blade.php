<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergeneninformatie Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        // Functie om na 4 seconden terug te gaan
        function redirectToOverview() {
            setTimeout(() => {
                window.location.href = "{{ route('magazijn.overzicht') }}";
            }, 4000);
        }
    </script>
</head>
<body class="p-4 bg-light">
    <div class="container">
        <h1 class="mb-4 text-center">Allergeneninformatie Product</h1>

        @if($allergenen->isEmpty())
            <div class="alert alert-warning text-center fs-5">
                In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken.
            </div>

            <script>
                window.onload = redirectToOverview;
            </script>
        @else
            <table class="table table-bordered table-striped text-center align-middle">
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

        <div class="text-center mt-3">
            <a href="{{ route('magazijn.overzicht') }}" class="btn btn-primary">Terug naar overzicht</a>
        </div>
    </div>
</body>
</html>
