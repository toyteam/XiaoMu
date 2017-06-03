<?php

namespace App;

require_once(app_path().'/Http/Function.php');

use Illuminate\Database\Eloquent\Model;
use DB;
use Storage;

class BlogModel extends Model
{
    public function create_blog()
    {
        return DB::table('blog')
                ->insertGetId(['blog_is_usefull' => false]);
    }

    public function write($data)
    {
        // dd($data);
        // if($this->save_files($data['files']))
        // {

        // }
        $str1 = preg_replace('/(<.+?>)|(&.+?;)/', '', $data['content']);
        $insert = [];
        $insert['blog_tags']          = null == $data['tag'] ? '' : $data['tag'];
        $insert['blog_title']         = null == $data['title'] ? '' : $data['title'];
        $insert['blog_content']       = null == $data['content'] ? '' : $data['content'];
        $insert['blog_summary']       = null == $data['summary'] ? ($str1 != '' ? substr_utf8($str1,  0, 200) : '') : $data['summary'];
        $insert['blog_is_public']     = isset($data['is_public']);
        $insert['blog_index_top']     = isset($data['index_top']);
        $insert['blog_category_id']   = isset($data['category']) ? $data['category'] : 0;
        $insert['blog_category_top']  = isset($data['category_top']);
        $insert['blog_allow_comment'] = isset($data['allow_comment']);
        $insert['blog_view_password'] = $data['password'];

        if(isset($data['type']) && $data['type'] == 1)
            $insert['blog_publish_time'] = date('Y-m-d H:i:s');

        $insert['blog_create_time'] = date('Y-m-d H:i:s');
        $insert['blog_view_count'] = 0;
        $insert['blog_is_usefull'] = 1;

        return DB::table('blog')
                ->where('id', $data['id'])
                ->update($insert);
    }

    public function edit($data)
    {
        // dd($data);
        $update = [];
        $update['blog_tags']          = null == $data['tag'] ? '' : $data['tag'];
        $update['blog_title']         = null == $data['title'] ? '' : $data['title'];
        $update['blog_content']       = null == $data['content'] ? '' : $data['content'];
        $update['blog_summary']       = null == $data['summary'] ? substr_utf8(preg_replace('/(<.+?>)|(&.+?;)/', '', $data['content']), 0, 200) : $data['summary'];
        $update['blog_is_public']     = isset($data['is_public']);
        $update['blog_index_top']     = isset($data['index_top']);
        $update['blog_category_id']   = isset($data['category']) ? $data['category'] : 0;
        $update['blog_category_top']  = isset($data['category_top']);
        $update['blog_allow_comment'] = isset($data['allow_comment']);
        $update['blog_view_password'] = $data['password'];
        $update['blog_create_time']   = date('Y-m-d H:i:s');
        $update['blog_view_count']    = 0;

        return DB::table('blog')
                ->where('id', $data['id'])
                ->update($update);
    }

    public function get_draft_blog($user_id, $data)
    {
        $page_now = isset($data['p']) ? $data['p'] : 1;

        $get = DB::table('blog')
                ->whereNull('blog_publish_time')
                ->whereNull('blog_delete_time')
                ->join('category', 'category.id', '=', 'blog_category_id')
                ->where('category_user_id', $user_id);

        $page_count = $get;
        $page_count = $page_count->count();
        $page_count = ceil($page_count / 10);

        if($page_now > $page_count)
            $page_now = 1;

        $get = $get->select('blog.id as blog_id', 'blog_title', 'blog_summary', 'blog_tags', 'category.id as category_id', 'blog_create_time', 'category_name')
                   ->offset($page_now * 10 - 10)
                   ->limit(10)
                   ->get();
        return [
            'data' => $get,
            'page_now' => $page_now,
            'page_count' => $page_count
        ];
    }

