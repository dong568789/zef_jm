<?php

namespace Plugins\Web\App;

use App\Model;
use App\Models\AttachmentCastTrait;

class Article extends Model
{
    use AttachmentCastTrait;

    protected $guarded = ['id'];

    protected $casts = [
        'article_status' => 'catalog',
        'cover_id' => 'attachment'
    ];

    public function extra()
    {
        return $this->hasOne('Plugins\\Web\\App\\ArticleContent', 'id', 'id');
    }

    public function category()
    {
        return $this->hasOne('Plugins\\Web\\App\\Category', 'id', 'cid');
    }
}
