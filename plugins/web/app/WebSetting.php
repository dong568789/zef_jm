<?php

namespace Plugins\Web\App;

use Cache;
use App\Model;
use Addons\Core\Models\CacheTrait;
use App\Models\AttachmentCastTrait;

class WebSetting extends Model
{
    use AttachmentCastTrait, CacheTrait;

    protected $guarded = ['id'];

    public const WEB_SETTING = 'web_setting_';

    protected $casts = [
        'wechat_qr' => 'attachment',
        'logo' => 'attachment'
    ];

    public static function clearCache($id)
    {
        Cache::forget(WebSetting::WEB_SETTING.$id);
    }
}


WebSetting::created(function ($model) {
    WebSetting::clearCache($model->getKey());
});

WebSetting::updated(function ($model) {
    WebSetting::clearCache($model->getKey());
});
