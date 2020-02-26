@extends('layouts.app')
@section('titlePrimary')
    <h1 class="m-0 text-dark" style="text-align:center;">Gestión de Usuarios</h1>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Listado de Perfiles</h3>
                <a href="#" class="btn btn-block btn-primary col-md-2" style="margin-left:82%;">Agregar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>                  
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th style="width: 200px">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($user as $ux)    
                    <tr>
                        <td>{{$ux->id}}</td>
                        <td>{{$ux->name}}</td>
                        <td>{{$ux->dni}}</td>
                        <td>{{$ux->name_user}}</td>
                        @if($ux->estado)
                        <td>Activo</td>
                        @endif
                        @if(!($ux->estado))
                        <td>Inactivo</td>
                        @endif
                        <td>
                            <a href="{{url('/operationsp')}}" title="Información" style="margin-left: 15%; color:#343a40;">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            <a href="{{url('/operationsp')}}" title="Editar" style="margin-left:20%; color:#343a40;">
                                <i class="fa fa-edit "></i>
                            </a>
                            <a href="{{url('/operationsp')}}" title="Eliminar" style="margin-left:20%; color:#343a40;">
                                <i class="fa fa-minus-circle"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
                <div style="margin-left:85%; margin-top:5%;">
                    {{$user->links()}}
                </div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection




