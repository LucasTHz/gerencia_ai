<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function test() {
        $editais = Edital::all();

        return view('welcome', ['editais' => $editais]);
    }
}
