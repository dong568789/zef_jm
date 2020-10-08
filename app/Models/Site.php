<?php

namespace App\Models;

use App\Model;
use App\Models\CatalogCastTrait;
use App\Models\AttachmentCastTrait;

class Site extends Model
{
    use CatalogCastTrait, AttachmentCastTrait;

    protected $guarded = ['id'];

    const WEB_SETTING = "web_settings";

    protected $casts = [
        'logo' => 'attachment',
        'wechat' => 'attachment',
    ];


    public static function getSite()
    {
        return self::first();
    }
}
