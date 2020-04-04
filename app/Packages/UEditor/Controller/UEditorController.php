<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/4/4
 * Time: 14:18
 */

namespace App\Packages\UEditor\Controller;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Packages\UEditor\Config\UEditor;
use App\Packages\UEditor\Interfaces\UEditorInterface;

class UEditorController extends Controller
{
    use ResponseTrait;

    protected $editor;

    /**
     * UploadController constructor.
     * @param UploadInterface $upload
     * 注册仓库
     */
    public function __construct(UEditorInterface $editor)
    {
        $this->editor = $editor;
    }

    /**
     * 配置文件
     * @return array
     */
    public function config(){
        return UEditor::index();
    }

    /**
     * @param Request $request
     * @return mixed
     * 图片上传
     */
    public function image(Request $request)
    {
        return $this->exception(function ()use($request){

            $uploadFile = $request->file('file') ?? [];

            $this->checkMimeTypes($uploadFile,[
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/svg+xml',
            ]);

            $url = config('app.url').'/'.$this->editor->image('storage/images/'.date('Y/m/d'),$uploadFile);

            return $this->success('上传成功',$url);

        });
    }

    /**
     * 验证允许文件类型
     * @param $files
     * @param $allowedTypes
     */
    public function checkMimeTypes($file,$allowedTypes){
        if(!in_array($file->getMimeType(), $allowedTypes)){
            throw new \Exception('文件类型错误');
        }
        if(!$file->isValid()){
            throw new \Exception('上传图片异常');
        }
    }
}
