@extends('layouts.main', ['activePage' => 'permisos', 'titlePage' => __('Detalles de Permiso')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Permiso') }}</h4>
                <p class="card-category">Detalles del Permiso: {{ $permiso->name }}</p>
              </div>
              <div class="card-body ">
                  @if (session('success'))
                      <div class="alert alert-success" role="success">
                          {{ session('success') }}
                      </div>
                  @endif

                  {{-- CARD USER --}}
                  <div class="card card-user">
                      <div class="card-body">
                          <p class="card-text">
                              <div class="author">
                                  <a href="#">
                                      <img class="avatar" src="{{asset('img/faces/marc.jpg')}}" alt="">
                                      <h5 class="title">{{ $permiso->name}}</h5>
                                  </a>
                                  <p class="description">
                                      {{ $permiso->name }} <br>
                                      {{ $permiso->created_at }} <br>
                                      {{ $permiso->guard_name }} <br>
                                      {{ $permiso->created_at }} <br>

                                  </p>
                              </div>
                          </p>
                          <div class="card-description">
                              Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                          </div>
                      </div>
                      <div class="card-footer">
                          <div class="button-container">
                              <a href="{{ route('permission.index') }}" class="btn btn-primary"> Salir</a>
                              <button class="btn btn-warning">
                                  Editar
                              </button>
                          </div>
                      </div>
                  </div>
                  {{-- FIN CARD USER --}}

              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection
