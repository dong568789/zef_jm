<?php

namespace Plugins\Web\App;

use Addons\Core\Models\Tree;
use App\Models\AttachmentCastTrait;
use Addons\Core\Models\TreeCacheTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Tree
{
    use TreeCacheTrait, SoftDeletes, AttachmentCastTrait;

    //不能批量赋值
    public $orderKey = 'order_index';
    public $pathKey = 'path';
    public $levelKey = 'level';
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'path'/*, 'level'*/];
    protected $casts = [
        'extra' => 'array',
        'cover_id' => 'attachment'
    ];

    protected $appends = [
        'cover_id_item'
    ];

    protected $guarded = ['id'];

    public static function searchCatalog($name = null, $subKeys = null)
    {
        $node = static::getTreeCache()->search($name, null, 'name');
        return empty($node) ? null :
            (is_null($subKeys) ? $node : $node[$subKeys]);
    }

    public function getCoverIdItemAttribute()
    {
        return $this->getOriginal('cover_id');
    }

    public static function import(&$data, $parentNode)
    {
        foreach($data as $k => $v)
        {
            @list($name, $title, $extra) = explode('|', $k);
            !empty($extra) && $extra = json_decode($extra, true);
            $node = $parentNode->children()->create(compact('name', 'title', 'extra'));
            !empty($v) && static::import($v, $node);
        }
    }

}
