<?php

namespace App\Repositories;

use Plugins\Catalog\App\Repositories\CatalogRepository as BaseCatalogRepository;

use App\Catalog;

class CatalogRepository extends BaseCatalogRepository {


    public function explodeProduct($str_product)
    {
        $arr = explode('|', $str_product);

        $products = [];
        foreach($arr as $item){
            if($product = $this->findByTitle($item)){
                $products[] = $product->id;
            }
        }

        return $products;
    }

    public function findByTitle($title, $force = false)
    {
        static $data;

        if($force || empty($data['all']) || time() - $data['time'] > 20){
            $all = $this->all();

            $data = [
                'all' => $all,
                'time' => time()
            ];
        }

        return $data['all']->where('title', '=', $title)->first();
    }

    public function all()
    {
        return Catalog::get();
    }

    public function findByName($name, $force = false)
    {
        return $this->all()->where('name', '=', $name)->first();
    }
}
