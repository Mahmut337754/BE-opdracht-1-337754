<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Magazijn Jamin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">

    <div class="container">
        <h1 class="text-center mb-4">Overzicht Magazijn Jamin</h1>

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Naam Product</th>
                    <th>Barcode</th>
                    <th>Aantal aanwezig</th>
                    <th>Allergenen Info</th>
                    <th>Leverantie Info</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Illuminate\Support\Facades\DB;

                    // Haal producten + magazijn info op, numeriek gesorteerd op barcode
                    $producten = DB::table('product')
                        ->join('magazijn', 'product.id', '=', 'magazijn.product_id')
                        ->select('product.*', 'magazijn.aantal_aanwezig')
                        ->orderByRaw('CAST(product.barcode AS UNSIGNED) ASC')
                        ->get();
                @endphp

                @foreach($producten as $product)
                <tr>
                    <td>{{ $product->naam }}</td>
                    <td>{{ $product->barcode }}</td>
                    <td>
                        @if($product->aantal_aanwezig !== null && $product->aantal_aanwezig > 0)
                            {{ $product->aantal_aanwezig }}
                        @else
                            <span class="text-danger fw-bold">Geen voorraad</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('magazijn.allergenen', $product->id) }}" class="btn btn-sm btn-danger" title="Allergenen Info">❌</a>
                    </td>
                    <td>
                        <a href="{{ route('magazijn.levering', $product->id) }}" class="btn btn-sm btn-success" title="Leverantie Info">❓</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
