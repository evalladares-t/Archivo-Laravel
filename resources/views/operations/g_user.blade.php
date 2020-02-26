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
                <h3 class="card-title">Listado de Usuarios</h3>
                <a href="#" class="btn btn-block btn-primary col-md-2" data-toggle="modal" data-target="#modal-add-user" style="margin-left:82%;">Agregar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered">
                    <thead style="background-color:#343a40; color:white;">                  
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Perfil</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th style="width: 200px">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($user as $key =>$ux)    
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$ux->name}}</td>
                        <td>{{$ux->dni}}</td>
                        <td>{{$profiles->where('id',$ux->profile_id)->first()->name}}</td>
                        <td>{{$ux->name_user}}</td>
                        @if($ux->estado)
                        <td>Activo</td>
                        @endif
                        @if(!($ux->estado))
                        <td>Inactivo</td>
                        @endif
                        <td>
                            <a href="#" onClick="ModelInfoU({{$ux->id}})" title="Información" style="margin-left: 15%; color:#343a40;">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            <a href="#" onClick="ModalEditU({{$ux->id}})" title="Editar" style="margin-left:20%; color:#343a40;">
                                <i class="fa fa-edit "></i>
                            </a>
                            <a href="#" onClick="ModelEliminarU({{$ux->id}})" title="Eliminar" style="margin-left:20%; color:#343a40;">
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

    <!-- ------------------------------------------ Agregar --------------------------------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form class="form" method="POST" enctype="multipart/form-data" action="{{url('operationsu')}}">
                        {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input name="name_user" type="text" class="form-control" id="name_user" placeholder="Nombre Completo">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">DNI</label>
                                    <input name="dni_user" type="number" class="form-control" id="dni_user" placeholder="Númeo de DNI">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre de Usuario</label>
                                    <input name="user" type="text" class="form-control" id="user" placeholder="Nombre del Usuario">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contraseña</label>
                                    <input name="password" type="text" class="form-control" id="password" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Imagen de Usuario</label>
                                    <input type="file" name ="photo">
                                </div>
                                <div class="form-group">
                                    <label>Perfil</label>
                                    <select name="profile_user" class="form-control">
                                    @foreach($profiles as $profile)
                                    <option value="{{$profile->id}}">{{$profile->name}}</option>
                                    @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="activar_user" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div> 
                            </div>
                            <!-- /.card-body -->                    
                        <!-- EndForm -->
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <!-- /.modal --> 

    <!-- ------------------------------------------ Eliminar --------------------------------------------------------------- -->
        <!-- Modal -->
        <div class="modal fade" id="modal-delete-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:red; color:white;">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <div class="card card-primary">
                            <!-- form start -->
                            
                                <div class="card-body">
                                    <div class="form-group">
                                        <input id="id_usuarioE" type="text">
                                        <p>¿Estás seguro de eliminar?</p>                                    
                                    </div>
                                </div>
                                <!-- /.card-body -->           
                            <!-- EndForm -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" type="button" onClick="EliminarUsuario()"style="background:#dd4b39; border:#dd4b39;" class="btn btn-primary">Eliminar perfil</button>
                    </div>
                </div>
                               
            </div>
        </div>
    <!-- /.modal --> 

        <!-- ------------------------------------------ Info --------------------------------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="modal-info-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:green; color:white;">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Información de Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <div class="card card-primary">
                            <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="info-profile">
                                            <spam id="contenido_info"></spam>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">                        
                        <button type="submit"  data-dismiss="modal" style="background:green; border:#dd4b39;" class="btn btn-primary">De acuerdo</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.modal --> 


        <!-- ------------------------------------------ Editar --------------------------------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Actualizar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                    <div class="card card-primary">
                        <!-- form start -->
                        {!! Form::open(['url' => ['operationsu','valor','update'],'enctype'=>'multipart/form-data', 'method'=>'POST','id' =>'form-update-user']) !!}
                        {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <input name="id_userE" type="text" class="form-control" id="id_userE">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input name="name_userE" type="text" class="form-control" id="name_userE" placeholder="Nombre Completo">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">DNI</label>
                                    <input name="dni_userE" type="number" class="form-control" id="dni_userE" placeholder="Númeo de DNI">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre de Usuario</label>
                                    <input name="userE" type="text" class="form-control" id="userE" placeholder="Nombre del Usuario">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contraseña</label>
                                    <input name="passwordE" type="text" class="form-control" id="passwordE" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Imagen de Usuario</label>
                                    <input type="file" name ="photoE" id="photoE">
                                </div>
                                <div class="form-group">
                                    <label>Perfil</label>
                                    <select name="profile_userE" id="profile_userE" class="form-control">
                                    @foreach($profiles as $profile)
                                    <option value="{{$profile->id}}">{{$profile->name}}</option>
                                    @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="activar_userE" id="activar_userE" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div> 
                            </div>
                            <!-- /.card-body --> 
                            {!! Form::close() !!}                   
                        <!-- EndForm -->
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" onClick="ActualizaDataU()" class="btn btn-primary">Guardar cambios</button>
                    </div>                
                </div>
            </div>
        </div>
    <!-- /.modal --> 

    {!! Form::open(['url' => ['operationsu','valor','info'], 'method'=>'POST','id' =>'form-info-user']) !!}
        {{ csrf_field() }}
    {!! Form::close() !!}

    {!! Form::open(['url' => ['operationsu','valor','delete'], 'method'=>'POST','id' =>'form-delete-user']) !!}        
        {{ csrf_field() }}
    {!! Form::close() !!} 

    {!! Form::open(['url' => ['operationsu','valor','edit'], 'method'=>'POST','id' =>'form-edit-user']) !!}
        {{ csrf_field() }}
    {!! Form::close() !!}

@endsection




