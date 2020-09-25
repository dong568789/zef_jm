<?php

namespace Plugins\Web\App\Http\Controllers;

use Illuminate\Http\Request;

use Plugins\Web\App\Repositories\ArticleRepository;
use Plugins\Web\App\Repositories\CategoryRepository;

class HomeController extends CoreController {

	public function index(Request $request)
	{
		return $this->view('web::index');
	}

	public function about(Request $request)
    {
        $name = 'about';

        $aRepo = new ArticleRepository();
        $cRepo = new CategoryRepository();

        $category = $cRepo->findByName($name);
        if(empty($category))
            return $this->error("分类不存在!");

        $this->_article = $aRepo->findByCid($category->id);
        $this->_nav = "about";
        $this->_category = $category;
        $this->_SEO = $this->parsePageSeo($category);
        return $this->view('web::about');
    }

    public function job(Request $request)
    {
        $name = 'job';

        $aRepo = new ArticleRepository();
        $cRepo = new CategoryRepository();

        $category = $cRepo->findByName($name);
        if(empty($category))
            return $this->error("分类不存在!");

        $this->_article = $aRepo->findByCid($category->id);
        $this->_nav = "job";
        $this->_category = $category;

        $this->_SEO = $this->parsePageSeo($category);
        return $this->view('web::job');
    }

    public function demo(Request $request)
    {
        $name = 'demo';
        $cRepo = new CategoryRepository();

        $category = $cRepo->findByName($name);
        if(empty($category))
            return $this->error("分类不存在!");

        $this->_SEO = $this->parsePageSeo($category);
        return $this->view('web::demo');
    }

    public function doc(Request $request)
    {
        $name = 'document';
        $aRepo = new ArticleRepository();
        $cRepo = new CategoryRepository();

        $category = $cRepo->findByName($name);
        if(empty($category))
            return $this->error("分类不存在!");

        $this->_article = $aRepo->findByCid($category->id);
        $this->_nav = "document";
        $this->_category = $category;
        $this->_SEO = $this->parsePageSeo($category);
        return $this->view('web::doc');
    }

    public function speclal()
    {
        $name = 'speclal';
        $aRepo = new ArticleRepository();
        $cRepo = new CategoryRepository();

        $category = $cRepo->findByName($name);
        if(empty($category))
            return $this->error("分类不存在!");

        $this->_article = $aRepo->findByCid($category->id);
        $this->_nav = "speclal";
        $this->_category = $category;
        $this->_SEO = $this->parsePageSeo($category);
        return $this->view('web::speclal');
    }

}
