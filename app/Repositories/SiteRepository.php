<?php

namespace App\Repositories;

use Addons\Core\ApiTrait;
use DB, Cache;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Addons\Core\Contracts\Repository;


use App\Models\Site;

class SiteRepository extends Repository {

    use ApiTrait;

    public function prePage()
	{
		return config('size.models.'.(new Site)->getTable(), config('size.common'));
	}

	public function find($id, array $columns = ['*'])
	{
		return Site::with([])->find($id, $columns);
	}

	public function findOrFail($id, array $columns = ['*'])
	{
		return Site::with([])->findOrFail($id, $columns);
	}

	public function store(array $data)
	{
		return DB::transaction(function() use ($data) {
			$model = Site::create($data);
			return $model;
		});
	}

	public function update(Model $model, array $data)
	{
		return DB::transaction(function() use ($model, $data){
			$model->update($data);
			return $model;
		});
	}

	public function destroy(array $ids)
	{
		DB::transaction(function() use ($ids) {
			Site::destroy($ids);
		});
	}

	public function data(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new Site;
		$builder = $model->newQuery()->with([]);
		$total = $this->_getCount($request, $builder, false);
		$data = $this->_getData($request, $builder, $callback, $columns);
		$data['recordsTotal'] = $total; //不带 f q 条件的总数
		$data['recordsFiltered'] = $data['total']; //带 f q 条件的总数

		return $data;
	}

	public function export(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new Site;
		$builder = $model->newQuery()->with([]);
		$size = $request->input('size') ?: config('size.export', 1000);

		$data = $this->_getExport($request, $builder, $callback, $columns);

		return $data;
	}


    /**
     * 网站配置
     * @param int $site_id
     */
	public function findByCache($site_id = 1)
    {
        return Cache::remember(Site::WEB_SETTING . $site_id, config('cache.ttl'), function () use($site_id){
            return Site::find($site_id);
        });
    }
}
