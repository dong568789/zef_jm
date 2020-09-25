<?php

namespace Plugins\Web\App\Http\Controllers\Admin;

use Addons\Core\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Plugins\Web\App\Repositories\WebSettingRepository;

class SettingController extends Controller {

    use ApiTrait;

    //public $permissions = ['store,update,destroy' => 'web-manager'];

    protected $keys = ['name', 'title', 'keyword', 'description', 'icp', 'qq', 'wechat', 'wechat_qr', 'phone', 'tel', 'address', 'logo'];

    protected $repo;

    public function __construct(WebSettingRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $size = $request->input('size') ?: $this->repo->prePage();
        //view's variant
        $this->_size = $size;
        $this->_filters = $this->repo->_getFilters($request);
        $this->_queries = $this->repo->_getQueries($request);
        return $this->view('web::admin.setting.list');
    }

    public function data(Request $request)
    {
        $data = $this->repo->data($request);

        return $this->api($data);
    }

    public function export(Request $request)
    {
        $data = $this->repo->export($request);

        return $this->office($data);
    }

    public function show(Request $request, $id)
    {
        $setting = $this->repo->find($id);
        if (empty($setting))
            return $this->failure_notexists();

        $this->_data = $setting;
        return !$request->offsetExists('of') ? $this->view('web::admin.setting.show') : $this->api($setting->toArray());
    }

    public function create()
    {
        $this->_data = [];
        $this->_validates = $this->censorScripts('web::setting.store', $this->keys);
        return $this->view('web::admin.setting.create');
    }

    public function store(Request $request)
    {
        $data = $this->censor($request, 'web::setting.store', $this->keys);

        $setting = $this->repo->store($data);

        return $this->success('', url('admin/web/setting'));
    }

    public function edit($id)
    {
        $setting = $this->repo->find($id);
        if (empty($setting))
            return $this->failure_notexists();

        $this->_validates = $this->censorScripts('web::setting.store', $this->keys);
        $this->_data = $setting;
        return $this->view('web::admin.setting.edit');
    }

    public function update(Request $request, $id)
    {
        $setting = $this->repo->find($id);
        if (empty($setting))
            return $this->failure_notexists();

        $data = $this->censor($request, 'web::setting.store', $this->keys, $setting);
        $setting = $this->repo->update($setting, $data);
        return $this->success();
    }

    public function destroy(Request $request, $id)
    {
        empty($id) && !empty($request->input('id')) && $id = $request->input('id');
        $ids = array_wrap($id);

        $this->repo->destroy($ids);
        return $this->success(null, true, ['id' => $ids]);
    }
}
