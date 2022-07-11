<?php

use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/costumers', function () {
    return datatables()
    ->eloquent(Costumer::query())
    ->addColumn('btn', 'costumer.actions')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/costumer/{id}', function ($id) {
    $costumer = Costumer::find($id);
    return response()->json($costumer);
});




Route::post('costumer/create', function (Request $request) {
        try {

            $costumer = Costumer::create($request->all());
        
            return response()->json(['success' => 'costumer creado con exito']);

        } catch (Exception $e) {
            return response()->json(['error'=>$e]);
                            
        };

    
    });



Route::post('/costumer/{id}', function ($id) {
    try {

        $costumer = Costumer::find($id);
        $costumer->delete();
        return response()->json(['success' => 'The costumer has been deleted']);
        
    } catch (error $error) {
        return response()->json(['error'=> $error]);
    };
});
//->middleware('auth:sanctum')