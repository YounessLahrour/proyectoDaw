<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Empleado;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dni' => ['required', 'string', 'min:9', 'max:9','unique:users','unique:empleados'],
            'direccion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'unique:empleados'],
            'provincia' => ['required'],
            'fechaNacimiento' => ['required', 'date'],
            'foto' => ['nullable']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $empleado = new Empleado();
        $empleado->nombre = $data['name'];
        $empleado->apellido = $data['apellido'];
        $empleado->dni = $data['dni'];
        $empleado->provincia = $data['provincia'];
        $empleado->fechaNacimiento = $data['fechaNacimiento'];
        $empleado->direccion = $data['direccion'];
        $empleado->telefono = $data['telefono'];
        $empleado->mail = $data['email'];

        if (isset($data['foto'])) {
            //Todo bien hemos subido un archivo y es de imagen
            $file = $data['foto'];
            //creo un nombre
            $nombre = 'users/' . time() . ' ' . $file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //le damos a alumno un nombre que le hemos puesto al fichero
            $nombre1 = 'empleados/' . time() . ' ' . $file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre1, \File::get($file));


            $empleado->foto = "img/$nombre1";
            $empleado->save();
            return User::create([
                'name' => $data['name'],
                'apellido'=>$data['apellido'],
                'dni' => $data['dni'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'avatar' => "img/$nombre"
            ]);
        } else {

            $empleado->save();
            return User::create([
                'name' => $data['name'] ,
                'apellido'=>$data['apellido'],
                'dni' => $data['dni'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),

            ]);
            
        }
    }

    public function showRegistrationForm()
    {
        $provincias = ["Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca", "Islas Baleares", "Jaén", "La Coruña", "La Rioja", "Las Palmas", "León", "Lérida", "Lugo", "Madrid", "Málaga", "Murcia", "Navarra", "Orense", "Palencia", "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza"];
        return view('auth.register', compact('provincias'));
    }
}
