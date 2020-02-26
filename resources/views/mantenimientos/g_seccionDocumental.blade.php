@extends('layouts.app')
@section('titlePrimary')
    <h1 class="m-0 text-dark" style="text-align:center;">Mantenimiento de Sección Documental</h1>
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
                                <a class="nav-link active" href="#home" data-toggle="tab">Sección</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updates" data-toggle="tab">Sub-Sección</a>
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
                                <h3 class="card-title">Listado de Secciones</h3>
                                <a href="#" class="btn btn-block btn-primary col-md-2" title="Agregar" data-toggle="modal" data-target="#modal-add-section" style="margin-left:82%;">Agregar</a>
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead style="background-color:#343a40; color:white;">
                                        <tr>
                                            <th style="width: 60px">#</th>
                                            <th style="width: 220px">Código</th>
                                            <th style="width: 60px">Sección</th>
                                            <th style="width: 250px">Siglas</th>
                                            <th style="width: 250px">Sub-Secciones</th>
                                            <th style="width: 250px">Estado</th>
                                            <th style="width: 250px">Observación</th>
                                            <th style="width: 250px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    @foreach($sections as $section)
                                        <tr>
                                            <td>{{$section->id}}</td>
                                            <td>{{$section->code}}</td>
                                            <td>{{$section->name}}</td>
                                            <td>{{$section->acronym}}</td>
                                            @php
                                            $c=0;
                                            @endphp
                                            @foreach($subsections as $subsection)
                                            @if($subsection->section_id==$section->id)
                                            @php
                                            $c=$c+1;
                                            @endphp
                                            @endif
                                            @endforeach
                                            <td>{{$c}}</td>
                                            @if($section->state)
                                            <td>Activo</td>
                                            @endif
                                            @if(!($section->state))
                                            <td>Inactivo</td>
                                            @endif
                                            <td>{{$section->observation}}</td>
                                            <td>
                                                <a href="#" onClick="ModalEditSection({{$section->id}})" title="Editar" style="color:#343a40;">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="#" onClick="ModelEliminarSecciones({{$section->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
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
                                <h3 class="card-title">Listado de Sub-Secciones</h3>
                                <input type="text" style="margin-top:4%;"class="form-control" id="Buscador" placeholder="Buscador">
                                <a href="#" class="btn btn-block btn-primary col-md-2" title="Agregar" data-toggle="modal" data-target="#modal-add-subsection" style="margin-left:84%;">Agregar</a>                                                  
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="tabla">
                                    <thead style="background-color:#343a40; color:white;">
                                    <div class="form-group col-md-4">
                                </div>          
                                        <tr>
                                        <th style="width: 60px">#</th>
                                            <th style="width: 220px">Código</th>
                                            <th style="width: 250px">Sección Padre</th>
                                            <th style="width: 60px">Sub-Sección</th>
                                            <th style="width: 250px">Siglas</th>
                                            <th style="width: 250px">Estado</th>
                                            <th style="width: 250px">Observación</th>
                                            <th style="width: 250px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    @foreach($subsections as $subsection)
                                        <tr>
                                            <td>{{$subsection->id}}</td>
                                            <td>{{$subsection->code}}</td>
                                            @foreach($sections as $section)
                                            @if($section->id==$subsection->section_id)
                                            <td>{{$section->name}}</td>
                                            @endif
                                            @endforeach
                                            <td>{{$subsection->name}}</td>
                                            <td>{{$subsection->acronym}}</td>
                                            @if($subsection->state)
                                            <td>Activo</td>
                                            @endif
                                            @if(!($subsection->state))
                                            <td>Inactivo</td>
                                            @endif
                                            <td>{{$subsection->observation}}</td>
                                            <td>
                                                <a href="#" onClick="ModelEditSubSecciones({{$subsection->id}})" title="Editar" style="color:#343a40;">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="#" onClick="ModelEliminarSubSecciones({{$subsection->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
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

