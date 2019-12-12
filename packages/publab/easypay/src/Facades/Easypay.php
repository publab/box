<?php
/**
 * Created by PhpStorm.
 * User: 89340
 * Date: 2019/12/10
 * Time: 9:44
 */

namespace Publab\Easypay\Facades;

use Illuminate\Support\Facades\Facade;

class Easypay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'easypay';
    }
}
