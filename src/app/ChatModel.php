<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ChatModel extends Model
{

    public function send_chat($data, $user_id)
    {
        $insert = [
            'chat_create_user_id' => $user_id,
            'chat_target_user_id' => $data['id'],
            'chat_content' => $data['chat'],
            'chat_create_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('chat')
                ->insert($insert);
    }

    public function get_chat_by_target_and_create($target_user_id, $create_user_id = null)
    {
        $get = DB::table('chat')
                ->whereNull('chat_delete_time')
                ->where('chat_target_user_id', $target_user_id);
        if($create_user_id != null)
            $get = $get->where('chat_create_user_id', $create_user_id);
        
        $get = $get->join('user', 'chat_create_user_id', '=', 'user.id')
                ->select('user.id as user_id', 'user_name', 'chat.*', 'user_image_path')
                ->orderBy('chat_create_time', 'desc')
                ->get();

        if(!$get) return [];

        return $get;
    }
}
