@extends('layouts.main', ['activePage' => 'user-create', 'titlePage' => __('Crear Usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Usuario') }}</h4>
                <p class="card-category">{{ __('Ingresar datos') }}</p>
              </div>
              <div class="card-body ">
                  <div class="row">
                      <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" placeholder="ingrese el nombre" autofocus>
                      </div>
                  </div>
                  <div class="row">
                      <label for="username" class="col-sm-2 col-form-label">Nombre de usuario</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="username" placeholder="ingrese el nombre de usuario" autofocus>
                      </div>
                  </div>
                  <div class="row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-7">
                          <input type="email" class="form-control" name="email" placeholder="ingrese su email" autofocus>
                      </div>
                  </div>
                  <div class="row">
                      <label for="password" class="col-sm-2 col-form-label">password</label>
                      <div class="col-sm-7">
                          <input type="password" class="form-control" name="password" placeholder="password" autofocus>
                      </div>
                  </div>
              </div>
              <!-- pie del formulario-->
              <div class="card-footer ml-auto mr-auto">
                  <a href="{{ route('user.index') }}" class="btn btn-danger"> Salir</a>
                  <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
              </div>
              <!-- Fin pie del formulario-->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
