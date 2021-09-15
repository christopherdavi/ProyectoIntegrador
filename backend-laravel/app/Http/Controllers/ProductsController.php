<?php

namespace App\Http\Controllers;

use App\Models\articule;
use App\Models\products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        /* return $products=products::all(); */
        $products = products::get();
        return response()->json([
            'data' => $products,
            'message' => 'productos obtenidos con éxito'
        ], 200);
    }
    public function searchProduct(Request $request, $search)
    {

        /* $search = $request->input('s'); */
        $products = products::select(
            "products.id",
            "products.name",
            "articules.image",
            "products.salePrice",
            "articules.description"
        )
            ->join("articules", "articules.id", "=", "products.id_articules")
            ->where('products.name', 'LIKE', '%' . $search . '%')
            ->get();

        if ($products) {
            return response()->json([
                'products' => $products,
                'message' => 'productos en buscados con éxito'
            ], 200);
        } else {
            return response()->json([
                'message' => 'no se encontraron productos'
            ], 404);
        }
    }

    public function articles()
    {
        $article = articule::all();
        return response()->json([
            'data' => $article,
            'message' => 'Aqui los articulos para el id'
        ], 200);
    }

    public function allProducts(Request $request)
    {
        $products = products::select(
            "products.id",
            "products.name",
            "articules.image",
            "products.salePrice",
            "articules.description"
        )
            ->join("articules", "articules.id", "=", "products.id_articules")
            ->get();
        if ($products) {
            return response()->json([
                'data' => $products,
                'message' => 'productos en carta'
            ], 200);
        } else {
            return response()->json([
                'message' => 'no se encontraron productos'
            ], 404);
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
        $article = Articule::find($request->input('id_articules'));
        $product = new Products();
        $product->name = $request->name;
        $product->purshePrice = $request->purshePrice;
        $product->salePrice = $request->salePrice;
        $product->expirationDate = $request->expirationDate;
        $product->weight = $request->weight;
        $product->fragility = $request->fragility;
        $product->length = $request->length;
        $product->broad = $request->broad;
        $product->amount = $request->amount;
        $product->articules()->associate($article);
        $product->id_articules = $request->id_articules;
        $product->save();
        return response()->json([
            'data' => $product,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '201'
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $id)
    {
        return $id;
    }
    public function showProduct($id)
    {

        $products = DB::table('products')
            ->join("articules", "articules.id", "=", "products.id_articules")
            ->join("sub_categories", "sub_categories.id", "articules.id_sub_categories")
            ->where(['products.id' => $id])
            ->get();
        if ($products) {
            return response()->json([
                'data' => $products,
                'message' => 'Detalles de los productos obtenidos con éxito'
            ], 200);
        } else {
            return response()->json([
                'message' => 'no se encontraron productos'
            ], 404);
        }
    }
    public function showProductByCategory($id)
    {

        $products = DB::table('products')
            ->join("articules", "articules.id", "=", "products.id_articules")
            ->join("sub_categories", "sub_categories.id", "articules.id_sub_categories")
            ->join("categories", "categories.id", "sub_categories.id_categories")
            ->select(
                "products.id",
                "products.name as product_name",
                "products.purshePrice",
                "articules.image",
                "articules.stock",
                "articules.description"
            )
            ->where(['categories.id' => $id])
            ->get();
        if ($products) {
            return response()->json([
                'data' => $products,
                'message' => 'productos segun su categoria obtenidos con éxito'
            ], 200);
        } else {
            return response()->json([
                'message' => 'no hay productos en la catego´ria'
            ], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function searchProducts(Request $request)
    {
        //
        $products = products::where('name', $request->name)->get();
        return $products;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products, $id)
    {
        $products = products::find($id);
        $products->name = $request->get("name");
        $products->purshePrice = $request->get("purshePrice");
        $products->salePrice = $request->get("salePrice");
        $products->expirationDate = $request->get("expirationDate");
        $products->weight = $request->get("weight");
        $products->fragility = $request->get("fragility");
        $products->length = $request->get("length");
        $products->broad = $request->get("broad");
        $products->fragility = $request->get("amount");
        $products->save();
        return $products;
        if ($products) {
            echo "editar con exito";
        } else {
            echo "nel pastel";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products, $id)
    {
        $products = products::find($id);
        $products->delete();
        return "eliminado con exito";
    }
    public function catSubArtPro(Request $request)
    {

        /*   $user = DB::table('user')            
          -> join('education', 'user.id_user', '=', 'education.id_user')
          -> join('family', 'user.id_user', '=', 'family.id_user')
          -> join('work', 'user.id_user', '=', 'work.id_user')  */
        $products = products::select(
            'categories.name'
        )
            ->join("sub_categories", "sub_categories.id", "=", "sub_categories.id_categories")
            ->get();
        if ($products) {
            return response()->json([
                'data' => $products,
                'message' => 'productos obtenidos con exito'
            ], 200);
        } else {
            return response()->json([
                'message' => 'no se encontraron productos'
            ], 404);
        }
    }
}