<!-- ------------------------------------------ Agregar seccion--------------------------------------------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="modal-add-section" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Sección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form class="form" method="POST" action="{{url('mantenimientosSDSs')}}">
                        {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Código</label>
                                    <input name="code_secction" type="text" class="form-control" id="code_secction" placeholder="Código de sección">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sección</label>
                                    <input name="name_secction" type="text" class="form-control" id="name_secction" placeholder="Nombre de Sección">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Siglas</label>
                                    <input name="acronym_section" type="text" class="form-control" id="acronym_section" placeholder="Siglas">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="state_section" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Observación</label>
                                    <input name="observation_secction" type="text" class="form-control" id="observation_secction" placeholder="Observación">
                                </div>
                            </div>
                            <!-- /.card-body -->                    
                        <!-- EndForm -->
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar registro</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
<!-- /.modal --> 

 <!-- ------------------------------------------ Eliminar Seccion--------------------------------------------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="modal-delete-section" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:red; color:white;">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Sección</h5>
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
                                    <input id="id_section_id" type="text">
                                    <p>¿Estás seguro de eliminar?</p>                                    
                                    <p>Recuerde que si la sección tiene sub-secciones estos también serán eliminados en su totalidad</p>  
                                </div>
                            </div>
                            <!-- /.card-body -->           
                        <!-- EndForm -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" type="button" onClick="EliminarSection()"style="background:#dd4b39; border:#dd4b39;" class="btn btn-primary">Eliminar sección</button>
                </div>
            </div>
                            
        </div>
    </div>
<!-- /.modal -->  

<!-- ------------------------------------------ Actualizar seccion--------------------------------------------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="modal-edit-section" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Actualizar Sección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                    <div class="card card-primary">
                        <!-- form start -->    
                        {!! Form::open(['url' => ['mantenimientosSDSs','valor','update'], 'method'=>'POST','id' =>'form-update-section']) !!}
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Código</label>
                                    <input name="id_secctionE" type="text" id="id_secctionE" >
                                    <input name="code_secctionE" type="text" class="form-control" id="code_secctionE" placeholder="Código de sección">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sección</label>
                                    <input name="name_secctionE" type="text" class="form-control" id="name_secctionE" placeholder="Nombre de Sección">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Siglas</label>
                                    <input name="acronym_sectionE" type="text" class="form-control" id="acronym_sectionE" placeholder="Siglas">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="state_sectionE" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Observación</label>
                                    <input name="observation_secctionE" type="text" class="form-control" id="observation_secctionE" placeholder="Observación">
                                </div>
                            </div>
                            <!-- /.card-body -->                    
                        <!-- EndForm -->
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" onClick="ActualizaDataCT()"  class="btn btn-primary">Guardar cambios</button>
                        {!! Form::close() !!} 
                    </div>
                </form>
                </div>
            </div>
        </div>
<!-- /.modal --> 


<!-- ------------------------------------------ Agregar Sub Sección--------------------------------------------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="modal-add-subsection" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Sub Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                <div class="card card-primary">
                    <!-- form start -->
                    <form class="form" method="POST" action="{{url('mantenimientosSDSb')}}">
                    {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Código</label>
                                <input name="code_subsecction" type="text" class="form-control" id="code_subsecction" placeholder="Código de sección">
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control align-self-end" name="sectionid_subsection">
                                    @foreach($sections as $section )
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Sección</label>
                                <input name="name_subsecction" type="text" class="form-control" id="name_subsecction" placeholder="Nombre de la sub sección">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Siglas</label>
                                <input name="acronym_subsection" type="text" class="form-control" id="acronym_subsection" placeholder="Siglas">
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="state_subsection" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Observación</label>
                                <input name="observation_subsecction" type="text" class="form-control" id="observation_subsecction" placeholder="Observación">
                            </div>
                        </div>
                        <!-- /.card-body -->                    
                    <!-- EndForm -->
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar registro</button>
                </div>
            </form>
            </div>
        </div>
    </div>
<!-- /.modal --> 

<!-- ------------------------------------------ Eliminar SubSeccion--------------------------------------------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="modal-delete-subsection" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:red; color:white;">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Sub-sección</h5>
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
                                    <input id="id_subsection_id" type="text">
                                    <p>¿Estás seguro de eliminar?</p>                                    
                                </div>
                            </div>
                            <!-- /.card-body -->           
                        <!-- EndForm -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" type="button" onClick="EliminarSubSection()"style="background:#dd4b39; border:#dd4b39;" class="btn btn-primary">Eliminar sección</button>
                </div>
            </div>
                            
        </div>
    </div>
<!-- /.modal --> 

<!-- ------------------------------------------ Actualizar Subseccion--------------------------------------------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="modal-update-subsection" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                <div class="card card-primary">
                    <!-- form start -->    
                    {!! Form::open(['url' => ['mantenimientosSDSb','valor','update'], 'method'=>'POST','id' =>'form-update-subsection']) !!}
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Código</label>
                                <input name="id_subsecctionE" type="text" class="form-control" id="id_subsecctionE" placeholder="Código de sección">
                                <input name="code_subsecctionE" type="text" class="form-control" id="code_subsecctionE" placeholder="Código de sección">
                            </div>
                            <div class="form-group">
                                <label>Sección</label>
                                <select class="form-control align-self-end" id="sectionid_subsection" name="sectionid_subsection">
                                    @foreach($sections as $section )
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Sección</label>
                                <input name="name_subsecctionE" type="text" class="form-control" id="name_subsecctionE" placeholder="Nombre de la sub sección">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Siglas</label>
                                <input name="acronym_subsectionE" type="text" class="form-control" id="acronym_subsectionE" placeholder="Siglas">
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="state_subsectionE" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Observación</label>
                                <input name="observation_subsecctionE" type="text" class="form-control" id="observation_subsecctionE" placeholder="Observación">
                            </div>
                        </div>
                        <!-- /.card-body -->                    
                    <!-- EndForm -->
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" onClick="ActualizaDataSubsection()"  class="btn btn-primary">Guardar cambios</button>
                    {!! Form::close() !!} 
                </div>
            </form>
            </div>
        </div>
    </div>
<!-- /.modal --> 


    {!! Form::open(['url' => ['mantenimientosSDSs','valor','delete'], 'method'=>'POST','id' =>'form-delete-section']) !!}        
        {{ csrf_field() }}
    {!! Form::close() !!} 

    {!! Form::open(['url' => ['mantenimientosSDSb','valor','delete'], 'method'=>'POST','id' =>'form-delete-subsection']) !!}        
    {{ csrf_field() }}
    {!! Form::close() !!} 

    {!! Form::open(['url' => ['mantenimientosSDSs','valor','edit'], 'method'=>'POST','id' =>'form-edit-section']) !!}        
        {{ csrf_field() }}
    {!! Form::close() !!} 
    
    {!! Form::open(['url' => ['mantenimientosSDSb','valor','edit'], 'method'=>'POST','id' =>'form-edit-subsection']) !!}        
        {{ csrf_field() }}
    {!! Form::close() !!} 

@endsection




