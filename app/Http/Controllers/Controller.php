<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait;

    public function pagesize(){
        return request()->pageSize ?? 15;
    }

    public function transaction(callable $call){
        try {
            DB::beginTransaction();
            call_user_func($call);
            DB::commit();
            return true;
        }catch (\Exception $ex) {
            DB::rollBack();
            info(__CLASS__ . ' | ' . __FUNCTION__ . ' | ' . $ex->getFile() . ' | ' . $ex->getLine() . ' | error = ' . $ex->getMessage());
            return false;
        }
    }
}
