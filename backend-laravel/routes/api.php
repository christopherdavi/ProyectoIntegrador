<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ModuleProviders\RoleController;
use App\Http\Controllers\Api\ModuleProviders\UserController;
use App\Http\Controllers\Api\ModuleProviders\TypeIdentificacionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SubCategorieController;
use App\Http\Controllers\ArticuleController;
use App\Http\Controllers\ProductsController;
use App\Models\articule;
use App\Models\products;
use Database\Factories\ArticuleFactory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// roles
Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles', [RoleController::class, 'store']);
Route::get('/roles/{id}', [RoleController::class, 'show']);
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

// users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

//type Identifications
Route::get('/typeIdentificacions', [TypeIdentificacionController::class, 'index']);
Route::post('/typeIdentificacions', [TypeIdentificacionController::class, 'store']);
Route::get('/typeIdentificacions/{id}', [TypeIdentificacionController::class, 'show']);
Route::put('/typeIdentificacions/{id}', [TypeIdentificacionController::class, 'update']);
Route::delete('/typeIdentificacions/{id}', [TypeIdentificacionController::class, 'destroy']);

//Products

//categories
Route::get('/categories',[CategorieController::class,'index']);
Route::post('/categories',[CategorieController::class,'store']);
Route::get('/categories/{id}',[CategorieController::class,'show']);
Route::put('/categories/{id}',[CategorieController::class,'update']);
Route::delete('/categories/{id}',[CategorieController::class,'destroy']);
Route::get('/searchCategories/{name}', [CategorieController::class, 'searchCategories']);
//subcategories
Route::get('/subCategories',[SubCategorieController::class,'index']);
Route::post('/subCategories',[SubCategorieController::class,'store']);
Route::get('/subCategories/{id}',[SubCategorieController::class,'show']);
Route::put('/subCategories/{id}',[SubCategorieController::class,'update']);
Route::delete('/subCategories/{id}',[SubCategorieController::class,'destroy']);
Route::get('/searchsubCategories/{name}', [SubCategorieController::class, 'searchsubCategories']);

//articule
Route::get('/articules',[ArticuleController::class,'index']);
Route::post('/articules',[ArticuleController::class,'store']);
Route::get('/articules/{id}',[ArticuleController::class,'show']);
Route::put('/articules/{id}',[ArticuleController::class,'update']);
Route::delete('/articules/{id}',[ArticuleController::class,'destroy']);
Route::get('/searchArticule/{name}', [ArticuleController::class, 'searchArticule']);
 
/* articule image  */
Route::post('/createArticule',[ArticuleController::class,'createArticule']);
/* ruta para el buscardor de prueba */
Route::get('/searchProduct/{search}',[ProductsController::class,'searchProduct']);

/* esta de arriba */
Route::get('/getAllArti',[ArticuleController::class,'getAllArticules']);
Route::get('getArticulesByCat',[ArticuleController::class,'getArticuleBySubCategory1']);
Route::get('getArticulesByCat2',[ArticuleController::class,'getArticuleBySubCategory2']);
Route::get('getArticulesByCat3',[ArticuleController::class,'getArticuleBySubCategory3']);
Route::get('getArticulesByCat4',[ArticuleController::class,'getArticuleBySubCategory4']);
Route::get('getArticulesByCat5',[ArticuleController::class,'getArticuleBySubCategory5']);
Route::get('getLatestArti',[ArticuleController::class,'latestProduct']);

//products
Route::get('/products',[ProductsController::class,'index']);

/*Join products and articules*/ 
Route::get('/allP',[ProductsController::class,'allProducts']);

Route::get('/allP/{id}', [ProductsController::class, 'showProduct']);
Route::get('/allPbyCat/{id}', [ProductsController::class, 'showProductByCategory']);
Route::post('/product',[ProductsController::class,'store']);
Route::get('/products/{id}',[ProductsController::class,'show']);
Route::put('/products/{id}',[ProductsController::class,'update']);
Route::delete('/products/{id}',[ProductsController::class,'destroy']);
Route::get('/searchProducts/{name}', [ProductsController::class, 'searchProducts']);

//names 
Route::get('/nameSubcategories', [SubCategorieController::class, 'nameCategories']);

/* Rutas para obtener los ids en select */
Route::get('/articleId', [ProductsController::class, 'articles']);
Route::get('/subCategoryId', [ArticuleController::class, 'subCategory']);
Route::get('/categoryId', [SubCategorieController::class, 'category']);
Route::get('/catSubArtPro', [ProductsController::class, 'catSubArtPro']);


