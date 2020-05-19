<?php

namespace App\Http\Controllers;

// Estamos importando la clase useer para usar las funciones que nos permitan gestionar los datos en BD
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

  public function index() {
    $users = User::latest()->get();
    // Indicamos que la vista a usar sera la que se guarde en resources/views/users/index.blade.php
    // la carpeta user la creamos nosotros
    return view('users.index', ['users' => $users]);

    // para crear usuarios de prueba debemos usar el comando php artisan tinker
    // tnker es una consola de laravel que permite ejecutar codigo o clases
    // la tarea pedirá la ubicación de la clase encargada de crear los datos de muestra
    // posteriormente llamaremos el metodo create e indocar el numero de registros
    // las clases de facttories se encuentran en  database/factories/UserFactory.php
    // php artisan tinker
    // >>> factory(App\User::class, 12)->create()
    // 12 => es la catidad de registros
    // App\User => ubicación de la clase
    //
  }
  public function store(Request $request) {
    $request->validate([
      'name' => ['required'],
      'email' => ['required','email', 'unique:users'], // uniqued toma como refrencia la tabla de base de datos
      'password' => ['required', 'min:8']
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password), // bcrcypt es un metodo propio de laravel para encriptar
    ]);

    // esto le indica a laravel que debe retornar a la vista anterior
    return back();
  }

  /**
   * @param User $user  este parametro lo definimos en la ruta
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy(User $user) {
    $user->delete();
    return back();
  }
}
