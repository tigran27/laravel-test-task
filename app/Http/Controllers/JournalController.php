<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Author;

use App\Http\Requests\JournalStore;
use App\Http\Requests\JournalUpdate;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $journals = Journal::with('authors')->get();

        return view('journal.index', compact('journals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorsAll = Author::all();
        $authors = $authorsAll ?: null;

        return view('journal.create', compact('authors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JournalStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JournalStore $request)
    {
        $allData = $request->all();

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            $imageName = time().'.jpg';

            $image->move('images', $imageName);
        }


        $journal = Journal::create(
                [
                    'title' => $allData['titles'],
                    'description' => $allData['description'],
                    'image' => $imageName,
                    'journal_creation_date' => $allData['created-date'],
                ]
            );

        if($journal) {
            $journal->authors()->attach($request->author);

            return response([
                'status' => 'success',
                'message' => 'journal created successfully'
            ], 200);
        }
        else {
            return response([
                'status' => 'error',
                'message' => 'journal created error'
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

        $id_array = [];
        $oldData = Journal::with('authors')->find($id);

        foreach($oldData->authors as $author){
            $id_array[] = $author->id;
        }

        $authorsAll = Author::all();
        $authors = $authorsAll ?: null;


        return view('journal.edit', compact('oldData', 'authors', 'id_array'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  JournalUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JournalUpdate $request, $id)
    {

        $journal = Journal::findOrFail($id);

        if ($request->hasFile('files'))
        {
            unlink('images/'.$journal->image);
            $image = $request->file('files');

            $imageName = time().'.jpg';

            $image->move('images', $imageName);
        }
        else {
            $imageName = $journal->image;
        }


        $journal->title = $request->titles;
        $journal->description = $request->description;

        $journal->image = $imageName;
        $journal->journal_creation_date = $request->journal_creation_date;
        $journal->save();

        $arr = explode(',', $request->authors);

        foreach ($arr as $authorId) {
            $authorsId[] = $authorId;
        }

        $journal->authors()->detach();
        $journal->authors()->attach($authorsId);

        if($journal) {
            return response([
                'status' => 'success',
                'message' => 'journal updated successfully'
            ], 200);
        }
        else {
            return response([
                'status' => 'error',
                'message' => 'journal update error'
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
        $journal = Journal::find($id);
        $journal->authors()->detach();

        unlink('images/'.$journal->image);
        $destroy = Journal::destroy($id);

        if($destroy) {
            return response([
                'status' => 'success',
                'message' => 'journal deleted successfully'
            ], 200);
        }
        else {
            return response([
                'status' => 'error',
                'message' => 'journal deleted error'
            ], 404);
        }

    }

}
