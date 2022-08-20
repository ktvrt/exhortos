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
                    @if (session('success'))
                        <div class="alert alert-success" role="success">
                            {{ session('success') }}
                        </div>
                    @endif
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
                                    <th> Correo </th>
                                    <th> Username </th>
                                    <th> Roles </th>
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
                                        <td>
                                            @forelse ($usr->roles as $role)
                                                <span class="badge badge-info"> {{ $role->name }}</span>
                                            @empty
                                                <span class="badge badge-danger"> Sin roles asignados</span>                                                
                                            @endforelse
                                        </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('user.destroy', $usr) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a rel="tooltip" class="btn btn-success "
                                                    href="{{ route('user.show', $usr) }}" data-original-title="" title="">
                                                    <i class="material-icons"> person </i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-warning "
                                                    href="{{ route('user.edit', $usr) }}" data-original-title="" title="">
                                                    <i class="material-icons"> edit </i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" rel="tooltip"
                                                    data-toggle="modal" data-target="#modal{{$usr->id}}">
                                                    <i class="material-icons"> close </i>
                                                    <div class="ripple-container"></div>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{$usr->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar usuario #{{ $usr->id }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <div class="alert alert-danger" role="alert">
                                                              ¿Esta seguro que
                                                              <a href="#" class="alert-link">quiere eliminar</a>.
                                                              el suario {{ $usr->name }}?
                                                          </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <!-- FIN Modal -->
                                            </form>

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
