<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioController extends Controller
{

    

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'last_name' => 'required',
                'id_type' => 'required',
                'id_card' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'profession' => 'required',
                'role' => 'required'
            ]);
    
            $usuario = new Usuario();
            $usuario->name = $request->input("name");
            $usuario->last_name = $request->input("last_name");
            $usuario->id_type = $request->input("id_type");
            $usuario->id_card = $request->input("id_card");
            $usuario->phone = $request->input("phone");
            $usuario->email = $request->input("email");
            $usuario->profession  = $request->input("profession");
            $usuario->role  = $request->input("role");
            $usuario->save();
    
            $message = ["message" => "Registro Exitoso!"];
            return response()->json($message);
        } catch (ValidationException $e) {
            $errorMessage = $e->getMessage();
            return response()->json(["error" => $errorMessage], 422);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(["error" => $errorMessage], 500);
        }
    }
    

    public function read()
    {
        try {
            $usuarios = new Usuario();
            $data = $usuarios->all();
    
            if ($data instanceof Collection && $data->isEmpty()) {
                throw new ModelNotFoundException('No se encontraron usuarios en la base de datos');
            }
            return $data;

        } catch (ModelNotFoundException $e) {
            $errorMessage = $e->getMessage();
            return response()->json(["error" => $errorMessage], 404);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(["error" => $errorMessage], 500);
        }
    }

    //parámetro como parte de la URL

    // public function read_user(String $id){
    //     $usuarios = new Usuario();
    //     $data = $usuarios->find($id);
    //     echo $data;
    //     return $data;
    // }
    
    //parámetro de consulta (query parameter)

    public function read_user(Request $request)
    {
        try {
            $usuarios = new Usuario();
            $id = $request->input("id");
            $data = $usuarios->findOrFail($id);
    
            return $data;
        } catch (ModelNotFoundException $e) {
            $errorMessage = "El usuario con ID {$id} no existe";
            return response()->json(["error" => $errorMessage], 404);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(["error" => $errorMessage], 500);
        }
    }
    

    public function update(Request $request)
    {
        try {
            $usuario = new Usuario();
            $id = $request->input("id");
            $usuario_update = $usuario->find($id);
    
            if ($request->filled("name")) {
                $usuario_update->name = $request->input("name");
            }
    
            if ($request->filled("last_name")) {
                $usuario_update->last_name = $request->input("last_name");
            }
    
            if ($request->filled("id_type")) {
                $usuario_update->id_type = $request->input("id_type");
            }
    
            if ($request->filled("id_card")) {
                $usuario_update->id_card = $request->input("id_card");
            }
    
            if ($request->filled("phone")) {
                $usuario_update->phone = $request->input("phone");
            }
    
            if ($request->filled("email")) {
                $usuario_update->email = $request->input("email");
            }
    
            if ($request->filled("profession")) {
                $usuario_update->profession = $request->input("profession");
            }
    
            if ($request->filled("role")) {
                $usuario_update->role = $request->input("role");
            }
    
            $usuario_update->save();
    
            $message = ["message" => "Usuario Actualizado!"];
            return response()->json($message);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
    
            return response()->json(["error" => $errorMessage], 500);
        }
    }
    
    

    

    public function delete(Request $request)
    {
        try {
            $usuario = new Usuario();
            $id = $request->input("id");
            $usuario_delete = $usuario->findOrFail($id);
            $usuario_delete->delete();
    
            $message = ["message" => "Usuario Eliminado!"];
            return response()->json($message);
        } catch (ModelNotFoundException $e) {
            $errorMessage = "El usuario con ID {$id} no existe";
            return response()->json(["error" => $errorMessage], 404);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(["error" => $errorMessage], 500);
        }
    }
    
}
