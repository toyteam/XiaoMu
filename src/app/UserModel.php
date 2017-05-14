<?php

namespace App;

require_once app_path().'/Http/Function.php';

use Illuminate\Database\Eloquent\Model;

use DB;

class UserModel extends Model
{
    public function login($data)
    {
        $get = DB::table('user')
                ->where('user_email', $data['email'])
                ->select('id', 'user_name', 'user_password', 'user_is_activate', 'user_lock_time')
                ->first();

        if(!$get)
            return 1;

        if(!$get->user_is_activate)
            return 2;

        if($get->user_lock_time != null)
            return 3;

        if(!password_verify($data['password'], $get->user_password))
            return 4;

        session()->put('user_id', $get->id);
        session()->put('user_name', $get->user_name);
        session()->put('user_is_login', true);

        $update = [
            'user_lastest_login_time' => date('Y-m-d H:i:s'),
            'user_lastest_login_ip' => get_client_ip()
        ];

        DB::table('user')
            ->where('id', $get->id)
            ->update($update);

        return 5;
    }

    public function register($data)
    { 
        $insert = [
            'user_name' => $data['name'],
            'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'user_email' => $data['email'],
            'user_is_activate' => false,
            'user_create_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('user')->insertGetId($insert);
    }

    public function get_user_by_blog_id($blog_id)
    {
        return DB::table('user')
                ->join('category', 'category_user_id', '=', 'user.id')
                ->join('blog', 'blog_category_id', '=', 'category.id')
                ->where('blog.id', $blog_id)
                ->select('user.id', 'user_name', 'user_alipay_picture_path', 'user_image_path')
                ->first();
    }
}
