<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Perform the search logic here...
        // For example, you can search in your database using Eloquent or any other method

        // For demonstration purposes, let's just return the search query
        return view('layouts.header', ['query' => $query]);
    }
}
