<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Addons\Core\ApiTrait;
use App\Models\Site;
use DB;

class SiteController extends Controller
{
    use ApiTrait;

    protected $keys = ['title', 'keywords', 'description', 'logo', 'tel', 'qq', 'wechat', 'number', 'address'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
    }

    public function data(Request $request)
    {
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('admin.site.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $site = Site::find($id);

        if (empty($site))
            return $this->failure_notexists();

        $this->_validates = $this->censorScripts('site.store', $this->keys);

        $this->_data = $site;
        return $this->view('admin.site.edit');
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
        $site = Site::find($id);
        if (empty($site))
            return $this->failure_notexists();

        $data = $this->censor($request, 'site.store', $this->keys, $site);

        DB::transaction(function() use ($data, $site) {
            $site->update($data);
            return $site;
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

    }
}
