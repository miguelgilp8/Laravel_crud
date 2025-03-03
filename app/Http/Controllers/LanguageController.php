<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function __invoke(Request $request, string $locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();

        //
    }

}
