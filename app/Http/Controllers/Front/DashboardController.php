<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::take(4)->inRandomOrder()->get();
        $posts = $posts->map(function ($arr) {
            $arr['category'] = $arr->category->title;
            $arr['author'] = $arr->author->name;
            return $arr;
        });
        $posts_chunks = $posts->chunk(2);
        $recent_posts = Post::latest()->paginate(3);

        return view('front.dashboard.index', compact('posts_chunks', 'recent_posts'));
    }
}
