<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Showing Admin dashborad
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('admin.index', [
            'postsCount'=> Post::count(),
            'categoriesCount'=> Category::count(),
            'commentsCount'=> Comment::count(),
            'usersCount'=> User::count()
        ]);
    }
}
