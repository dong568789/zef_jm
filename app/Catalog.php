<?php
namespace App;

use Cache;
use App\Models\Logable;
use Addons\Elasticsearch\Scout\Searchable;
use Plugins\Catalog\App\Catalog as BaseCatalog;
class Catalog extends BaseCatalog {
	use Logable, Searchable;
}
Catalog::created(function($model) {
	Cache::forget($model->getTable().'-all-tree-data');
});
Catalog::updated(function($model) {
	Cache::forget($model->getTable().'-all-tree-data');
});

Catalog::deleted(function($model) {
	Cache::forget($model->getTable().'-all-tree-data');
});

