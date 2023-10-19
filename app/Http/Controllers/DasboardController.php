<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index(Request $request) 
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('dasboard', [
            'book_count' => $bookCount,
            'category_count' => $categoryCount,
            'user_count' => $userCount
    ]);
    }
}
