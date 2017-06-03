<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Storage;

class FileModel extends Model
{
    public function get_file($blog_id)
    {
        return DB::table('file')
                // ->whereNull('file_delete_time')
                ->where('file_blog_id', $blog_id)
                ->get();
    }

    public function delete_file($id)
    {
        $get = DB::table('file')
                ->where('id', $id)
                ->whereNull('file_delete_time')
                ->first();

        if(!$get)
            return false;

        Storage::disk('upload')->move($get->file_path, 'delete/'.$get->file_path);

        return DB::table('file')
                ->where('id', $id)
                ->update(['file_delete_time' => date('Y-m-d H:i:s')]);
    }

    public function recovery_file($id)
    {

        $get = DB::table('file')
                ->where('id', $id)
                ->whereNotNull('file_delete_time')
                ->first();

        if(!$get)
            return false;

        Storage::disk('upload')->move('delete/'.$get->file_path, $get->file_path);
                return DB::table('file')
                ->where('id', $id)
                ->update(['file_delete_time' => null]);
    }

    public function insert($filename, $filepath, $blog_id)
    {
        $insert = [
            'file_name' => $filename,
            'file_path' => $filepath,
            'file_blog_id' => $blog_id,
            'file_create_time' => date('Y-m-d H:i:s')
        ];
        return DB::table('file')->insert($insert);
    }

    // public function 
}
