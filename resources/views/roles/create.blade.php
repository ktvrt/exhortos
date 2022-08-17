@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => __('Crear Rol')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <form method="post" action="{{ route('role.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card card-hidden mb-3">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title"><strong>{{ __('Nuevo Rol') }}</strong></h4>
                <p class="card-category">{{ __('Ingresar datos') }}</p>
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
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre del rol...') }}"
                    value="{{ old('name') }}" required autofocus>
                  </div>
                  @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('name') }}</strong>
                    </div>
                  @endif
                </div>
                <!-- Fin Name -->

              </div>
              <div class="card-footer justify-content-center">
                  <a href="{{ route('role.index') }}" class="btn btn-danger"> Salir</a>
                  <button type="submit" class="btn btn-primary ">{{ __('Guardar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
