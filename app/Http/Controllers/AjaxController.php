<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class AjaxController extends Controller
{
    //
    /**
     * ajaxリクエストを受け取り、市区町村を返す
     */
    public function city(Request $request) {
        $pref_val = $request->pref_val;
        $cities = City::where('prefecture_id', $pref_val)->get();
        return $cities;
    }
}
