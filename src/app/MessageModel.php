<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
