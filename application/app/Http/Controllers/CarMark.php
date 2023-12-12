<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarMark extends Controller
{
    public function get(Request $request)
    {
        $filter = $request->get('filter');
        $query = \App\Models\CarMark::query();
        if (!empty($filter)) {
            foreach ($filter as $key => $value) {
                $query->where($key, '=', $value);
            }
        }
        return response()->json($query->get()->toArray());
    }
}
