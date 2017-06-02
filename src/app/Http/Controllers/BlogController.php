<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{   
    protected $blog_model;
    protected $category_model;
    protected $comment_model;
    protected $user_model;
    protected $like_model;

    public function __construct()
    {
        $this->blog_model = new \App\BlogModel();
        $this->category_model = new \App\CategoryModel();
        $this->comment_model = new \App\CommentModel();
        $this->user_model = new \App\UserModel();
        $this->like_model = new \App\LikeModel();
    }

    public function publish(Request $request)
    {
        if($request->has('id'))
        {
            $result = $this->blog_model->publish_blog($request->get('id'), session()->get('user_id', 0));
            if(!$result)
                set_error_session('您没有权限发布此博客');
        }
        return redirect()->back();
    }

    public function undo(Request $request)
    {
        if($request->has('id'))
        {
            $result = $this->blog_model->undo_blog($request->get('id'), session()->get('user_id', 0));
            if(!$result)
                set_error_session('您没有权限撤回此博客');
        }
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if($request->has('id'))
        {
            $result = $this->blog_model->delete_blog($request->get('id'), session()->get('user_id', 0));
            if(!$result)
                set_error_session('您没有权限删除此博客');
        }
        return redirect()->back();
    }

    public function blog(Request $request)
    {
        if($request->has('id'))
        {
            $password = $request->has('pwd') ? $request->get('pwd') : null;
            $bool = $this->text_blog_password($request->get('id'), $password);
            if(!$bool)
            {
                return redirect(url('blog/password').'?return_url='.urlencode($request->url()).'&id='.$request->get('id'));
            }

            $increment = $this->blog_model->blog_view_increment($request->get('id'), session()->get('user_id'));
            $blog = $this->blog_model->get_blog($request->get('id'));
            $comments = $this->comment_model->get_comment_by_blog_id($request->get('id'), session()->get('user_id'));
            $user = $this->user_model->get_user_by_blog_id($request->get('id'));

            $data = [
                'blog' => $blog,
                'comments' => $comments,
                'user' => $user
            ];
            // dd($data);
            return view('blog.blog', $data);
        }
        return redirect()->back();
    }

    public function comment(Request $request)
    {
        $comment = $this->comment_model->comment($request->all());
        return redirect(url('blog').'?id='.$request->get('blog_id').'#comment');
    }

    public function like(Request $request)
    {
        if($request->has('id'))
        {
            $like = $this->like_model->like($request->get('id'), session()->get('user_id'));
            if($like)
                $this->blog_model->thumbs_up_increment($request->get('id'));
        }
        return redirect()->back();
    }

    public function password(Request $request)
    {
        // dd($request->all());
        if($request->has('return_url') && $request->has('id'))
        {
            $data = [
                'return_url' => urldecode($request->get('return_url')),
                'id' => $request->get('id')
            ];
            return view('blog.password', $data);
        }
        return redirect()->back();
    }

    public function text_blog_password($id, $getpassword)
    {
        $password= $this->blog_model->get_password($id);
        $bool = ($getpassword == $password);
        // dd($getpassword);
        if($getpassword != null && !$bool)
        {
            set_error_session('密码错误');
        }
        return $bool;
    }
}
