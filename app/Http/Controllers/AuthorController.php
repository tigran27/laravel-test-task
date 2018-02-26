<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorStore;
use App\Http\Requests\AuthorUpdate;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('journals')->get();

        return view('author.index', compact('authors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorStore $request)
    {
        $author = Author::create(
            [
                'first_name' => $request->first,
                'last_name' => $request->last,
                'middle_name' => $request->middle,
            ]
        );

        if($author) {
            return response([
                'status' => 'success',
                'message' => 'author created successfully'
            ], 200);
        }
        else {
            return response([
                'status' => 'error',
                'message' => 'author created error'
            ], 404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);

        return view('author.edit', compact('author'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuthorUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdate $request, $id)
    {
        $author = Author::find($id);

        $author->first_name = $request->first;
        $author->last_name = $request->last;
        $author->middle_name = $request->middle;

        $author->save();

        if($author) {
            return response([
                'status' => 'success',
                'message' => 'author updated successfully'
            ], 200);
        }
        else {
            return response([
                'status' => 'error',
                'message' => 'author update error'
            ], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->journals()->detach();

        $destroy = Author::destroy($id);

        if($destroy) {
            return response([
                'status' => 'success',
                'message' => 'author remove successfully'
            ], 200);
        }
        else {
            return response([
                'status' => 'error',
                'message' => 'author remove error'
            ], 404);
        }

    }
}
