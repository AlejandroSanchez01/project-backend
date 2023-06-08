<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/saludo",function (Request $request) {
        $message = ["message" => "Hola mundo!"];

        return response()->json($message);

    });

    Route::post("/usuario/crear",function (Request $request) {
        $message = ["usuario" => "creado!"];

        return response()->json($message);

    });    

    Route::get("/usuario/obtener",function (Request $request) {
        $message = ["usuario" => "obtenido!"];

        return response()->json($message);

    }); 

    Route::put("/usuario/actualizar",function (Request $request) {
        $message = ["usuario" => "actualizado!"];

        return response()->json($message);

    }); 

    Route::delete("/usuario/eliminar",function (Request $request) {
        $message = ["usuario" => "eliminado!"];

        return response()->json($message);

    }); 