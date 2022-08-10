@extends('layouts.main', ['activePage' => 'user-index', 'titlePage' => __('Lista de Usuarios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Usuarios</h4>
                    <p class="card-category"> Administración de Usuarios</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right">
                          <a href="{{ route('user.create')}}" class="btn btn-sm btn-success">Agregar Usuario</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th> ID </th>
                                    <th> Nombre </th>
                                    <th>
                                        Correo
                                    </th>
                                    <th>
                                        Username
                                    </th>
                                    <th>
                                        Fecha alta
                                    </th>
                                    <th class="text-right"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($usuarios as $usr)
                                    <tr>
                                        <td>{{ $usr->id }}</td>
                                        <td>{{ $usr->name }}</td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ $usr->username }}</td>
                                        <td>{{ $usr->created_at }}</td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title="">
                                                <i class="material-icons"> edit </i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <div class="alert alert-danger">
                                            <span style="font-size:18px;">
                                                <b> </b> Sin usuarios registrados...
                                            </span>
                                        </div>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- pie del formulario-->
                <div class="card-footer ml-auto mr-auto">
                    {{ $usuarios->links() }}
                </div>
                <!-- Fin pie del formulario-->
            </div>{{--Fin del Card--}}
            <div class="alert alert-danger">
                <span style="font-size:18px;">
                    <b> </b> Add, Edit, Delete features are not functional. This is a PRO feature! Click
                    <a target="_blank" style="color:blue" href="https://www.creative-tim.com/live/material-dashboard-pro-laravel">here</a> to see the PRO product.
                </span>
            </div>

          </div>
      </div>
    </div>
  </div>

@endsection
