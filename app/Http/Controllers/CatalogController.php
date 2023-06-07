<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $r)
    {
        $sortBy = $r->input('sort');

        if ($sortBy !== 'asc' && $sortBy !== 'desc') {
            $sortBy = 'asc';
        }

        $products = Product::where('count', '>', 0)
            ->orderBy('price', $sortBy)
            ->get();

        return view('catalog', compact('products'));
    }
}
