@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => __('Editar Rol')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-4">

          <form class="form" method="POST" action="{{ route('role.update', $role) }}">
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
                <div class="row">
                  <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre del rol...') }}"
                      value="{{ old('name', $role->name) }}" required autofocus>
                    </div>
                    @if ($errors->has('name'))
                      <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                        <strong>{{ $errors->first('name') }}</strong>
                      </div>
                    @endif
                  </div>
                </div>                
                <!-- Fin Name -->
                <!-- Permisos -->
                <div class="row">
                  <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <div class="tab-content">
                        <div class="tab-pane active">
                          <table class="table">
                            <tbody>
                              @foreach($permissions as $id => $permission)
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="permissions[]" 
                                      value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  {{ $permission }}
                                </td>                                
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- FIN Permisos -->
              </div>
              <div class="card-footer justify-content-center">
                  <a href="{{ route('role.index') }}" class="btn btn-danger"> Salir</a>
                  <button type="submit" class="btn btn-primary ">{{ __('Actualiar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
