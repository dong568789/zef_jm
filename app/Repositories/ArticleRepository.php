<?php

namespace App\Repositories;

use Addons\Core\ApiTrait;
use DB, Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Addons\Core\Contracts\Repository;


use App\Models\Article;

class ArticleRepository extends Repository {

    use ApiTrait;

    protected function parseData(array $data)
    {
        $extraKey = ['content'];
        $dataExtra = array_only($data, $extraKey);
        $data = array_except($data, $extraKey);

        return compact('dataExtra', 'data');
    }

    public function prePage()
	{
		return config('size.models.'.(new Article)->getTable(), config('size.common'));
	}

	public function find($id, array $columns = ['*'])
	{
		return Article::with(['extra'])->find($id, $columns);
	}

	public function findOrFail($id, array $columns = ['*'])
	{
		return Article::with([])->findOrFail($id, $columns);
	}

	public function store(array $data)
	{
	    $data = $this->parseData($data);
	    extract($data);
		return DB::transaction(function() use ($data, $dataExtra) {
			$model = Article::create($data);
			$model->extra()->create($dataExtra);
			return $model;
		});
	}

	public function update(Model $model, array $data)
	{
        $params = $this->parseData($data);
        extract($params);
		return DB::transaction(function() use ($model, $data, $dataExtra){
			$model->update($data);
            $model->extra()->update($dataExtra);
			return $model;
		});
	}

	public function destroy(array $ids)
	{
		DB::transaction(function() use ($ids) {
			Article::destroy($ids);
		});
	}

	public function data(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new Article;
		$builder = $model->newQuery()->with([]);
		$total = $this->_getCount($request, $builder, false);
		$data = $this->_getData($request, $builder, $callback, $columns);
		$data['recordsTotal'] = $total; //不带 f q 条件的总数
		$data['recordsFiltered'] = $data['total']; //带 f q 条件的总数

		return $data;
	}

	public function export(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new Article;
		$builder = $model->newQuery()->with([]);
		$size = $request->input('size') ?: config('size.export', 1000);

		$data = $this->_getExport($request, $builder, $callback, $columns);

		return $data;
	}

	public function getArticle($cid, $size )
    {
        $enabled = catalog_search('status.article_status.enabled', 'id');
        return Article::where('site', $cid)
            ->orderBy('sort', 'desc')
            ->orderBy('created_at', 'desc')
            ->where('article_status', $enabled)
            ->paginate($size);

    }

    public function findByCid($cid)
    {
        $enabled = catalog_search('status.article_status.enabled', 'id');
        return Article::where('site', $cid)
            ->where('article_status', $enabled)
            ->first();

    }
}
