<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CommentModel extends Model
{
    public function get_comment_by_blog_id($blog_id, $user_id)
    {
        return DB::table('comment')
                ->where('comment_blog_id', $blog_id)
                ->join('user', 'user.id', '=', 'comment_user_id')
                ->leftJoin('comment_report', function($join) use($user_id) {
                    $join->on('comment.id', '=', 'comment_report_comment_id')
                        ->where('comment_report_user_id', $user_id);
                })
                ->select('comment.id', 'user_name', 'user.id as user_id', 'user_image_path', 'comment_content', 'comment_create_time', 'comment_delete_time', 'comment_report_num', 'comment_report_create_time')
                ->get();
    }

    public function comment($data)
    {
        $str = preg_replace('/(<.+?>)|(&nbsp;)/', '', $data['comment']);
        if(strlen($str) <= 0) return false; 

        $insert = [
            'comment_blog_id' => $data['blog_id'],
            'comment_user_id' => session()->get('user_id'),
            'comment_content' => $data['comment'],
            'comment_create_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('comment')->insert($insert);
    }

    public function delete_comment($id)
    {
        return DB::table('comment')
                ->where('id', $id)
                ->update(['comment_delete_time' => date('Y-m-d H:i:s')]);
    }

    public function report_comment($id, $user_id)
    {
        $count = DB::table('comment_report')
                    ->where('comment_report_comment_id', $id)
                    ->where('comment_report_user_id', $user_id)
                    ->count();

        if($count != 0)
            return;

        $insert = [
            'comment_report_comment_id' => $id,
            'comment_report_user_id' => $user_id,
            'comment_report_create_time' => date('Y-m-d H:i:s')
        ];

        DB::table('comment_report')->insert($insert);

        DB::table('comment')
            ->where('id', $id)
            ->increment('comment_report_num');
    }

    public function unreport_comment($id, $user_id)
    {
        $count = DB::table('comment_report')
                    ->where('comment_report_comment_id', $id)
                    ->where('comment_report_user_id', $user_id)
                    ->count();

        if($count == 0)
            return;

        DB::table('comment_report')
            ->where('comment_report_comment_id', $id)
            ->where('comment_report_user_id', $user_id)
            ->delete();

        DB::table('comment')
            ->where('id', $id)
            ->decrement('comment_report_num');
    }
}
