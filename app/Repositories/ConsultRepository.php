<?php

namespace App\Repositories;

use DB;
use Illuminate\Http\Request;
use Addons\Core\Contracts\Repository;
use Illuminate\Database\Eloquent\Model;

use App\Models\Consult;

class ConsultRepository extends Repository {

    public function prePage()
    {
        return config('size.models.'.(new Consult)->getTable(), config('size.common'));
    }

    public function find($id)
    {
        return Consult::with([])->find($id);
    }

    public function findOrFail($id)
    {
        return Consult::with([])->findOrFail($id);
    }

    public function store(array $data)
    {
        return DB::transaction(function() use ($data) {
            $model = Consult::create($data);
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
            Consult::destroy($ids);
        });
    }

    public function data(Request $request)
    {
        $consult = new Consult();
        $builder = $consult->newQuery()->with([]);

        $total = $this->_getCount($request, $builder, FALSE);
        $data = $this->_getData($request, $builder);
        $data['recordsTotal'] = $total; //不带 f q 条件的总数
        $data['recordsFiltered'] = $data['total']; //带 f q 条件的总数

        return $data;
    }

    public function export(Request $request)
    {
        $model = new Consult;
        $builder = $model->newQuery()->with([]);
        $size = $request->input('size') ?: config('size.export', 1000);

        $data = $this->_getExport($request, $builder);

        return $data;
    }
}
