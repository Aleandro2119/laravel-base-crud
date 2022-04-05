<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComicsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comics = Comic::all();


        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'title' => 'required|string|unique:comics|min:5|max:255',
                'series' => 'required|string',
                'sale_date' => 'required|date',
                'thumb' => 'required|string|unique:comics',
                'price' => 'required|numeric|min:0.99',
                'type' => 'required|string',
                'description' => 'required|string',
            ],
            [
                'required' => 'Il campo :attribute è obbligatorio!',
                'title.unique' => "Il Fumetto $request->title è già esistente!",
                'thumb.unique' => "Questa immagine è già stata inserita!",
                'title.min' => "$request->title è lungo meno di 5 caratteri!"
            ]
        );

        $data = $request->all();

        $comic = Comic::create($data);

        return redirect()->route('comics.show', $comic->id);
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
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic  $comic)
    {
        //
        $request->validate(
            [
                'title' => ['required', 'string', Rule::unique('comics')->ignore($comic->id), 'min:5', 'max:255'],
                'series' => 'required|string',
                'sale_date' => 'required|date',
                'thumb' => ['required', 'string', Rule::unique('comics')->ignore($comic->id)],
                'price' => 'required|numeric|min:0.99',
                'type' => 'required|string',
                'description' => 'required|string',
            ],
            [
                'required' => 'Il campo :attribute è obbligatorio!',
                'title.unique' => "Il Fumetto $request->title è già esistente!",
                'thumb.unique' => "Questa immagine è già stata inserita!",
                'title.min' => "$request->title è lungo meno di 5 caratteri!"
            ]
        );

        $data = $request->all();

        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index', compact('comic'))->with('message', $comic->title . ' eliminato con successo!')->with('type', 'success');
    }
}
