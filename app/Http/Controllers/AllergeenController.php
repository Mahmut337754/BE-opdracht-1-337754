<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllergeenController extends Controller
{
    public function overzicht($id)
    {
        $allergenen = DB::table('product_per_allergeen')
            ->join('allergeen', 'product_per_allergeen.allergeen_id', '=', 'allergeen.id')
            ->where('product_per_allergeen.product_id', $id)
            ->orderBy('allergeen.naam')
            ->get();

        if ($allergenen->isEmpty()) {
            return view('magazijn.allergenen-overzicht')->with('message', 'In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken');
        }

        return view('magazijn.allergenen-overzicht', compact('allergenen'));
    }
}
