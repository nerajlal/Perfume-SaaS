<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function collection(Request $request)
    {
        $title = 'Fresh Perfumes';

        if ($request->has('category')) {
            $category = $request->query('category');
            if ($category == 'fresh') $title = 'Fresh Collection';
            elseif ($category == 'oriental-woody') $title = 'Oriental & Woody Collection';
            elseif ($category == 'floral') $title = 'Floral Collection';
        } elseif ($request->has('gender')) {
            $gender = $request->query('gender');
            if ($gender == 'for-him') $title = 'Perfumes For Him';
            elseif ($gender == 'for-her') $title = 'Perfumes For Her';
            elseif ($gender == 'unisex') $title = 'Unisex Collection';
        }

        return view('collection', ['title' => $title]);
    }

    public function allProducts()
    {
        return view('all-products', ['title' => 'All Products']);
    }

    public function cosmopolitan()
    {
        return view('collection', ['title' => 'Cosmopolitan Collection']);
    }

    public function product()
    {
        return view('product-main');
    }
}
