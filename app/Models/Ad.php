<?php

namespace App\Models;

use App\Models\CatalogCastTrait;
use App\Models\AttachmentCastTrait;
use App\Model;

class Ad extends Model
{
    use CatalogCastTrait, AttachmentCastTrait;

    protected $table = 'ads';

    protected $fillable = ['title', 'pid', 'avatar_aid', 'url', 'sort', 'status', 'value'];

    protected $casts = [
        'avatar_aid' => 'attachment',
    ];

    public function children()
    {
        return $this->hasMany('App\Models\Ad', 'pid', 'id');
    }

    public function parents()
    {
        return $this->belongsTo('App\Models\\Ad', 'pid', 'id');

    }

    /**
     * 获取无限级分类
     * @param $site_id
     * @param $type
     * @return mixed
     */
    public static function getAdList($v='')
    {
        $queryBuilder = function ($query) use (&$queryBuilder) {
            $query->orderBy('sort', 'asc')->with(['children' => $queryBuilder]);
        };

        $buliderQuery = Ad::where(['pid' => 0]);
        !empty($v) && $buliderQuery->where('value', '=', $v);

        return $buliderQuery->orderBy('sort', 'asc')->with(['children' => $queryBuilder]);

    }

}
