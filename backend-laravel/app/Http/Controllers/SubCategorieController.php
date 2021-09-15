<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\subCategorie;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $subCategorie= subCategorie::all();
    }

    public function category()
    {
        $category = categorie::all();
        return response()->json([
            'data' => $category,
            'message' => 'Aqui las categorias para el id'
        ], 200);

    }

    public function showSubCategory(){
        $subCategory=DB::table("sub_categories")
        ->join("categories","categories.id","=","sub_categories.id_categories")
       ->select("categories.icon","categories.name as category_name","sub_categories.name as subcategory_name",'categories.id')
       
       ->get();
      
      if($subCategory){
           return response()->json([
               'data'=>$subCategory,
           ]);
       }
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
       /* $subCategorie=subCategorie::create($request->all());
        return $subCategorie;
        if($subCategorie){
            echo "creado con exito"; 
           }else{
            echo "nel pastel error";   
           }*/
        $categorie = categorie::find($request->input('id_categories'));
        $subCategorie = new SubCategorie();
        $subCategorie->name = $request->name;
        $subCategorie->categories()->associate($categorie);
        $subCategorie->save();

        return response()->json([
            'data' => $subCategorie,
            'message' => 'Created Category'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subCategorie  $subCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(subCategorie $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subCategorie  $subCategorie
     * @return \Illuminate\Http\Response
     */
    public function searchsubCategories(Request $request)
    {
        //
        $subcategorie = subCategorie::where('name', $request->name)->get();
        return $subcategorie;
    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subCategorie  $subCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subCategorie $subCategorie,$id)
    {
        $subCategorie=subCategorie::find($id);
        $subCategorie->name=$request->get("name");
        $subCategorie->id_categories= $request->id_categories;
        $subCategorie->save();
        return $subCategorie;
        if($subCategorie){
            echo "editar con exito"; 
         }
         else{
           echo "nel pastel";
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subCategorie  $subCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(subCategorie $subCategorie ,$id)
    { 
        $subCategorie=subCategorie::find($id);
        $subCategorie->delete();
        return "eliminado con exito";
    }
   
   
    public function nameCategories(Request $request){
        $subCategorie=subCategorie::select(
            'categories.name'
        )
        ->join("categories","categories.id","=","sub_categories.id_categories")
        ->get();
        if ($subCategorie) {
            return response()->json([
                'data' =>$subCategorie,
                'message' => 'productos obtenidos con exito'
            ], 200);
        }else{
            return response()->json([
                'message' => 'no se encontraron productos'
            ], 404);
        }

    }
    
}
