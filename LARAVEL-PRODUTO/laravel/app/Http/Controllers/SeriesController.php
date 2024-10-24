<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        return $request->get('id');

        $series = [
            'Serie 1',
            'Serie 2',
            'Serie 3'
        ];

        return $id;
    }
}
