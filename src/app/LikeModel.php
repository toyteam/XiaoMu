<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LikeModel extends Model
{
    public function like($blog_id, $user_id)
    {
        $count = DB::table('like')
                    ->where('like_create_user_id', $user_id)
                    ->where('like_target_blog_id', $blog_id)
                    ->count();

        if($count > 0)
            return false;

        $insert = [
            'like_create_user_id' => $user_id,
            'like_target_blog_id' => $blog_id,
            'like_create_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('like')->insert($insert);

    }
}
