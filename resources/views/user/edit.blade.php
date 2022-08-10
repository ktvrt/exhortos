@extends('layouts.main', ['activePage' => 'user-create', 'titlePage' => __('Editar Usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          <form class="form" method="POST" action="{{ route('user.update', $usuario) }}">
              @csrf
              {{-- method_field('PUT') --}}
              @method('PUT')
            <div class="card card-hidden mb-3">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title"><strong>{{ __('Editar') }}</strong></h4>
                <p class="card-category">{{ __('Actualizar datos') }}</p>
              </div>
              <div class="card-body ">
                <!-- Name -->
                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}"
                    value="{{ old('name', $usuario->name) }}" required autofocus>
                  </div>
                  @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('name') }}</strong>
                    </div>
                  @endif
                </div>
                <!-- Fin Name -->
                <!-- UserName -->
                <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="material-icons">fingerprint</i>
                      </span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="{{ __('UserName...') }}"
                    value="{{ old('username', $usuario->username) }}" required autofocus>
                  </div>
                  @if ($errors->has('username'))
                    <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                      <strong>{{ $errors->first('username') }}</strong>
                    </div>
                  @endif
                </div>
                <!-- Fin UserName -->
                <!-- email -->
                <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">email</i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}"
                        value="{{ old('email', $usuario->email) }}" required>
                  </div>
                  @if ($errors->has('email'))
                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
                <!-- Fin email -->
                <!-- Password -->
                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="{{ __('Ingrese la contraseña sólo en caso de modificarla...') }}">
                  </div>
                  @if ($errors->has('password'))
                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                      <strong>{{ $errors->first('password') }}</strong>
                    </div>
                  @endif
                </div>
                <!-- Fin Password -->
              </div>
              <div class="card-footer justify-content-center">
                  <a href="{{ route('user.index') }}" class="btn btn-danger"> Salir</a>
                  <button type="submit" class="btn btn-primary ">{{ __('Actualiar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
