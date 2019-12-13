<?php
/**
 * Created by PhpStorm.
 * User: 89340
 * Date: 2019/12/10
 * Time: 9:44
 */

namespace Publab\Lakala\Facades;

use Illuminate\Support\Facades\Facade;

class Lakala extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lakala';
    }
}
