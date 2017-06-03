<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SqlController extends Controller
{
    public function sql()
    {
        return view('sql.sql');
    }

    public function run(Request $request)
    {
        if(!session()->get('user_is_admin'))
        {
            echo '<meta http-equiv="refresh" content="5;url='.url('sql').'"> ';
            echo "您不是管理员哦<br />";
            echo "3秒后跳转";
            return;
        }
        $sql = $request->get('sql');

        $insert = [
            'log_create_user_id' => session()->get('user_id'),
            'log_data' => $sql,
            'log_type' => 'remote_sql',
            'log_create_time' => date('Y-m-d H:i:s')
        ];
        // dd($insert);
        DB::table('log')->insert($insert);

        DB::connection('mysql_sql')->statement($sql);
        echo '<meta http-equiv="refresh" content="5;url='.url('sql').'"> ';
        echo "成功执行<br />";
        echo "3秒后跳转";
    }
}
