@extends('layouts.app')
@section('titlePrimary')
    <h1 class="m-0 text-dark" style="text-align:center;">Gestión de Perfiles</h1>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Listado de Usuarios</h3>
                <a href="#" class="btn btn-block btn-primary col-md-2" data-toggle="modal" data-target="#modal-add-perfil" title="Agregar" style="margin-left:82%;">Agregar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered">
                    <thead style="background-color:#343a40; color:white;">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Privilegios</th>
                        <th style="width: 200px">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($profiles as $key =>$profile)   
                @php
                    $p=0;
                @endphp
                    @foreach($access as $a)
                        @if($a->activar and $a->profile_id==$profile->id)
                            @php
                            $p=$p+1;
                            @endphp
                        @endif
                    @endforeach   
                    <tr>
                    @php
                        $c=($p*100)/23
                    @endphp 
                        <td>{{++$key}}</td>
                        <td>{{$profile->name}}</td>
                        <td><span class="badge @if(round($c,0)<=40) bg-yellow @endif @if(round($c,0)<90 and round($c,0)>40) bg-blue @endif @if(round($c,0)>=90) bg-success @endif">{{round($c,0)}}%</span>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="@if(round($c,0)<=40) background-color:#f39c12; @endif @if(round($c,0)<90 and round($c,0)>40) background-color:#3c8dbc; @endif @if(round($c,0)>=90) background-color:#00a65a; @endif width: {{round($c,0)}}%"></div>
                        </div>
                        </td>
                        <td>
                            <a href="#" onClick="ModalInfoP({{$profile->id}})" title="Información" style="margin-left: 15%; color:#343a40;">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            <a href="#" onClick="ModalEditP({{$profile->id}})" title="Editar" style="margin-left:20%; color:#343a40;">
                                <i class="fa fa-edit "></i>
                            </a>
                            <a href="#" onClick="ModelEliminarP({{$profile->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
                                <i class="fa fa-minus-circle"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
                </div>          
            </div>
        </div>
    </div>

    <!-- ------------------------------------------ Agregar --------------------------------------------------------------- -->

    <!-- Modal -->
        <div class="modal fade" id="modal-add-perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form class="form" method="POST" action="{{url('operationsp')}}">
                        {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input name="name_perfil" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre del Perfil">
                                </div>
                                <hr>
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Operaciones del Sistema
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="gPerfilCb">
                                                <label class="form-check-label" >Gestionar Perfiles</label>
                                            </div>
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gUsuarioCb">
                                                    <label class="form-check-label" >Gestionar Usuarios</label>
                                            </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 2 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Fondo Documental
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema2">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gArchivoCb">
                                                    <label class="form-check-label" >Archivo</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"name="gAudioCb">
                                                        <label class="form-check-label" >Audio</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gTomoCb">
                                                        <label class="form-check-label" >Tomo</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gPlanoCb">
                                                        <label class="form-check-label" >Plano</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Servicios
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema3">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gMiACb">
                                                    <label class="form-check-label" >Mantenimiento de Instrucciones Archivísticas</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMsACb">
                                                        <label class="form-check-label" >Mantenimiento de Servicios Archivísticos</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gGsCb">
                                                        <label class="form-check-label" >Generador de Servicios</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Mantenimientos
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema4">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gMuTCb">
                                                    <label class="form-check-label">Mantenimiento de Ubicación Topográfico</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMsDCb">
                                                        <label class="form-check-label" >Mantenimiento de Secciones Documentales</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMsBcB">
                                                        <label class="form-check-label" >Mantenimiento de Series Documentales</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gMaACb">
                                                    <label class="form-check-label" >MMantenimiento de Administración de Archivos</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMdACb">
                                                        <label class="form-check-label" >Mantenimiento de Documentos de Archivo</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema5" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Reportes
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema5">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRaCb">
                                                    <label class="form-check-label" >Reporte de Archivos</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRsCb">
                                                    <label class="form-check-label" >Reporte de Servicios</label>
                                                </div>  
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRrACb">
                                                    <label class="form-check-label" >Reporte Registro de Archivos</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRrPCb">
                                                    <label class="form-check-label" >Reporte Registro de Prestamos</label>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->                                                                                                                                                                                                                                               
                            </div>
                            <!-- /.card-body -->                    
                        <!-- EndForm -->
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Perfil</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <!-- /.modal --> 

    <!-- ------------------------------------------ Eliminar --------------------------------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="modal-delete-perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:red; color:white;">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Perfil</h5>
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
                                        <input id="id_perfilE" type="text">
                                        <p>¿Estás seguro de eliminar?</p>                                    
                                    </div>
                                </div>
                                <!-- /.card-body -->           
                            <!-- EndForm -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" type="button" onClick="EliminarPerfil()"style="background:#dd4b39; border:#dd4b39;" class="btn btn-primary">Eliminar perfil</button>
                    </div>
                </div>
                               
            </div>
        </div>
    <!-- /.modal --> 


    <!-- ------------------------------------------ Editar --------------------------------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="modal-edit-perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Editar Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                {!! Form::open(['url' => ['operationsp','valor','update'], 'method'=>'POST','id' =>'form-update-profile']) !!}
                        {{ csrf_field() }}
                    <div class="card card-primary">
                        <!-- form start -->                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input id="id_perfil" type="text">
                                    <input name="name_perfil" type="text" class="form-control" id="inputEditProfile" placeholder="Nombre del Perfil">
                                </div>
                                <hr>
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Operaciones del Sistema
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gPerfilCbEx" name="gPerfilCbE">
                                                <label class="form-check-label" >Gestionar Perfiles</label>
                                            </div>
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gUsuarioCbE" id="gUsuarioCbEx">
                                                    <label class="form-check-label" >Gestionar Usuarios</label>
                                            </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 2 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Fondo Documental
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema2">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gArchivoCbE" id="gArchivoCbEx">
                                                    <label class="form-check-label" >Archivo</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"name="gAudioCbE" id="gAudioCbEx">
                                                        <label class="form-check-label" >Audio</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gTomoCbE" id="gTomoCbEx">
                                                        <label class="form-check-label" >Tomo</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gPlanoCbE" id="gPlanoCbEx">
                                                        <label class="form-check-label" >Plano</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Servicios
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema3">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gMiACbE" id="gMiACbEx">
                                                    <label class="form-check-label" >Mantenimiento de Instrucciones Archivísticas</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMsACbE" id="gMsACbEx">
                                                        <label class="form-check-label" >Mantenimiento de Servicios Archivísticos</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gGsCbE" id="gGsCbEx">
                                                        <label class="form-check-label" >Generador de Servicios</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Mantenimientos
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema4">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gMuTCbE" id="gMuTCbEx">
                                                    <label class="form-check-label">Mantenimiento de Ubicación Topográfico</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMsDCbE" id="gMsDCbEx">
                                                        <label class="form-check-label" >Mantenimiento de Secciones Documentales</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMsBcBE" id="gMsBcBEx">
                                                        <label class="form-check-label" >Mantenimiento de Series Documentales</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gMaACbE" id="gMaACbEx">
                                                    <label class="form-check-label" >Mantenimiento de Administración de Archivos</label>
                                                </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gMdACbE" id="gMdACbEx">
                                                        <label class="form-check-label" >Mantenimiento de Documentos de Archivo</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->
                                <!-- Menu 1 -->
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#OperacionesSistema5" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Reportes
                                    </a>                        
                                </p>
                                <div class="collapse" id="OperacionesSistema5">
                                    <div class="card card-body">
                                        <!-- Check -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRaCbE" id="gRaCbEx">
                                                    <label class="form-check-label" >Reporte de Archivos</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRsCbE" id="gRsCbEx">
                                                    <label class="form-check-label" >Reporte de Servicios</label>
                                                </div>  
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRrACbE" id="gRrACbEx">
                                                    <label class="form-check-label" >Reporte Registro de Archivos</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="gRrPCbE" id="gRrPCbEx">
                                                    <label class="form-check-label" >Reporte Registro de Prestamos</label>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>              
                                        <!-- endCheck -->                                                                                                                                                          
                                    </div>
                                </div>
                                <!-- endMenu -->                                                                                                                                                                                                                                               
                            </div>
                            <!-- /.card-body -->                    
                        {!! Form::close() !!}
                        <!-- EndForm -->
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" onClick="ActualizaDataP()" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.modal --> 

    <!-- ------------------------------------------ Info --------------------------------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="modal-info-perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:green; color:white;">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Información Perfil</h5>
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

    {!! Form::open(['url' => ['operationsp','valor','info'], 'method'=>'POST','id' =>'form-info-profile']) !!}
        {{ csrf_field() }}
    {!! Form::close() !!}

    {!! Form::open(['url' => ['operationsp','valor','edit'], 'method'=>'POST','id' =>'form-edit-profile']) !!}
        {{ csrf_field() }}
    {!! Form::close() !!}

    {!! Form::open(['url' => ['operationsp','valor','delete'], 'method'=>'POST','id' =>'form-delete-profile']) !!}        
        {{ csrf_field() }}
    {!! Form::close() !!} 

</div>

@endsection
