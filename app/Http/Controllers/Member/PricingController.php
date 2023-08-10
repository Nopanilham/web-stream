<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PricingController extends Controller
{
    public function index()
    {
        $basicPackage = Package::where('name', 'basic')->first();
        $standardPackage = Package::where('name', 'standard')->first(); 
        $silverPackage = Package::where('name', 'silver')->first();
        $goldPackage = Package::where('name', 'gold')->first(); 

        return view('member.pricing', [
            'basic' => $basicPackage,
            'standard' => $standardPackage,
            'silver' => $silverPackage,
            'gold' => $goldPackage
        ]);

    }
    
}
