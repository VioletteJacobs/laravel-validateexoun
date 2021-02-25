<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DBBook = Book::all();
        return view ("welcome", compact ("DBBook"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "name"=> 'required|min:5|max:30',
            "text" => 'required|max:300',
            "score" => 'required'
        ]);

        $newEntry = new Book;

        $newEntry->name = $request->name;
        $newEntry->text = $request->text;
        $newEntry->score = $request->score;

        $newEntry-> save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        
        $edit = Book::find($id);
        return view ("pages.edit", compact("edit"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "name"=> 'required|min:5|max:30',
            "text" => 'required|max:300',
            "score" => 'integer'
        ]);

        $update = Book::find($id);
        $update->name = $request->name;
        $update->text = $request->text;
        $update->score = $request->score;

        $update->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy= Book::find($id);
        $destroy->delete();
        return redirect()-> back();
    }
}
