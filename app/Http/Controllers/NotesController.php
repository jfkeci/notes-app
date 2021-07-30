<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id = 0)
    {
        /* $notes = Note::all(); */
        $user_id = auth()->user()->id;

        if (empty($category_id)) {
            $notes = DB::select('SELECT * FROM notes WHERE user_id = ' . $user_id . ' ORDER BY created_at ASC');
        } else {
            $notes = DB::select('SELECT * FROM notes WHERE category_id = ' . $category_id . ' AND user_id = ' . $user_id . ' ORDER BY created_at ASC');
        }

        $categories = Category::all();

        $data = array(
            'notes' => $notes,
            'categories' => $categories
        );
        return view('notes.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $categories = DB::select('SELECT category FROM categories'); */
        $categories = Category::all();
        /* $categories = Category::pluck('category', 'id'); */

        return view('notes.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $note = new Note;
        $note->title = $request->input('title');
        $note->body = $request->input('body');
        $note->category_id = $request->input('category');
        $note->user_id = auth()->user()->id;

        $note->save();

        return redirect('/notes')->with('success', 'Note created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        $category = Category::find($note->category_id)->category;

        $data = array(
            'note' => $note,
            'category' => $category
        );

        return view('notes.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        $categories = Category::all();

        if (auth()->user()->id !== $note->user_id) {
            return redirect('/notes')->with('error', 'Unauthorised page.');
        }

        $data = array(
            'note' => $note,
            'categories' => $categories
        );

        return view('notes.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $note = Note::find($id);

        $note->title = $request->input('title');
        $note->body = $request->input('body');
        $note->body = $request->input('category');

        $note->save();

        return redirect('/notes')->with('success', 'Note updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect('/notes')->with('success', 'Note removed');
    }
}
