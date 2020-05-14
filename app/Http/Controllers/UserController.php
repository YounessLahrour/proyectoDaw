<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function perfil(){
        $usuario=User::find(Auth::user()->id);

        return view('auth.perfil', compact('usuario'));
    }

    public function password(){
        $usuario=User::find(Auth::user()->id);

        return view('auth.password', compact('usuario'));
    }
    public function cambiarPerfil(UserRequest $request, User $usuario){
        $data=$request->validated();


        $foto=$usuario->avatar;
//dd($foto);
        //compruebo si he subido archivo
        if(isset($data['foto'])){
            //Todo bien hemos subido un archivo y es de imagen
            $file=$data['foto'];
            //creo un nombre
            $nombre='users/'.time().' '.$file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //le damos a alumno un nombre que le hemos puesto al fichero
            $usuario->avatar="img/$nombre";
            if(basename($foto)!="default.jpg"){
                //borro la foto si no es default
                unlink($foto);
            }
        }

        $usuario->name=$data['name'];
        $usuario->apellido=$data['apellido'];
        $usuario->email=$data['email'];

        $usuario->update();
        return redirect()->route('perfil')->with('mensaje', 'Tu perfil se ha actualizado correctamente');


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    public function cambiarPassword(PasswordRequest $request, User $usuario){
        $data=$request->validated();

        if(isset($data['passwordActual'])){
            //con Hash::check($value, $hashedValue) compruebo si las contraseñas coinciden
            if(Hash::check($data['passwordActual'], Auth::user()->password)){
                $usuario->password=Hash::make($data['password']);
            }else{
                return redirect()->route('password')->with('error', 'La contraseña actual no es correcta');
            }
        }
        $usuario->update();
        return redirect()->route('password')->with('mensaje', 'Tu contraseña se ha actualizado correctamente');
    }


}
