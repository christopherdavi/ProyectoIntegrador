<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $categorie = categorie::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie = new Categorie();
        $categorie->name = $request->name;
        $categorie->condition = $request->condition;
        $categorie->icon = $request->icon;
        $categorie->save();
        return $categorie;
        if ($categorie) {
            echo "creado con exito";
        } else {
            echo "nel pastel error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function searchCategories(Request $request)
    {
        //
        $categories = Categorie::where('name', $request->name)->get();
        return $categories;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorie $categorie, $id)
    {
        $categorie = categorie::find($id);
        $categorie->name = $request->get("name");
        $categorie->condition = $request->get("condition");
        $categorie->icon = $request->get("icon");

        $categorie->save();
        return $categorie;
        if ($categorie) {
            echo "editar con exito";
        } else {
            echo "nel pastel";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $categorie, $id)
    {
        $categorie = categorie::find($id);
        $categorie->delete();
        return "eliminado con exito";
    }
   
}
