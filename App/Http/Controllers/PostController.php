<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Reply;

class PostController extends Controller
{
    /* 
    public function index()
    {
        $posts = Post::all();

        return view('twitter.index',['posts' => $posts]);
    }  */

    public function mypost()
    {
        $id = Auth::id(); 
        $users = User::all();
        $posts = Post::latest('created_at')->get();
        //dd($id);

/* */
        return view('myDatabase.mypost',['id' => $id,
                                         'users' => $users,
                                         'posts' => $posts]);
    }

    public function ourpost()
    {
        $id = Auth::id(); 
        $users = User::all();
        $posts = Post::latest('created_at')->get();
        //dd($id);

/* */
        return view('myDatabase.ourpost',['id' => $id,
                                         'users' => $users,
                                         'posts' => $posts]);
    }

    public function postpage()
    {
        $id = Auth::id(); 
        $users = User::all();
        //dd($id);

/* */
        return view('myDatabase.postpage',['id' => $id,
                                         'users' => $users]);
    }

    public function newpost(Request $request)
    {
        $post = new Post;
        $post->post = $request->post;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect()->route('ourpost');
    }
    
    public function onlypost(Request $request)
    {
        $id = Auth::id(); 
        $users = User::all();
        $posts = Post::latest('created_at')->get();
        $replies = Reply::latest('created_at')->get();
        $viewId = $request->viewId;
        //dd($viewId);

/* */
        return view('myDatabase.onlypost',['id' => $id,
                                         'users' => $users,
                                         'posts' => $posts,
                                         'replies' => $replies,
                                         'viewId' => $viewId]);
    }

    public function replypaste(Request $request)
    {
        $viewId = $request->viewId;
        //dd($viewId);
        $reply = new Reply;
        $reply->reply = $request->reply;
        $reply->user_id = $request->user_id;
        $reply->post_id = $request->post_id;
        $reply->hierarchy = $request->hierarchy;
        $reply->save();
        return redirect()->route('onlypost')->with(['viewId' => $viewId]);
    }

    public function reply(Request $request)
    {
        $id = Auth::id(); 
        $users = User::all();
        $replies = Reply::latest('created_at')->get();
        $viewHierarchy = $request->viewHierarchy;
        $viewUserId = $request->viewUserId;
        $viewPostId = $request->viewPostId;
        //dd($viewPostId);

/* */
        return view('myDatabase.reply',['id' => $id,
                                        'users' => $users,
                                        'replies' => $replies,
                                        'viewHierarchy' => $viewHierarchy,
                                        'viewUserId' => $viewUserId,
                                        'viewPostId' => $viewPostId]);
    }

    public function morereply(Request $request)
    {
        $viewHierarchy = $request->viewHierarchy;
        $viewUserId = $request->viewUserId;
        $viewPostId = $request->viewPostId;
        //dd($viewUserId);
        /*数字そのものはマジで無問題
        複数の渡し方に問題あり*/
        $reply = new Reply;
        $reply->reply = $request->reply;
        $reply->user_id = $request->user_id;
        $reply->post_id = $request->post_id;
        $reply->hierarchy = $request->hierarchy;
        $reply->save();
        $id = Auth::id(); 
        $users = User::all();
        $replies = Reply::latest('created_at')->get();
        
        return view('myDatabase.reply',['id' => $id,
                                        'users' => $users,
                                        'replies' => $replies,
                                        'viewHierarchy' => $viewHierarchy,
                                        'viewUserId' => $viewUserId,
                                        'viewPostId' => $viewPostId]);
    }
}
