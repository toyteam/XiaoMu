<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Storage;

class FileController extends Controller
{
    protected $fiel_model;

    public function __construct()
    {
        $this->file_model = new \App\FileModel();
    }

    public function upload_image(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('file'))
        {

            $file = $request->file('file');
            if($file->isValid())
            {

                $ext      = $file->getClientOriginalExtension();    // 扩展名
                $realPath = $file->getRealPath();                   //临时文件的绝对路径
                $type     = $file->getClientMimeType();             // image/jpeg
                
                if($this->is_image($type))
                {
                    $filename = md5(time().$file->getClientOriginalName()).'.'.$ext;
                    $folder = "upload/image/".date('Y-m-d');
                    if(!Storage::exists($folder)){
                        Storage::makeDirectory($folder);
                    }
                    $filename = $folder.'/'.$filename;
                    // Storage::move($realPath, $filename);
                    $bool = Storage::disk('upload')->put($filename, file_get_contents($realPath));
                    // dd($bool);
                    $this->file_model->insert($file->getClientOriginalName(), $filename, $request->get('id'));
                    return asset('').$filename;
                }
                return "error|文件格式错误，必须为图片";
            }
            return "error|文件上传失败";
        }
        return "error|文件不存在";
    }

    public function file(Request $request)
    {

        // return view('file.file');
        if($request->has('id'))
        {
            $files = $this->file_model->get_file($request->get('id'));
            
            if($files)
            {
                $data = [
                    'files' => $files
                ];
                // dd($files);
                return view('file.file', $data);
            }
        }
        return redirect()->back();
    }

    public function delete_file(Request $request)
    {
        if($request->has('id'))
        {
            $files = $this->file_model->delete_file($request->get('id'));
        }
        return redirect()->back();
    }

    public function recovery_file(Request $request)
    {
        if($request->has('id'))
        {
            $files = $this->file_model->recovery_file($request->get('id'));
        }
        return redirect()->back();
    }

    private function is_image($mineType)
    {
         return starts_with($mineType, 'image/');
    }
}
