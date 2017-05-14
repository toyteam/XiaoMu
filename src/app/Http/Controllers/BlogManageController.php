<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogManageController extends Controller
{
    protected $blog_model;
    protected $category_model;

    public function __construct()
    {
        $this->blog_model = new \App\BlogModel();
        $this->category_model = new \App\CategoryModel();
    }

    public function write()
    {
        $categorys = $this->category_model->get_category(session()->get('user_id'));

        $data = [
            'url' => 'url_write',
            'categorys' => $categorys
        ];

        return view('blog.manage.write', $data);
    }

    public function write2(Request $request)
    {
        $write = $this->blog_model->write($request->all());
        return redirect('blog/manage/write');
    }

    public function draft(Request $request)
    {
        $info = $this->blog_model->get_draft_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_draft',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];

        return view('blog.manage.draft', $data);
    }

    public function publish(Request $request)
    {
        $info = $this->blog_model->get_publish_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_publish',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];
        // dd($data);
        return view('blog.manage.publish', $data);
    }

    public function undo(Request $request)
    {
        $info = $this->blog_model->get_undo_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_undo',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];
        
        return view('blog.manage.undo', $data);
    }

    public function delete(Request $request)
    {
        $info = $this->blog_model->get_delete_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_delete',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];
        
        return view('blog.manage.delete', $data);
    }

    public function category()
    {
        // $categorys = $this->category_model->get_categorys(session()->get('user_id'));

        $data = [
            'url' => 'url_category',
            // 'categorys' => $categorys
        ];
        
        return view('blog.manage.category', $data);
    }

    public function comment()
    {
        // $blogs = $this->blog_model->get_delete_blog(session()->get('user_id'));

        $data = [
            'url' => 'url_comment',
            // 'blogs' => $blogs
        ];
        
        return view('blog.manage.comment', $data);
    }
}
