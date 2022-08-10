@extends('layouts.main', ['activePage' => 'profile', 'titlePage' => __('Crear Usuario')])

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
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
              </div>
              <!-- Fin pie del formulario-->
            </div>
          </form>
        </div>
      </div>



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="#" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
