<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font-family: 'Nunito', sans-serif; -->

</head>
<body>
<div class="container">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                  - {{  $error }}<br/>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="col-sm-3">
                                <input name="name" value="{{ old('name') }}" class="form-control" placeholder="Nombre" type="text">
                            </div>
                            <div class="col-sm-3">
                                <input name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" type="email">
                            </div>
                            <div class="col-sm-3">
                                <input name="password" value="{{ old('password') }}" class="form-control" placeholder="Contraseña" type="password">
                            </div>
                            <div class="col-auto">
                                <input  class="btn btn-primary" value="Guardar" type="submit">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>

                    <!-- Blade al igual que blazor tiene palabras reservadas para interpretar codigo php dentro de las plantillas --->
                    @foreach($users as $user)
                        <tr>
                        <td>{{$user->id }}</td>
                        <td>{{$user->name }}</td>
                        <td>{{$user->email }}</td>
                        <!-- Si se desea eliminar un registro se debe hacer por medio de formularios -->
                        <td>
                            <!-- usamos el herlper route para llamr a la ruta creada en routes/web.php con el nombre asignado -->
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input
                                        type="submit"
                                        value="Eliminar"
                                        onclick="return confirm('¿Esta seguro de eliminar?')"
                                        class="btn btn-sm btn-danger">
                            </form>
                        </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
</div>
</body>
</html>