    public function get_publish_blog($user_id, $data)
    {
        $page_now = isset($data['p']) ? $data['p'] : 1;

        $get = DB::table('blog')
                ->whereNotNull('blog_publish_time')
                ->whereNull('blog_undo_time')
                ->whereNull('blog_delete_time')
                ->join('category', 'category.id', '=', 'blog_category_id')
                ->where('category_user_id', $user_id);

        $page_count = $get;
        $page_count = $page_count->count();
        $page_count = ceil($page_count / 10);

        if($page_now > $page_count)
            $page_now = 1;

        $get = $get->select(DB::raw('blog.id as blog_id, blog_title, blog_summary, blog_tags, blog_view_count, 0 as comment_count, blog_create_time, category.id as category_id, category_name'))
                   ->offset($page_now * 10 - 10)
                   ->limit(10)
                   ->get();

        $count = DB::table('comment')
                    ->whereNull('comment_delete_time')
                    ->join('blog', 'comment_blog_id', '=', 'blog.id')
                    ->whereNotNull('blog_publish_time')
                    ->whereNull('blog_undo_time')
                    ->whereNull('blog_delete_time')
                    ->select(DB::raw('blog.id, count(comment.id) as count'))
                    ->groupBy('blog.id')
                    ->get();

        $arr = [];
        foreach ($count as $value) {
            $arr[$value->id] = $value->count;
        }
        foreach ($get as &$value) {
            $value->comment_count = isset($arr[$value->blog_id]) ? $arr[$value->blog_id] : 0;
        }

        return [
            'data' => $get,
            'page_now' => $page_now,
            'page_count' => $page_count
        ];
    }

    public function get_undo_blog($user_id, $data)
    {
        $page_now = isset($data['p']) ? $data['p'] : 1;
        
        $get = DB::table('blog')
                ->whereNotNull('blog_undo_time')
                ->whereNull('blog_delete_time')
                ->join('category', 'category.id', '=', 'blog_category_id')
                ->where('category_user_id', $user_id);

        $page_count = $get;
        $page_count = $page_count->count();
        $page_count = ceil($page_count / 10);

        if($page_now > $page_count)
            $page_now = 1;

        $get = $get->select(DB::raw('blog.id as blog_id, blog_title, blog_summary, blog_tags, blog_view_count, 0 as comment_count, blog_create_time, category.id as category_id, category_name'))
                   ->offset($page_now * 10 - 10)
                   ->limit(10)
                   ->get();

        $count = DB::table('comment')
                    ->join('blog', 'comment_blog_id', '=', 'blog.id')
                    ->whereNotNull('blog_publish_time')
                    ->whereNull('blog_undo_time')
                    ->whereNull('blog_delete_time')
                    ->select(DB::raw('blog.id, count(comment.id) as count'))
                    ->groupBy('blog.id')
                    ->get();

        $arr = [];
        foreach ($count as $value) {
            $arr[$value->id] = $value->count;
        }
        foreach ($get as &$value) {
            $value->comment_count = isset($arr[$value->blog_id]) ? $arr[$value->blog_id] : 0;
        }

        return [
            'data' => $get,
            'page_now' => $page_now,
            'page_count' => $page_count
        ];
    }

    public function get_delete_blog($user_id, $data)
    {
        $page_now = isset($data['p']) ? $data['p'] : 1;
        
        $get = DB::table('blog')
                ->whereNotNull('blog_delete_time')
                ->join('category', 'category.id', '=', 'blog_category_id')
                ->where('category_user_id', $user_id);

        $page_count = $get;
        $page_count = $page_count->count();
        $page_count = ceil($page_count / 10);

        if($page_now > $page_count)
            $page_now = 1;

        $get = $get->select(DB::raw('blog.id as blog_id, blog_title, blog_summary, blog_tags, blog_view_count, 0 as comment_count, blog_create_time, category.id as category_id, category_name'))
                   ->offset($page_now * 10 - 10)
                   ->limit(10)
                   ->get();

        $count = DB::table('comment')
                    ->join('blog', 'comment_blog_id', '=', 'blog.id')
                    ->whereNotNull('blog_publish_time')
                    ->whereNull('blog_undo_time')
                    ->whereNull('blog_delete_time')
                    ->select(DB::raw('blog.id, count(comment.id) as count'))
                    ->groupBy('blog.id')
                    ->get();

        $arr = [];
        foreach ($count as $value) {
            $arr[$value->id] = $value->count;
        }
        foreach ($get as &$value) {
            $value->comment_count = isset($arr[$value->blog_id]) ? $arr[$value->blog_id] : 0;
        }

        return [
            'data' => $get,
            'page_now' => $page_now,
            'page_count' => $page_count
        ];
    }

