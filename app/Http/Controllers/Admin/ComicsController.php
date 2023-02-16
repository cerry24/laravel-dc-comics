<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|string|min:2|max:150|unique:comics,title',
            'description' => 'required|string|min:20',
            'cover' => 'required|active_url|min:2',
            'price' => 'required|decimal:2|min:1',
            'series' => 'required|string|min:2|max:50',
            'sale_date' => 'required|date|',
            'type' => 'required|string|min:2|max:50'
        ],
        [ //error's response
            'title.required' => 'Devi inserire un titolo per poter creare un nuovo elemento',
            'title.min' => 'La lunghezza del titolo deve essere compresa tra 2 e 150 caratteri',
            'title.max' => 'La lunghezza del titolo deve essere compresa tra 2 e 150 caratteri',
            'title.string' => 'Il titolo deve essere di tipo stringa',
            'title.unique' => 'Il titolo non può essere identico ad un altro già esistente',

            'description.required' => 'Devi inserire una descrizione per poter creare un nuovo elemento',
            'description.min' => 'La lunghezza della descrizione deve essere di almeno 20 caratteri',
            'description.string' => 'La descrizione deve essere di tipo stringa',

            'cover.required' => 'Devi inserire un\' immagine per poter creare un nuovo elemento',
            'cover.active_url' => 'La copertina deve essere un URL esistente',

            'price.required' => 'Devi inserire un prezzo per poter creare un nuovo elemento',
            'price.decimal' => 'Il prezzo deve essere un numero decimale con massimo 5 cifre totali e 2 decimali',

            'series.required' => 'Devi inserire una serie per poter creare un nuovo elemento',
            'series.min' => 'La lunghezza del titolo deve essere compresa tra 2 e 50 caratteri',
            'series.max' => 'La lunghezza del titolo deve essere compresa tra 2 e 50 caratteri',
            'series.string' => 'La serie deve essere di tipo stringa',

            'sale_date' => 'Devi inserire una data di vendita per poter creare un nuovo elemento',
            'sale_date.date' => 'LA data di vendita deve essere  di tipo data',

            'type.required' => 'Devi inserire un tipo per poter creare un nuovo elemento',
            'type.min' => 'La lunghezza del tipo deve essere compresa tra 2 e 50 caratteri',
            'type.max' => 'La lunghezza del tipo deve essere compresa tra 2 e 50 caratteri',
            'type.string' => 'Il tipo deve essere di tipo stringa',
        ]);

        // $newComic = new Comic();
        // $newComic->title = $data['title'];
        // $newComic->description = $data['description'];
        // $newComic->cover = $data['cover'];
        // $newComic->price = $data['price'];
        // $newComic->series = $data['series'];
        // $newComic->sale_date = $data['sale_date'];
        // $newComic->type = $data['type'];
        // $newComic->save();

        // create another way to do it using fillable properties
        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();

        return redirect()->route('admin.comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::findOrFail($id);

        return view('admin.comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|string|min:2|max:150|unique:comics,title',
            'description' => 'required|string|min:20',
            'cover' => 'required|active_url|min:2',
            'price' => 'required|decimal:2|min:1',
            'series' => 'required|string|min:2|max:50',
            'sale_date' => 'required|date|',
            'type' => 'required|string|min:2|max:50'
        ],
        [ //error's response
            'title.required' => 'Devi inserire un titolo per poter creare un nuovo elemento',
            'title.min' => 'La lunghezza del titolo deve essere compresa tra 2 e 150 caratteri',
            'title.max' => 'La lunghezza del titolo deve essere compresa tra 2 e 150 caratteri',
            'title.string' => 'Il titolo deve essere di tipo stringa',
            'title.unique' => 'Il titolo non può essere identico ad un altro già esistente',

            'description.required' => 'Devi inserire una descrizione per poter creare un nuovo elemento',
            'description.min' => 'La lunghezza della descrizione deve essere di almeno 20 caratteri',
            'description.string' => 'La descrizione deve essere di tipo stringa',

            'cover.required' => 'Devi inserire un\' immagine per poter creare un nuovo elemento',
            'cover.active_url' => 'La copertina deve essere un URL esistente',

            'price.required' => 'Devi inserire un prezzo per poter creare un nuovo elemento',
            'price.decimal' => 'Il prezzo deve essere un numero decimale con massimo 5 cifre totali e 2 decimali',

            'series.required' => 'Devi inserire una serie per poter creare un nuovo elemento',
            'series.min' => 'La lunghezza del titolo deve essere compresa tra 2 e 50 caratteri',
            'series.max' => 'La lunghezza del titolo deve essere compresa tra 2 e 50 caratteri',
            'series.string' => 'La serie deve essere di tipo stringa',

            'sale_date' => 'Devi inserire una data di vendita per poter creare un nuovo elemento',
            'sale_date.date' => 'LA data di vendita deve essere  di tipo data',

            'type.required' => 'Devi inserire un tipo per poter creare un nuovo elemento',
            'type.min' => 'La lunghezza del tipo deve essere compresa tra 2 e 50 caratteri',
            'type.max' => 'La lunghezza del tipo deve essere compresa tra 2 e 50 caratteri',
            'type.string' => 'Il tipo deve essere di tipo stringa',
        ]);
        $comic->update($data);

        return redirect()->route('admin.comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('admin.comics.index');
    }
}
