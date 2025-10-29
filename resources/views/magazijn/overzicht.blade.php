<!DOCTYPE html>
<html>
<head>
    <title>Overzicht Magazijn Jamin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h1>Overzicht Magazijn Jamin</h1>

    <table class="table table-bordered">
        <thead>
            <tr class="table-dark">
                <th>Naam Product</th>
                <th>Barcode</th>
                <th>Aantal aanwezig</th>
                <th>Allergenen Info</th>
                <th>Leverantie Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producten as $product)
            <tr>
                <td>{{ $product->naam }}</td>
                <td>{{ $product->barcode }}</td>
                <td>{{ $product->aantal_aanwezig ?? 'Geen voorraad' }}</td>
                <td>
                    <a href="{{ route('magazijn.allergenen', $product->id) }}" class="btn btn-dark btn-sm">Allergenen</a>
                </td>
                <td>
                    <a href="{{ route('magazijn.levering', $product->id) }}" class="btn btn-dark btn-sm">Levering</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
