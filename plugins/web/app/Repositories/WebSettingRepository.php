<?php

namespace Plugins\Web\App\Repositories;

use Addons\Core\ApiTrait;
use DB, Cache;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Addons\Core\Contracts\Repository;


use Plugins\Web\App\WebSetting;

class WebSettingRepository extends Repository {

    use ApiTrait;

    public function prePage()
	{
		return config('size.models.'.(new WebSetting)->getTable(), config('size.common'));
	}

	public function find($id, array $columns = ['*'])
	{
		return WebSetting::with([])->find($id, $columns);
	}

	public function findOrFail($id, array $columns = ['*'])
	{
		return WebSetting::with([])->findOrFail($id, $columns);
	}

	public function store(array $data)
	{
		return DB::transaction(function() use ($data) {
			$model = WebSetting::create($data);
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
			WebSetting::destroy($ids);
		});
	}

	public function data(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new WebSetting;
		$builder = $model->newQuery()->with([]);
		$total = $this->_getCount($request, $builder, false);
		$data = $this->_getData($request, $builder, $callback, $columns);
		$data['recordsTotal'] = $total; //不带 f q 条件的总数
		$data['recordsFiltered'] = $data['total']; //带 f q 条件的总数

		return $data;
	}

	public function export(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new WebSetting;
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
        return Cache::remember(WebSetting::WEB_SETTING . $site_id, config('cache.ttl'), function () use($site_id){
            return WebSetting::find($site_id);
        });
    }
}
