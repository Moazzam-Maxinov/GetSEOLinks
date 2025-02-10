<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function privacyPolicy()
    {
        // dd('abcd');
        return view('common.privacy-policy'); // This will render the 'home' view
    }

    public function termsAndCondition()
    {
        return view('common.terms-conditions'); // This will render the 'home' view
    }
}
