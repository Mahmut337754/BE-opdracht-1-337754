<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MagazijnController extends Controller
{
    public function overzicht()
    {
        $producten = DB::table('magazijn')
            ->join('product', 'magazijn.product_id', '=', 'product.id')
            ->select(
                'magazijn.id',
                'product.naam',
                'product.barcode',
                'magazijn.verpakkings_eenheid',
                'magazijn.aantal_aanwezig'
            )
            ->orderBy('product.barcode', 'asc')
            ->get();

        return view('magazijn.overzicht', ['producten' => $producten]);
    }

    public function leveringInfo($id)
    {
        $magazijn = DB::table('magazijn')
            ->where('product_id', $id)
            ->first();

        $leveringen = DB::table('product_per_leverancier')
            ->join('leverancier', 'product_per_leverancier.leverancier_id', '=', 'leverancier.id')
            ->where('product_per_leverancier.product_id', $id)
            ->select(
                'leverancier.naam',
                'leverancier.contactpersoon',
                'leverancier.leveranciernummer',
                'leverancier.mobiel',
                'product_per_leverancier.datum_levering',
                'product_per_leverancier.aantal',
                'product_per_leverancier.datum_eerstvolgende_levering'
            )
            ->orderBy('product_per_leverancier.datum_levering', 'asc')
            ->get();

        if (!$magazijn || $magazijn->aantal_aanwezig === null || $magazijn->aantal_aanwezig == 0) {
            return view('magazijn.levering-info', [
                'leveringen' => collect(),
                'volgendeLevering' => $leveringen->min('datum_eerstvolgende_levering') ?? '30-04-2023'
            ]);
        }

        return view('magazijn.levering-info', ['leveringen' => $leveringen]);
    }

    public function allergenenInfo($id)
    {
        $allergenen = DB::table('product_per_allergeen')
            ->join('allergeen', 'product_per_allergeen.allergeen_id', '=', 'allergeen.id')
            ->where('product_per_allergeen.product_id', $id)
            ->select('allergeen.naam', 'allergeen.omschrijving')
            ->orderBy('allergeen.naam', 'asc')
            ->get();

        if ($allergenen->isEmpty()) {
            return view('magazijn.allergenen-info', [
                'allergenen' => collect()
            ]);
        }

        return view('magazijn.allergenen-info', ['allergenen' => $allergenen]);
    }
}
