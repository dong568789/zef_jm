<?php

namespace Plugins\Web\App;

use App\Model;

class ArticleContent extends Model
{
    protected $fillable = ['id', 'content'];

    public $timestamps= false;
}
