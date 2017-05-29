<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UserController extends Controller
{
  protected $user_model;
  protected $blog_model;
  protected $follow_model;
  protected $message_model;

  public function __construct()
  {
    $this->user_model = new \App\UserModel();
    $this->blog_model = new \App\BlogModel();
    $this->follow_model = new \App\FollowModel();
    $this->message_model = new \App\MessageModel();
  }

  public function user(Request $request)
  {
    if($request->has('id') && $request->get('id') != session()->get('user_id'))
    {
      $this->user_model->user_view_increment($request->get('id'), session()->get('user_id'));
      $user_info = $this->user_model->get_user($request->get('id'));
      // $user_dynamic = $this->user_model->get_user_dynamic($request->get('id'));
      $user_follow = $this->follow_model->get_user_follow($request->get('id'));
      $follow_user = $this->follow_model->get_follow_user($request->get('id'));
      $blogs = $this->blog_model->get_blog_by_user_id($request->get('id'));
      $is_follow = $this->follow_model->is_follow($request->get('id'), session()->get('user_id'));
      $messages = $this->message_model->get_message_by_target($request->get('id'));
    }
    else
    {
      $user_info = $this->user_model->get_user(session()->get('user_id'));
      // $user_dynamic = $this->user_model->get_user_dynamic(session()->get('user_id'));
      $user_follow = $this->follow_model->get_user_follow(session()->get('user_id'));
      $follow_user = $this->follow_model->get_follow_user(session()->get('user_id'));
      $blogs = $this->blog_model->get_blog_by_user_id(session()->get('user_id'));
      $is_follow = false;
      $messages = $this->message_model->get_message_by_target(session()->get('user_id'));
    }

    $data = [
      'user_info' => $user_info['user_info'],
      'category_count' => $user_info['category_count'],
      'blog_count' => $user_info['blog_count'],
      'user_follow' => $user_follow,
      'follow_user' => $follow_user,
      'blogs' => $blogs,
      'is_follow' => $is_follow,
      'messages' => $messages,
    ];
    // dd($data);
    return view('user.user', $data);
  }

  public function follow(Request $request)
  {
    if($request->has('id'))
    {
      $follow = $this->follow_model->follow($request->get('id'), session()->get('user_id'));
    }
    return redirect()->back();
  }

  public function unfollow(Request $request)
  {
    if($request->has('id'))
    {
      $follow = $this->follow_model->unfollow($request->get('id'), session()->get('user_id'));
    }
    return redirect()->back();
  }

  public function send_message(Request $request)
  {
    if($request->has('message') && $request->has('id'))
    {
      $message = $this->message_model->send_message($request->all(), session()->get('user_id'));
    }
    return redirect()->back();
  }

  public function edit(Request $request)
  {
    $error_message = '';
    $save_avatar = null;
    $save_thumb = null;
    if($request->hasFile('avatar'))
    {
      $file = $request->file('avatar');
      if($file->isValid())
      {
        $save_avatar = $this->save_avatar($file);
        if(!$save_avatar) $error_message = '头像上传失败！<br />';
      }
    }
    if($request->hasFile('alipay'))
    {
      $file = $request->file('alipay');
      if($file->isValid())
      {
        $save_thumb = $this->save_thumb($file);
        if(!$save_thumb) $error_message = '二维码上传失败！<br />';
      }
    }
    if($error_message != '') set_error_session($error_message);

    $edit = $this->user_model->edit($request->all(), $save_avatar, $save_thumb);

    return redirect()->back();
  }

  private function save_avatar($file)
  {
    $ext = $file->getClientOriginalExtension();
    $filename = $this->createFileName($file->getClientOriginalName()).'.'.$ext;
    $realPath = $file->getRealPath();

    $folder = "upload/avatar/".date('Y-m-d');
    if(!Storage::exists($folder)){
      Storage::makeDirectory($folder);
    }
    $filename = $folder.'/'.$filename;
    $bool = Storage::disk('upload')->put($filename, file_get_contents($realPath));
    if($bool) return asset('').$filename;
    else return false;
  }

  private function save_thumb($file)
  {
    $ext = $file->getClientOriginalExtension();
    $filename = $this->createFileName($file->getClientOriginalName()).'.'.$ext;
    $realPath = $file->getRealPath();
    
    $folder = "upload/thumb/".date('Y-m-d');
    if(!Storage::exists($folder)){
      Storage::makeDirectory($folder);
    }
    $filename = $folder.'/'.$filename;
    $bool = Storage::disk('upload')->put($filename, file_get_contents($realPath));
    if($bool) return asset('').$filename;
    else return false;
  }

  private function createFileName($key)
  {
    return md5(md5($key).md5(time()));
  }
}
