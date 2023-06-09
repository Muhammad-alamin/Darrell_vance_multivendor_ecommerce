<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function cacheclear(Request $request){
        // start the backup process
        Artisan::call('php artisan cache:clear');

        session()->flash('success', 'Cache Clear Successfully');
        return back();
    }
}
