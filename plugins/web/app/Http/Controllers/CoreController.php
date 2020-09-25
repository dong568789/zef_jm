<?php

namespace Plugins\Web\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Plugins\Web\App\Category;

use Plugins\Web\App\Repositories\WebSettingRepository;

class CoreController extends Controller {

	public function __construct()
    {
        $this->seo();
    }


    public function seo()
    {
        $this->_seo = (new WebSettingRepository)->findByCache();
    }

    public function parsePageSeo(Category $category)
    {
        return [
            'title' => $category->seo_title,
            'keyword' => $category->seo_keyword,
            'description' => $category->seo_description
        ];
    }
}
