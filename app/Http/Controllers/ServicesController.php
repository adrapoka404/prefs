<?php

namespace App\Http\Controllers;

use App\Models\Zipcode;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function zipcode($zip){
        if (strlen($zip) > 4 && strlen($zip) < 6 &&  is_numeric($zip)) {
            $zipcodes = Zipcode::where('cp', $zip)->orderBy('asentamiento', 'asc')->get();
            return $zipcodes;
        }
    }
}
