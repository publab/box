<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29/029
 * Time: 14:50
 */

namespace App\Http\Traits;


trait ResponseTrait
{
    /**
     * @param $message
     * @param string  $url
     * @return \Illuminate\Http\JsonResponse
     * return success info
     */
    protected function success($message, $data=[])
    {
        return $this->toResponseData($message, 1,$data);
    }

    /**
     * @param $message
     * @param string  $url
     * @return \Illuminate\Http\JsonResponse
     * return error info
     */
    protected function error($message, $data=[])
    {
        return $this->toResponseData($message, 0,$data);
    }


    /**
     * @param $message
     * @return array
     */
    protected function errorJson($message, $data = null)
    {
        return ['status' => 0, 'message' => $message, 'info' => $data];
    }


    /**
     * @param $message
     * @return array
     * 返回json数据
     */
    protected function successJson($message, $data = null)
    {
        return ['status' => 1, 'message' => $message, 'info' => $data];
    }



    /**
     * @param $message
     * @param $status
     * @param string  $url
     * @return \Illuminate\Http\JsonResponse
     */
    private function toResponseData($message, $status, $data=[])
    {
        $json['data'] = $data;
        $json['status'] = $status;
        $json['message'] = $message;
        return response()->json($json);
    }

    /**
     * Ajax方式返回数据到客户端
     *
     * @access protected
     * @param  mixed  $data 要返回的数据
     * @param  String $type AJAX返回数据格式
     * @return void
     */
    protected function ajaxReturn($data, $type = '')
    {
        if (empty($type)) {
            $type = 'JSON';
        }
        switch (strtoupper($type)) {
            case 'JSON':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                return response()->json($data);
            case 'XML':
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'EVAL':
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);
        }
    }
}
