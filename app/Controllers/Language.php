<?php

namespace App\Controllers;

class Language extends BaseController
{

    public function index($locale)
    {
        $session = session();
        $session->remove('lang');
        $session->set('lang', $locale);
        $url = base_url();
        return redirect()->to($url);
    }
}
