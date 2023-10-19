<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index() 
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    public function add() 
    {       
         $category = Category::all();
        return view('books_add', ['category' => $category]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate ([
            'book_code' => 'required|unique:books|max:255',
            'title'     => 'required||max:255'
        ]);

        $newName = "";
        if($request->file('image'))
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        
        }

        $request['cover'] = $newName;
        $books = Book::create($request->all());
        $books->category()->sync($request->categorys);
        return redirect('books')->with('status', 'Book add succesfully');

    }

    public function edit($slug) 
    {
        $book = Book::where('slug',$slug)->first();
        $category = Category::all();
        return view('book_edit', ['category' => $category, 'book' => $book, 'book']);
    }

    public function update(Request $request , $slug) 
    {
        $newName = "";
        if($request->file('image'))
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        
        }

        $request['cover'] = $newName;
        $book = Book::where('slug' , $slug)->first();
        $book->update($request->all());

        if($request->categorys)
        {
        $book->category()->sync($request->categorys);
        }

        return redirect('books')->with('status', "Book Updated Successfully");

    }

    public function delete($slug) 
    {
        $book = Book::where('slug' , $slug)->first();
        return view('book_delete' , ['book' => $book]);
    }


    public function destroy($slug) {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Delete Successfully');

    }

    public function delete_book()
    {
        $deleteBook = Book::onlyTrashed()->get();
        return view('book_deleted' , ['deleteBook' => $deleteBook]);
    }

    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug',$slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restore Successfully');

    }
}
