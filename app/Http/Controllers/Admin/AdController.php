<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Addons\Core\ApiTrait;

use App\Models\Ad;

class AdController extends Controller
{
    use ApiTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ad.list');
    }

    public function data(Request $request)
    {
        $ad = new Ad;
        $builder = $ad->newQuery()->with('parents');

        $total = $this->_getCount($request, $builder, FALSE);
        $data = $this->_getData($request, $builder, null, ['ads.*']);
        $data['recordsTotal'] = $total; //不带 f q 条件的总数
        $data['recordsFiltered'] = $data['total']; //带 f q 条件的总数
        return $this->api($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keys = ['title', 'pid', 'avatar_aid', 'url', 'sort', 'status', 'value'];
        $this->_data = [];
        $this->_validates = $this->censorScripts('ad.store', $keys);
        $this->_adList = Ad::getAdList()->get();

        return $this->view('admin.ad.create');
    }

    public function export(Request $request)
    {
        $ad = new Ad;
        $builder = $ad->newQuery();
        $size = $request->input('size') ?: config('size.export', 1000);

        $data = $this->_getExport($request, $builder, function (&$v) {
            $v['gender'] = !empty($v['gender']) ? $v['gender']['title'] : NULL;
        });
        return $this->office($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys = ['title', 'pid', 'avatar_aid', 'url', 'sort', 'status', 'value'];
        $data = $this->censor($request, 'ad.store', $keys);

        $ad = (new Ad)->create($data);
        return $this->success('', url('admin/ad'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::find($id);

        //dd($ad);
        if (empty($ad))
            return $this->failure_notexists();

        $keys = ['title', 'pid', 'avatar_aid', 'url', 'sort', 'status', 'value'];
        $this->_validates = $this->censorScripts('ad.store', $keys);
        $this->_data = $ad;
        $this->_adList = Ad::getAdList()->get();

        return $this->view('admin.ad.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = Ad::find($id);
        if (empty($ad))
            return $this->failure_notexists();


        $keys = ['title', 'pid', 'avatar_aid', 'url', 'sort', 'status', 'value'];
        $data = $this->censor($request, 'ad.store', $keys, $ad);

        $ad->update($data);

        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        empty($id) && !empty($request->input('id')) && $id = $request->input('id');
        $ids = array_wrap($id);

        DB::transaction(function () use ($ids) {
            ad::destroy($ids);
        });
        return $this->success(null, true, ['id' => $ids]);
    }
}
