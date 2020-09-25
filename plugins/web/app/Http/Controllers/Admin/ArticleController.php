<?php
namespace Plugins\Web\App\Http\Controllers\Admin;

use Addons\Core\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Collection;
use Plugins\Web\App\Repositories\ArticleRepository;

class ArticleController extends Controller {

    use ApiTrait;

    public $permissions = ['store,update,destroy' => 'web-manager.update'];

    protected $keys = ['title', 'cid', 'order', 'cover_id', 'seo_title', 'seo_description', 'jump', 'content', 'article_status'];

    protected $repo;

    public function __construct(ArticleRepository $repo)
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
        return $this->view('web::admin.article.list');
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
        $article = $this->repo->find($id);
        if (empty($article))
            return $this->failure_notexists();

        $this->_data = $article;
        return !$request->offsetExists('of') ? $this->view('web::admin.article.show') : $this->api($article->toArray());
    }

    public function create()
    {
        $this->_data = [];
        $this->_validates = $this->censorScripts('web::article.store', $this->keys);
        return $this->view('web::admin.article.create');
    }

    public function store(Request $request)
    {
        $data = $this->censor($request, 'web::article.store', $this->keys);

        $article = $this->repo->store($data);

        return $this->success('', url('admin/web/article'));
    }

    public function edit($id)
    {
        $article = $this->repo->find($id);
        if (empty($article))
            return $this->failure_notexists();

        $this->_validates = $this->censorScripts('web::article.store', $this->keys);
        $this->_data = $article;
        return $this->view('web::admin.article.edit');
    }

    public function update(Request $request, $id)
    {
        $article = $this->repo->find($id);
        if (empty($article))
            return $this->failure_notexists();

        $data = $this->censor($request, 'web::article.store', $this->keys, $article);
        $article = $this->repo->update($article, $data);
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
