<?php

namespace App\Http\Controllers;


use App\Catalog;

use App\Repositories\SiteRepository;

class CoreController extends Controller {

    public function __construct()
    {
        $this->seo();
    }


    public function seo()
    {
        $this->_seo = (new SiteRepository)->findByCache();
    }

    public function parsePageSeo(Catalog $category)
    {
        return [
            'title' => $category->title,
            'keyword' => $category->keyword,
            'description' => $category->description
        ];
    }
}