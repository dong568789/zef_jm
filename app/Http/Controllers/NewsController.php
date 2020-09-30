<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ArticleRepository;
use App\Repositories\CatalogRepository;

class NewsController extends CoreController {

	public function index(Request $request, $name)
	{
        $aRepo = new ArticleRepository();
        $cRepo = new CatalogRepository();

        $category = $cRepo->findByName($name);

        if(empty($category))
            return $this->error("分类不存在!");

        $pageSize = 5;

        $list = $aRepo->getArticle($category->id, $pageSize);
        $this->_list = $list;
        $this->_category = $category;

        $this->_SEO = $this->parsePageSeo($category);
        $this->_nav = "news";
		return $this->view('list');
	}


	public function show(Request $request, $id)
    {
        $aRepo = new ArticleRepository();
        $cRepo = new CatalogRepository();

        $article = $aRepo->findOrFail($id);

        $article->increment('click');
        $category = $cRepo->find($article->site->id);

        $this->_article = $article;
        $this->_category = $category;
        $this->_nav = "news";
        $this->_SEO = [
            'title' => $article->title,
            'keyword' => $article->title,
            'description' => $article->seo_description
        ];
        return $this->view('show');
    }
}