    public function publish_blog($id, $user_id)
    {
        return DB::table('blog')
                ->where('blog.id', $id)
                ->join('category', 'blog_category_id', '=', 'category.id')
                ->where('category_user_id', $user_id)
                ->update(['blog_publish_time' => date('Y-m-d H:i:s'), 'blog_undo_time' => null]);
    }

    public function undo_blog($id, $user_id)
    {
        return DB::table('blog')
                ->where('blog.id', $id)
                ->join('category', 'blog_category_id', '=', 'category.id')
                ->where('category_user_id', $user_id)
                ->update(['blog_undo_time' => date('Y-m-d H:i:s')]);
    }

    public function delete_blog($id, $user_id)
    {
        return DB::table('blog')
                ->where('blog.id', $id)
                ->join('category', 'blog_category_id', '=', 'category.id')
                ->where('category_user_id', $user_id)
                ->update(['blog_delete_time' => date('Y-m-d H:i:s')]);
    }

    public function get_blog($id)
    {
        $blog = DB::table('blog')
                ->where('blog.id', $id)
                ->join('category', 'category.id', '=', 'blog_category_id')
                ->join('user', 'category_user_id', '=', 'user.id')
                ->select('blog.*', 'user_name', 'category_name')
                ->first();

        $blog->blog_tags = $blog->blog_tags == "" ? [] : explode(',', $blog->blog_tags);
        // dd($blog);

        return $blog;
    }

    public function get_static_page($id)
    {
        $blog = DB::table('blog')
                ->where('blog.id', $id)
                ->select('blog_static_page')
                ->first();
        if(!$blog) return '';
        DB::table('blog')
                ->where('blog.id', $id)
                ->increment('blog_open_count');
        $count = DB::table('blog')
                ->where('blog.id', $id)
                ->select('blog_open_count', 'blog_view_password')
                ->first();

        if($count->blog_open_count > 10)
            $this->create_page($id, $count->blog_view_password);

        return $blog->blog_static_page == null ? "" : $blog->blog_static_page;

    }

    public function blog_view_increment($id, $user_id)
    {
        $count = DB::table('blog_view')
                    ->where('blog_view_user_id', $user_id)
                    ->where('blog_view_blog_id', $id)
                    ->count();

        if($count != 0)
            return;

        $insert = [
            'blog_view_blog_id' => $id,
            'blog_view_user_id' => $user_id,
            'blog_view_create_time' => date('Y-m-d H:i:s'),
            'blog_view_create_ip' => get_client_ip()
        ];

        DB::table('blog_view')->insert($insert);

        DB::table('blog')
            ->where('blog.id', $id)
            ->increment('blog_view_count');
    }

    public function get_blog_by_user_id($user_id, $num = null)
    {
        $get = DB::table('blog')
                ->join('category', 'category.id', '=', 'blog_category_id')
                ->join('user', 'user.id', '=', 'category_user_id')
                ->where('user.id', $user_id)
                ->whereNull('category_delete_time')
                ->whereNull('blog_delete_time')
                ->whereNull('blog_undo_time')
                ->whereNotNull('blog_publish_time')
                ->select('blog.id', 'blog_title', 'blog_summary');
        
        if($num != null)
            return $get->limit($num)->get();

        return $get->get();
    }
    
    public function get_password($id)
    {
        $get = DB::table('blog')
                ->where('id', $id)
                ->select('blog_view_password')
                ->first();

        return $get->blog_view_password;
    }

    public function thumbs_up_increment($id)
    {
        return DB::table('blog')
                ->where('id', $id)
                ->increment('blog_thumbs_up_count');
    }

    public function create_page($id, $pwd = null)
    {
        $filename = 'page/'.md5(time().url('blog')."?id=".$id).'.html';
        // dd(url('blog')."?id=".$id);
        Storage::disk('upload')->put($filename, file_get_contents(url('blog')."?id=".$id.'&exc=1&pwd='.$pwd));

        // dd(1);
        DB::table('blog')
            ->where('id', $id)
            ->update(['blog_static_page' => $filename]);
        return;
    }
}
