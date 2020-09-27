<?php

namespace App\Models;

use App\Model;
use App\Models\CatalogCastTrait;
use App\Models\AttachmentCastTrait;
class Article extends Model
{
    use CatalogCastTrait, AttachmentCastTrait;

    protected $fillable = ['title', 'site', 'description', 'sort', 'recommend', 'avatar_aid', 'source', 'click'];

    protected $casts = [
        'site' => 'catalog',
        'avatar_aid' => 'attachment',
    ];

    public function extra()
    {
        return $this->hasOne('App\\Models\\ArticleExtra', 'id', 'id');
    }

    public static function getArticle($cateid, $pageSize)
    {
        return self::where('site', '=', $cateid)->orderBy('sort', 'asc')->orderBy('id', 'desc')->take($pageSize)->get();
    }

    public static function getRecommendArticle($cateid, $pageSize)
    {
        $bulder = self::where('recommend', '=', 1)->orderBy('id', 'desc')->take($pageSize);
        !empty($cateid) && $bulder->where('site', '=', $cateid);
        return $bulder->get();
    }
}
