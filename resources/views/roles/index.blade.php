@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => __('Roles')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Roles</h4>
                    <p class="card-category"> Roles Guardados </p>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 text-right">
                          <a href="{{ route('role.create')}}" class="btn btn-sm btn-success">Agregar Rol</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th> ID </th>
                                    <th> Nombre </th>
                                    <th>
                                        Guard
                                    </th>
                                    <th>
                                        Fecha alta
                                    </th>
                                    <th class="text-right"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('role.destroy', $role) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a rel="tooltip" class="btn btn-success "
                                                    href="{{
                                                        route('role.show', $role)
                                                    }}" data-original-title="" title="">
                                                    <i class="material-icons"> person </i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-warning "
                                                    href="{{ route('role.edit', $role) }}" data-original-title="" title="">
                                                    <i class="material-icons"> edit </i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" rel="tooltip"
                                                    data-toggle="modal" data-target="#modal{{$role->id}}">
                                                    <i class="material-icons"> close </i>
                                                    <div class="ripple-container"></div>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{$role->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Role #{{ $role->id }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <div class="alert alert-danger" role="alert">
                                                              ¿Esta seguro que
                                                              <a href="#" class="alert-link">quiere eliminar</a>.
                                                              el rol {{ $role->name }}?
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
                                                <b> </b> Sin roles registrados...
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
                    {{ $roles->links() }}
                </div>
                <!-- Fin pie del formulario-->
            </div>{{--Fin del Card--}}


          </div>
      </div>
    </div>
  </div>

@endsection
