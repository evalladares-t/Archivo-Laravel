@extends('layouts.app')
@section('titlePrimary')
    <h1 class="m-0 text-dark" style="text-align:center;">Mantenimiento de Ubicación Topográfica</h1>
@endsection
@section('content')
<div class="container">
    <div class="row" style="margin-top:6%;">
        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-danger">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#home" data-toggle="tab">Estante</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updates" data-toggle="tab">Tipo de Conservación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#history" data-toggle="tab">Unidad de Conservación</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content text-center">
                    <!--Primer TAB -->
                    <div class="tab-pane active" id="home">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listado de Estantes</h3>
                                <a href="#" class="btn btn-block btn-primary col-md-2" title="Agregar" data-toggle="modal" data-target="#modal-add-shelf" style="margin-left:82%;">Agregar</a>
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead style="background-color:#343a40; color:white;">
                                        <tr>
                                            <th style="width: 60px">#</th>
                                            <th style="width: 220px">Número</th>
                                            <th style="width: 60px">Inventario</th>
                                            <th style="width: 250px">Referencia de ubicación del estante</th>
                                            <th style="width: 250px">Estado</th>
                                            <th style="width: 250px">Observación</th>
                                            <th style="width: 250px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    @foreach($Shelves as $shelf)
                                        <tr>
                                            <td>{{$shelf->id}}</td>
                                            <td>{{$shelf->number}}</td>
                                            <td>{{$shelf->inventory}}</td>
                                            <td>{{$shelf->reference}}</td>
                                            @if($shelf->state)
                                            <td>Activo</td>
                                            @endif
                                            @if(!($shelf->state))
                                            <td>Inactivo</td>
                                            @endif
                                            <td>{{$shelf->observation}}</td>
                                            <td>
                                                <a href="#" onClick="ModalEditShelf({{$shelf->id}})" title="Editar" style="color:#343a40;">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="#" onClick="ModelEliminarShelf({{$shelf->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
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
                    <!--Segundo TAB -->
                    <div class="tab-pane" id="updates">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tipo de Conservación</h3>
                                <a href="#" class="btn btn-block btn-primary col-md-2" title="Agregar" data-toggle="modal" data-target="#modal-add-cType" style="margin-left:82%;">Agregar</a>
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead style="background-color:#343a40; color:white;">
                                        <tr>
                                            <th style="width: 60px">#</th>
                                            <th style="width: 220px">Tipo</th>                                          
                                            <th style="width: 250px">Estado</th>
                                            <th style="width: 250px">Observación</th>
                                            <th style="width: 250px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    @foreach($c_type as $con_type)
                                        <tr>
                                            <td>{{$con_type->id}}</td>
                                            <td>{{$con_type->name}}</td>
                                            @if($con_type->state)
                                            <td>Activo</td>
                                            @endif
                                            @if(!($con_type->state))
                                            <td>Inactivo</td>
                                            @endif
                                            <td>{{$con_type->observation}}</td>
                                            <td>
                                                <a href="#" onClick="ModalEditCT({{$con_type->id}})" title="Editar" style="color:#343a40;">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="#" onClick="ModelEliminarCT({{$con_type->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
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
                    <div class="tab-pane" id="history">
                    <div class="card">
                        <div class="card-header">
                                <h3 class="card-title">Tipo de Conservación</h3>
                                <a href="#" class="btn btn-block btn-primary col-md-2" title="Agregar" data-toggle="modal" data-target="#modal-add-cType" style="margin-left:82%;">Agregar</a>
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead style="background-color:#343a40; color:white;">
                                        <tr>
                                            <th style="width: 60px">#</th>
                                            <th style="width: 220px">Tipo</th>                                          
                                            <th style="width: 250px">Estado</th>
                                            <th style="width: 250px">Observación</th>
                                            <th style="width: 250px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    @foreach($c_type as $con_type)
                                        <tr>
                                            <td>{{$con_type->id}}</td>
                                            <td>{{$con_type->name}}</td>
                                            @if($con_type->state)
                                            <td>Activo</td>
                                            @endif
                                            @if(!($con_type->state))
                                            <td>Inactivo</td>
                                            @endif
                                            <td>{{$con_type->observation}}</td>
                                            <td>
                                                <a href="#" onClick="ModalEditCT({{$con_type->id}})" title="Editar" style="color:#343a40;">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="#" onClick="ModelEliminarCT({{$con_type->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
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
            </div>
        </div>
    </div>
</div>

    <!-- ------------------------------------------ Agregar shelf--------------------------------------------------------------- -->

        <!-- Modal -->
        <div class="modal fade" id="modal-add-shelf" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Estante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form class="form" method="POST" action="{{url('mantenimientosUTnew')}}">
                            {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Número</label>
                                        <input name="name_number" type="text" class="form-control" id="name_number" placeholder="Número de estante">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Inventario</label>
                                        <input name="inventary" type="text" class="form-control" id="inventary" placeholder="Inventario">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Referencia</label>
                                        <input name="reference" type="text" class="form-control" id="reference" placeholder="Referencia">
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="state_shelf" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Observación</label>
                                        <input name="observation" type="text" class="form-control" id="observation" placeholder="Observación">
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

    <!-- ------------------------------------------ Eliminar Shelf--------------------------------------------------------------- -->
        <!-- Modal -->
        <div class="modal fade" id="modal-delete-shelf" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:red; color:white;">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Estante</h5>
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
                                        <input id="id_shelf_id" type="text">
                                        <p>¿Estás seguro de eliminar?</p>                                    
                                    </div>
                                </div>
                                <!-- /.card-body -->           
                            <!-- EndForm -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" type="button" onClick="EliminarShelf()"style="background:#dd4b39; border:#dd4b39;" class="btn btn-primary">Eliminar perfil</button>
                    </div>
                </div>
                                
            </div>
        </div>
        <!-- /.modal --> 

    <!-- ------------------------------------------ Editar Shelf--------------------------------------------------------------- -->

        <!-- Modal -->
        <div class="modal fade" id="modal-edit-shelf" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Editar información del Estante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <div class="card card-primary">
                            <!-- form start -->
                            {!! Form::open(['url' => ['mantenimientosUT','valor','update'], 'method'=>'POST','id' =>'form-update-shelf']) !!}
                            {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Número</label>
                                        <input name="idShelfE" type="text"  id="idShelfE">
                                        <input name="name_numberE" type="text" class="form-control" id="name_numberE" placeholder="Número de estante">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Inventario</label>
                                        <input name="inventaryE" type="text" class="form-control" id="inventaryE" placeholder="Inventario">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Referencia</label>
                                        <input name="referenceE" type="text" class="form-control" id="referenceE" placeholder="Referencia">
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="state_shelfE" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Observación</label>
                                        <input name="observationE" type="text" class="form-control" id="observationE" placeholder="Observación">
                                    </div>
                                </div>
                                <!-- /.card-body --> 
                                {!! Form::close() !!}                       
                            <!-- EndForm -->
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" onClick="ActualizaDataShelf()" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <!-- /.modal --> 

    <!-- ------------------------------------------ Agregar conservationType--------------------------------------------------------------- -->

        <!-- Modal -->
        <div class="modal fade" id="modal-add-cType" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Estante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form class="form" method="POST" action="{{url('mantenimientosCTnew')}}">
                            {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tipo de conservación</label>
                                        <input name="name_numberCT" type="text" class="form-control" id="name_numberCT" placeholder="Número de estante">
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="state_ctype" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Observación</label>
                                        <input name="observationCT" type="text" class="form-control" id="observationCT" placeholder="Observación">
                                    </div>
                                </div>
                                <!-- /.card-body -->                    
                            <!-- EndForm -->
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <!-- /.modal --> 
    <!-- ------------------------------------------ Eliminar ConservationType--------------------------------------------------------------- -->
        <!-- Modal -->
        <div class="modal fade" id="modal-delete-CT" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:red; color:white;">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Tipo de Conservación</h5>
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
                                        <input id="id_CT_id" type="text">
                                        <p>¿Estás seguro de eliminar?</p>                                    
                                    </div>
                                </div>
                                <!-- /.card-body -->           
                            <!-- EndForm -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" type="button" onClick="EliminarCT()"style="background:#dd4b39; border:#dd4b39;" class="btn btn-primary">Eliminar perfil</button>
                    </div>
                </div>
                                
            </div>
        </div>
        <!-- /.modal --> 
    <!-- ------------------------------------------ Editar ConservationType--------------------------------------------------------------- -->

        <!-- Modal -->
        <div class="modal fade" id="modal-edit-CT" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Editar información del Tipo de Conservación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <div class="card card-primary">
                            <!-- form start -->
                            {!! Form::open(['url' => ['mantenimientosCTnew','valor','update'], 'method'=>'POST','id' =>'form-update-CT']) !!}
                            {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tipo de conservación</label>
                                        <input name="name_numberCTE" type="text"id="name_numberCTE">
                                        <input name="nameCTE" type="text" class="form-control" id="nameCTE" placeholder="Tipo de conservación">
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="state_ctypeE" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Observación</label>
                                        <input name="observationCTE" type="text" class="form-control" id="observationCTE" placeholder="Observación">
                                    </div>
                                </div>
                                <!-- /.card-body -->   
                                {!! Form::close() !!}                       
                            <!-- EndForm -->
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" onClick="ActualizaDataCT()" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <!-- /.modal --> 
   
   
   
   
    {!! Form::open(['url' => ['mantenimientosUT','valor','delete'], 'method'=>'POST','id' =>'form-delete-shelf']) !!}        
    {{ csrf_field() }}
    {!! Form::close() !!} 

    {!! Form::open(['url' => ['mantenimientosCTnew','valor','delete'], 'method'=>'POST','id' =>'form-delete-CT']) !!}        
    {{ csrf_field() }}
    {!! Form::close() !!} 

    {!! Form::open(['url' => ['mantenimientosUT','valor','edit'], 'method'=>'POST','id' =>'form-edit-shelf']) !!}        
        {{ csrf_field() }}
    {!! Form::close() !!} 
    
    {!! Form::open(['url' => ['mantenimientosCTnew','valor','edit'], 'method'=>'POST','id' =>'form-edit-CT']) !!}        
        {{ csrf_field() }}
    {!! Form::close() !!} 


@endsection




