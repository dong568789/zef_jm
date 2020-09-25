<?php

namespace Plugins\Web\App\Repositories;

use Addons\Core\ApiTrait;
use DB, Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Addons\Core\Contracts\Repository;


use Plugins\Web\App\Category;

class CategoryRepository extends Repository {

    use ApiTrait;

    public function prePage()
	{
		return config('size.models.'.(new Category)->getTable(), config('size.common'));
	}

	public function find($id, array $columns = ['*'])
	{
		return Category::with([])->find($id, $columns);
	}

	public function findByName($name)
    {
        return Category::with([])->where('name', '=', $name)->first();
    }

    public function findTops($id = 0)
    {
        return $this->findWithChildren($id)->children->where('name', '>', '')->where('title', '>', '');
    }

    public function findWithChildren($id)
    {
        $catalog = Category::with('children')->find($id);

        return $catalog;
    }

    public function findWithParents($id)
    {
        $catalog = Category::with('parent')->find($id);
        !empty($catalog) && $catalog->parents = $catalog->getParents();

        return $catalog;
    }

	public function get(Carbon $date, $gid, array $columns = ['*'])
	{
		return Category::findByDateGid($date, $gid, $columns);
	}

	public function findOrFail($id, array $columns = ['*'])
	{
		return Category::with([])->findOrFail($id, $columns);
	}

	public function store(array $data)
	{
		return DB::transaction(function() use ($data) {
			$model = Category::create($data);
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
			Category::destroy($ids);
		});
	}

	public function data(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new Category;
		$builder = $model->newQuery();
		$total = $this->_getCount($request, $builder, false);
		$data = $this->_getData($request, $builder, $callback, $columns);
		$data['recordsTotal'] = $total; //不带 f q 条件的总数
		$data['recordsFiltered'] = $data['total']; //带 f q 条件的总数

		return $data;
	}

    public function findByNamePid($name, $pid)
    {
        return Category::findByNamePid($name, $pid);
    }

    public function findLeaves($id)
    {
        $root = $id instanceof Category ? $id : Category::find($id);

        return !empty($root) ? $root->getLeaves()->prepend($root) : false;
    }

	public function export(Request $request, callable $callback = null, array $columns = ['*'])
	{
		$model = new Category;
		$builder = $model->newQuery()->with([]);
		$size = $request->input('size') ?: config('size.export', 1000);

		$data = $this->_getExport($request, $builder, $callback, $columns);

		return $data;
	}

    public function move($target_id, $original_id, $move_type)
    {
        $c0 = Category::find($target_id);
        if (empty($c0))
            return false;

        $c1 = Category::find($original_id);
        if (empty($c1))
            return false;

        DB::transaction(function() use ($c0, $c1, $move_type) {
            $c1->move($c0->getKey(), $move_type);
        });
    }

    public function tree($id)
    {
        $leaves = $this->findLeaves($id);
        if (empty($leaves))
            return false;
        return Category::datasetToTree($leaves->keyBy('id')->toArray(), false);
    }
}
