@extends('layouts.main', ['activePage' => 'user-create', 'titlePage' => __('Detalles Usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card ">
              <div class="card-header card-header-primary ">
                <h4 class="card-title">{{ __('Usuario') }}</h4>
                <p class="card-category">Detalles del usuario: {{$usuario->name}}</p>
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
                                      <h5 class="title">{{ $usuario->name}}</h5>
                                  </a>
                                  <p class="description">
                                      {{ $usuario->username }} <br>
                                      {{ $usuario->email }} <br>
                                      {{ $usuario->created_at }} <br>

                                  </p>
                              </div>
                          </p>
                          <div class="card-description">
                            <h5>Roles</h5>
                            @forelse ($usuario->roles as $role)
                                <span class="badge rounded-pill bg-dark text-white"> {{ $role->name }}</span>                                
                            @empty
                                <span class="badge badge-danger bg-danger"> Sin roles asignados </span>                                
                            @endforelse                              
                          </div>
                      </div>
                      <div class="card-footer justify-content-center">
                          <div class="button-container">
                              <a href="{{ route('user.index') }}" class="btn btn-danger"> Salir</a>
                              
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
