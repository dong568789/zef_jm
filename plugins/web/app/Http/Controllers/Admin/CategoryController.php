<?php

namespace Plugins\Web\App\Http\Controllers\Admin;

use Addons\Core\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Collection;
use Plugins\Web\App\Category;
use Plugins\Web\App\Repositories\CategoryRepository;

class CategoryController extends Controller {

    use ApiTrait;

   // public $permissions = ['store,update,destroy' => 'web-manager'];

    protected $keys = ['title', 'pid', 'order_index', 'cover_id', 'seo_title', 'seo_description', 'seo_keyword', 'name'];

    protected $repo;

    public function __construct(CategoryRepository $repo)
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
        return $this->view('web::admin.category.list');
    }

    public function data(Request $request)
    {
        $category = new Category();
        $data = $this->repo->data($request, function($page) use($request, $category) {
            if ($request->input('tree') == 'true')
            {
                $items = $page->getCollection()->keyBy($category->getKeyName())->toArray();
                $page->setCollection(new Collection(Category::datasetToTree($items, false)));
            }
        });

        return $this->api($data);
    }

    public function tree(Request $request, $parentName)
    {
        $catalog = catalog_search($parentName);
        if (empty($catalog))
            return $this->failure_notexists();

        $data = $this->repo->tree($catalog['id']);
        return $this->api(['data' => $data]);
    }

    public function export(Request $request)
    {
        $data = $this->repo->export($request);

        return $this->office($data);
    }

    public function show(Request $request, $id)
    {
        $root = $this->repo->findWithParents($id);
        if (empty($root))
            return $this->failure_notexists();

        if ($request->offsetExists('of'))
            return $this->api($root);

        $this->_topNodes = $this->repo->findTops(0);
        $this->_root = $root;
        $this->_table_data = empty($id) ? null : $this->repo->findLeaves($root);
        return $this->view('web::admin.category.list');
    }

    public function create()
    {
        $this->_data = [];
        $this->_validates = $this->censorScripts('web::category.store', $this->keys);
        return $this->view('web::admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $this->censor($request, 'web::category.store', $this->keys);

        if (!empty($this->repo->findByNamePid($data['name'], $data['pid'])))
            return $this->failure('catalog::catalog.name_exists', false, $data);

        $data['cover_id'] = intval($data['cover_id']);
        $category = $this->repo->store($data);

        return $this->success('', url('admin/web/category'));
    }

    public function edit($id)
    {
        $category = $this->repo->find($id);
        if (empty($category))
            return $this->failure_notexists();

        $this->_validates = $this->censorScripts('web::category.store', $this->keys);
        $this->_data = $category;
        return $this->view('web::admin.category.edit');
    }

    public function update(Request $request, $id)
    {
        $category = $this->repo->find($id);
        if (empty($category))
            return $this->failure_notexists();

        $keys = array_filter($this->keys, function ($item){
            return $item != 'name';
        });

        $data = $this->censor($request, 'web::category.store', $keys, $category);
        $category = $this->repo->update($category, $data);
        return $this->success();
    }

    public function move(Request $request)
    {
        $keys = 'original_id,target_id,move_type';
        $data = $this->censor($request, 'web::category.move', $keys);

        if ($this->repo->move($data['target_id'], $data['original_id'], $data['move_type']) === false)
            return $this->failure_notexists();

        return $this->success('catalog::catalog.move_success', false, $data);
    }

    public function destroy(Request $request, $id)
    {
        empty($id) && !empty($request->input('id')) && $id = $request->input('id');
        $ids = array_wrap($id);

        $this->repo->destroy($ids);
        return $this->success(null, true, ['id' => $ids]);
    }
}
