<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/2/9
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function __construct()
    {
        $this->_seo = $this->seo();
    }

    public function seo()
    {
        return Site::getSite();
    }

}