<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticleItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Addons\Core\ApiTrait;
use App\Models\Article;
use DB;

class ArticleController extends Controller
{
    use ApiTrait;

    protected $keys = ['title', 'site', 'description', 'sort', 'recommend', 'avatar_aid', 'source', 'click', 'content', 'article_status'];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->_filters = $this->_getFilters($request);
        return $this->view('admin.article.list');
    }

    public function data(Request $request)
    {
        $article = new Article;
        $builder = $article->newQuery();


        $total = $this->_getCount($request, $builder, FALSE);
        $data = $this->_getData($request, $builder, function($items){
            foreach($items as $item){
                $item['str_recommend'] = $item['recommend'] == 1 ? '推荐' : '否';
            }
        }, ['articles.*']);

        $data['recordsTotal'] = $total; //不带 f q 条件的总数
        $data['recordsFiltered'] = $data['total']; //带 f q 条件的总数
        return $this->api($data);
    }

    public function export(Request $request)
    {
        $article = new Article;
        $builder = $article->newQuery();
        $size = $request->input('size') ?: config('size.export', 1000);

        $data = $this->_getExport($request, $builder, null, ['articles.*']);
        unset($data[0], $data[1]);
        $items = [];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->censor($request, 'article.store', $this->keys);

        $extraKey = ['content'];
        $extra = array_only($data, $extraKey);
        $data = array_except($data, $extraKey);
        DB::transaction(function() use ($data, $extra) {
            $article = Article::create($data);
            $article->extra()->create($extra);
            return $article;
        });

        return $this->success('', url('admin/article'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::with(['extra'])->find($id);

        if (empty($article))
            return $this->failure_notexists();

        $this->_validates = $this->censorScripts('article.store', $this->keys);

        $this->_data = $article;
        return $this->view('admin.article.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (empty($article))
            return $this->failure_notexists();

        $data = $this->censor($request, 'article.store', $this->keys, $article);

        $extraKey = ['content'];
        $extra = array_only($data, $extraKey);
        $data = array_except($data, $extraKey);
        DB::transaction(function() use ($data, $extra, $article) {
            $article->update($data);
            $article->extra()->update($extra);
            return $article;
        });
        return $this->success();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        empty($id) && !empty($request->input('id')) && $id = $request->input('id');
        $ids = array_wrap($id);

        DB::transaction(function() use ($ids) {
            Article::destroy($ids);
        });
        return $this->success(null, true, ['id' => $ids]);
    }
}
