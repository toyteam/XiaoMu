<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CategoryModel extends Model
{
    public function get_category($user_id)
    {
        return DB::table('category')
                ->where('category_user_id', $user_id)
                ->select('id', 'category_name')
                ->get();
    }
}
