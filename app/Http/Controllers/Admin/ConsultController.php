<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\ConsultRepository;

class ConsultController extends Controller
{
	//public $permissions = ['consult'];

	protected $repo;

	public function __construct(ConsultRepository $repo)
	{
		$this->userRepo = $repo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$size = $request->input('size') ?: $this->userRepo->prePage();
		//view's variant
		$this->_size = $size;
		$this->_filters = $this->userRepo->_getFilters($request);
		$this->_queries = $this->userRepo->_getQueries($request);
		return $this->view('admin.consult.list');
	}

	public function data(Request $request)
	{
		$data = $this->userRepo->data($request);
		return $this->api($data);
	}

	public function export(Request $request)
	{
		$data = $this->userRepo->export($request);
		return $this->office($data);
	}

	public function destroy(Request $request, $id)
	{
		empty($id) && !empty($request->input('id')) && $id = $request->input('id');
		$ids = array_wrap($id);

		DB::transaction(function() use ($ids) {
			Consult::destroy($ids);
		});
		return $this->success(null, true, ['id' => $ids]);
	}
}
