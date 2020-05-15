<?php

namespace app\model;

use app\core\App;
use app\core\Base\Model;

class Pic extends Model
{
    protected $table = 'pic';
    protected static $pathToServicePic = '/pic/srvc/nophoto-min.jpg';

    static function show($url)
    {
        if (is_readable(ROOT.$url)) {
            return $url;
        }
        return self::$pathToServicePic;
    }
}
