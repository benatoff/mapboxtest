<?php

namespace App\Http\Controllers;

use App\Models\House;
use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function __invoke(int $id)
    {
        $houses = House::getRows();
        $house = array_filter($houses, function ($h) use ($id) {
            return $h['house_id'] == $id;
        });
        if (!sizeof($house) == 1) {
            return abort(403);
        }

        return view('house', ['house' => array_values($house)[0]]);
    }
}
