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

    public function guestPosts()
    {
        return view('common.guest-posts'); // This will render the 'home' view
    }

    public function linkInsertions()
    {
        return view('common.link-insertions'); // This will render the 'home' view
    }

    public function aboutUs()
    {
        return view('common.about-us'); // This will render the 'home' view
    }
}
