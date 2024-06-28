<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Sushi\Sushi;

class House extends Model
{
    use Sushi;

    /**
     * Model Rows
     *
     * @return array
     */
    public static function getRows()
    {
        //API
        $file = Storage::disk('local')->get("objekte_api_response.json");
        $Houses = json_decode($file)->response->results[0]->data->records;

        // filtering some attributes
        return Arr::map($Houses, function ($item) {
            $house = Arr::only(
                get_object_vars($item->elements),
                [
                    "Id",
                    "kaufpreis",
                    "lage",
                    "vermarktungsart",
                    "warmmiete",
                    "laengengrad",
                    "breitengrad",
                    "strasse",
                    "plz",
                    "ort",
                ]
            );
            $house['house_id'] = $house['Id'];
            unset($house['Id']);
            return $house;
        });
    }
}
