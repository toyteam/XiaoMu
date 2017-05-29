<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MessageModel extends Model
{
    public function send_message($data, $user_id)
    {
        $insert = [
            'message_create_user_id' => $user_id,
            'message_target_user_id' => $data['id'],
            'message_content' => $data['message'],
            'message_create_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('message')
                ->insert($insert);
    }

    public function get_message_by_target($target_user_id)
    {
        $get = DB::table('message')
                ->whereNull('message_delete_time')
                ->where('message_target_user_id', $target_user_id)
                ->join('user', 'message_create_user_id', '=', 'user.id')
                ->select('user.id as user_id', 'user_name', 'message.*')
                ->orderBy('message_create_time', 'desc')
                ->get();

        if(!$get) return [];

        return $get;
    }
}
