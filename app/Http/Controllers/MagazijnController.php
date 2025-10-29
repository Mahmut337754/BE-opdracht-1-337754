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
            ->select('magazijn.*', 'product.naam', 'product.barcode')
            ->orderBy('product.barcode')
            ->get();

        return view('magazijn.overzicht', compact('producten'));
    }

    public function leveringInfo($id)
    {
        $leveringen = DB::table('product_per_leverancier')
            ->join('leverancier', 'product_per_leverancier.leverancier_id', '=', 'leverancier.id')
            ->where('product_id', $id)
            ->orderBy('datum_levering')
            ->get();

        $magazijn = DB::table('magazijn')->where('product_id', $id)->first();

        $message = null;

        if (!$magazijn || $magazijn->aantal_aanwezig == null || $magazijn->aantal_aanwezig <= 0) {
            $leveringen = collect(); // lege collectie zodat de view geen error geeft
            $message = 'Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: 30-04-2023';
        }

        return view('magazijn.levering-info', compact('leveringen', 'message'));
    }

    public function allergenenInfo($id)
    {
        $allergenen = DB::table('product_per_allergeen')
            ->join('allergeen', 'product_per_allergeen.allergeen_id', '=', 'allergeen.id')
            ->join('product', 'product_per_allergeen.product_id', '=', 'product.id')
            ->where('product_per_allergeen.product_id', $id)
            ->select('product.naam as naam_product', 'product.barcode', 'allergeen.naam', 'allergeen.omschrijving')
            ->orderBy('allergeen.naam')
            ->get();

        $message = null;
        if ($allergenen->isEmpty()) {
            $message = 'In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken';
        }

        return view('magazijn.overzicht-allergenen', compact('allergenen', 'message'));
    }
}
