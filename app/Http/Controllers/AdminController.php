<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class AdminController extends Controller
{

    // Ahora incluiremos la lógica al controlador "AdminController", para ello incluiremos el método constructor y haremos uso de middleware
    // para permitir el acceso al mismo sólo a los usuarios autenticados, excepto a la acción createAdmin.
    public function __construct(){
        $this->middleware('auth', ['except' => 'createAdmin']);
    }
  // A continuación crearemos un método privado que será el encargado de comprobar si el usuario autenticado es administrador o no.
  //  Este método luego será utilizado en cada una de las acciones del controlador. Código del método privado isAdmin() ...
    private function isAdmin(){

        if (Auth::user()->user == 1) return true;
        else return false;
    }


  // El método anterior regresa un valor boolean. Si la columna "user" del usuario autenticado es igual 1 es que es administrador.
  //  Para ver la prueba crearemos una nueva acción-ruta llamada "admin" con el siguiente código ...
    public function admin(request $request){
        if ($this->isAdmin()){

              $search = trim($request->get('search'));
          $users = User::where('name','LIKE', '%' .$search.'%')
        ->orderBy('id','asc')
        ->paginate(5);
        return view('usuarios.index',['users'=> $users,'search'=> $search]);
        } else{
            return redirect('/inicio');
        }
    }







    public function createAdmin(Request $request){

      if ($request->isMethod('post'))
      {
       //Roles de validación
       $rules = [
        'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:6|max:18|confirmed',
       ];

       //Posibles mensajes de error de validación
       $messages = [
        'name.required' => 'El campo es requerido',
        'name.min' => 'El mínimo de caracteres permitidos son 3',
        'name.max' => 'El máximo de caracteres permitidos son 16',
        'name.regex' => 'Sólo se aceptan letras',
        'email.required' => 'El campo es requerido',
        'email.email' => 'El formato de email es incorrecto',
        'email.max' => 'El máximo de caracteres permitidos son 255',
        'email.unique' => 'El email ya existe',
        'password.required' => 'El campo es requerido',
        'password.min' => 'El mínimo de caracteres permitidos son 6',
        'password.max' => 'El máximo de caracteres permitidos son 18',
        'password.confirmed' => 'Los passwords no coinciden',
       ];

       $validator = Validator::make($request->all(), $rules, $messages);

       //Si la validación no es correcta redireccionar al formulario con los errores
       if ($validator->fails()){
        return redirect()->back()->withErrors($validator);
       }
       else{ // De los contrario guardar al usuario
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->remember_token = str_random(100);
        // $user->confirm_token = str_random(100);
        //Activar al administrador sin necesidad de enviar correo electrónico
         // $user->active = 1;
        //El valor 1 en la columna determina si el usuario es administrador o no
        $user->user = 1;

        if ($user->save()){
         return redirect()->back()->with('message', 'Enhorabuena nuevo administrador creado correctamente');
        } else{
         return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
        }
       }
      }

      return View('admin.createadmin');
     }

  }
