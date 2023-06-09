<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:100',
            'description'=>'',
            'thumb'=>'nullable',
            'price'=>'required|string',
            'series'=>'required|string|max:50',
            'sale_date'=>'required',
            'type'=>'required|string|max:50',
            'artists'=>'required|string',
            'writers'=>'required|string',
        ]);

        $data = $request->all();
        $newComic = new Comic();

            $newComic->title = $data['title'];
            $newComic->description = $data['description'];
            $newComic->thumb = $data['thumb'];
            $newComic->price = $data['price'];
            $newComic->series = $data['series'];
            $newComic->sale_date = $data['sale_date'];
            $newComic->type = $data['type'];
            $newComic->artists = $data ['artists'];
            $newComic->writers = $data['writers'];
            $newComic->save(); 

            return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comics = Comic::find($id);

        return view('comic.show', compact('comics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comics = Comic::find($id);

        return view('comic.edit',compact('comics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comics)
    {
        $data = $request->all();

            $comics->title = $data['title'];
            $comics->description = $data['description'];
            $comics->thumb = $data['thumb'];
            $comics->price = $data['price'];
            $comics->series = $data['series'];
            $comics->sale_date = $data['sale_date'];
            $comics->type = $data['type'];
            $comics->artists = $data ['artists'];
            $comics->writers = $data['writers'];
            $comics->save();

            return redirect()->route('comics.show', $comics->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index');
    }
}
