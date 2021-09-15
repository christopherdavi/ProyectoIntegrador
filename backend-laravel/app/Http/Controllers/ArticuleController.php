<?php

namespace App\Http\Controllers;

use App\Models\articule;
use App\Models\products;
use App\Models\subCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ArticuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $articule=articule::all();
    }
    public function subCategory(){

        $subCategory = subCategorie::all();
        return response()->json([
            'data' => $subCategory,
            'message' => 'Aqui las subcategorias para el id'
        ], 200);
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

        $articule = new Articule();
        $articule->code = $request->code;
        $articule->name = $request->name;
        $articule->salePrice = $request->salePrice;
        $articule->codePostal = $request->codePostal;
        $articule->stock = $request->stock;
        $articule->description = $request->description;
        $result = $request->file('image')->store('image');
        $url_image = $this->upload($request->file('image'));
        $articule->image = $url_image;
        $articule->save();
        return [$result];
    }


    /* Controller de Prueba  */

    public function getAllArticules()
    {
        $articules = Articule::all();
        return response()->json([
            'data' => $articules,
            'message' => 'Articules!'
        ], 201);
    }


    public function createArticule(Request $request)
    {
        $category = subCategorie::find($request->input('id_sub_categories'));
        $articule = new Articule();
        $articule->code = $request->code;
        $articule->codePostal = $request->codePostal;
        $articule->stock = $request->stock;
        $articule->description = $request->description;
        $articule->image = $request->file('file')->store('image');
        $articule->subcategories()->associate($category);
        $articule->save();
        return response()->json([
            'data' => $articule,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '201'
            ]
        ], 201);
    }

    public function getArticuleBySubCategory1()
    {
        $articules = Articule::with('subcategories')
            ->where('id_sub_categories', '=', 1)
            ->latest()
            ->take(2)
            ->get();
        return response()->json([
            'data' => $articules,
            'message' => 'Articulos por Categoria ID (2)!'
        ], 201);
    }

    public function getArticuleBySubCategory2()
    {
        $articules = Articule::with('subcategories')
            ->where('id_sub_categories', '=', 2)
            ->latest()
            ->take(2)
            ->get();
        return response()->json([
            'data' => $articules,
            'message' => 'Articulos por Categoria ID (2)!'
        ], 201);
    }

    public function getArticuleBySubCategory3()
    {
        $articules = Articule::with('subcategories')
            ->where('id_sub_categories', '=', 3)
            ->latest()
            ->take(2)
            ->get();
        return response()->json([
            'data' => $articules,
            'message' => 'Articulos por Categoria ID (3)!'
        ], 201);
    }

    public function getArticuleBySubCategory4()
    {
        $articules = Articule::with('subcategories')
            ->where('id_sub_categories', '=', 4)
            ->latest()
            ->take(2)
            ->get();
        return response()->json([
            'data' => $articules,
            'message' => 'Articulos por Categoria ID (4)!'
        ], 201);
    }

    public function getArticuleBySubCategory5()
    {
        $articules = Articule::with('subcategories')
            ->where('id_sub_categories', '=', 5)
            ->latest()
            ->take(2)
            ->get();
        return response()->json([
            'data' => $articules,
            'message' => 'Articulos por Categoria ID (5)!'
        ], 201);
    }

    public function latestProduct()
    {
        $articules = DB::table('articules')
            ->latest()
            ->take(2)
            ->get();
        return response()->json([
            'data' => $articules,
            'message' => 'Ok ultimos Articulos'
        ], 201);
    }

    /* Controller de Prueba  */

    private function upload($image)
    {
        $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'image';
        $rename = uniqid() . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\articule  $articule
     * @return \Illuminate\Http\Response
     */
    public function show(articule $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\articule  $articule
     * @return \Illuminate\Http\Response
     */
    public function searchArticule($name)
    {
        return articule::where("name", "like", "%" . $name . "%")->get();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\articule  $articule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, articule $articule, $id)
    {
        $articule = articule::find($id);
        $articule->code = $request->get("code");
        $articule->name = $request->get("name");
        $articule->salePrice = $request->get("salePrice");
        $articule->codePostal = $request->get("codePostal");
        $articule->stock = $request->get("stock");
        $articule->description = $request->get("description");
        if (!empty($request->file('image'))) {
            $url_image = $this->upload($request->file('image'));
            $articule->image = $url_image;
        }
        $articule->save();
        return $articule;
        if ($articule) {
            echo "editar con exito";
        } else {
            echo "nel pastel";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\articule  $articule
     * @return \Illuminate\Http\Response
     */
    /* public function destroy(articule $articule, $id)
    {
        $articule=articule::find($id);
        $articule->delete();
        return "eliminado con exito";
    }*/

    public function destroy(articule $articule, $id)
    {

        $articule = DB::table('articules')->where('id', $id)->first();

        $img = storage_path() . "/app/" . $articule->image;

        unlink($img);

        DB::table('articules')->where('id', $id)->delete();

        return response()->json([
            null,
            'message' => 'User deleted !'
        ], 200);
    }
}
