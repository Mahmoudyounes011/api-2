<?php

use App\Events\LikeEvent;
use App\Events\ViewEvent;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/product',function()
// {
//     $product = Product::find(1)->with('live')->get();

//     dd($product);
// });

Route::get('/home',function()
{
    //

});

Route::get('/ShowProduct/{id}',function($id)
{
    $product = Product::find($id);
    if(!isset($product->live))
        $product->live()->create(['live'=>0 ,'like'=>0]);
        event(new ViewEvent($product));
});

Route::get('/LikeProduct/{id}',function($id)
{
    $product = Product::find($id);
    if(!isset($product->live))
        $product->live()->create(['live'=>0 ,'like'=>0]);
    event(new LikeEvent($product));
});


// Route::get('/test/home',function()
// {
//     $product = Product::select(['id','name','price'])->first();

//     while(true)
//     {
//         event(new ViewEvent($product));
//         sleep(1);
//     }
// });

Route::post('/signup',[AuthenticateController::class,'signup']);
Route::post('/login',[AuthenticateController::class,'login']);

Route::group(['middleware'=> ['auth:api']],function()
{
    Route::post('/logout',[AuthenticateController::class,'logout']);
});
