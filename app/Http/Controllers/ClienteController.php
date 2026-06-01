<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        return view('backend.usuarios.cliente');
    }
    
    public function perfil(){
        $usuario = auth()->user();
        return view('backend.usuarios.perfil', compact('usuario'));
    }
    
    public function actualizarPerfil(Request $request){
        $usuario = auth()->user();
        $request->validate([
        'name'     => 'required|string|max:100',
        'email'    => 'required|email|unique:users,email,' . $usuario->id,
        'password' => 'nullable|min:6|confirmed',
        ]);
        
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        
        if($request->filled('password')){
        $usuario->password = Hash::make($request->password);
        }
        
        $usuario->save();
        
        return redirect()->route('cliente.perfil')
             ->with('success', 'Perfil actualizado correctamente.');
    }
}
