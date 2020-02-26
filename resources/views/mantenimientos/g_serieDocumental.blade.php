@extends('layouts.app')
@section('titlePrimary')
    <h1 class="m-0 text-dark" style="text-align:center;">Mantenimiento de Series Documentales</h1>
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
                                <h3 class="card-title">Listado de Series Documentales</h3>
                                <a href="#" class="btn btn-block btn-primary col-md-2" title="Agregar" data-toggle="modal" data-target="#modal-add-serie" style="margin-left:82%;">Agregar</a>
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
                                    @foreach($series as $serie)
                                        <tr>
                                            <td>{{$serie->id}}</td>
                                            <td>{{$serie->code}}</td>
                                            <td>{{$serie->name}}</td>
                                            <td>{{$serie->acronym}}</td>
                                            @php
                                            $c=0;
                                            @endphp
                                            @foreach($subseries as $subserie)
                                            @if($subserie->serie_id==$serie->id)
                                            @php
                                            $c=$c+1;
                                            @endphp
                                            @endif
                                            @endforeach
                                            <td>{{$c}}</td>
                                            @if($serie->state)
                                            <td>Activo</td>
                                            @endif
                                            @if(!($serie->state))
                                            <td>Inactivo</td>
                                            @endif
                                            <td>{{$serie->observation}}</td>
                                            <td>
                                                <a href="#" onClick="ModalEditSection({{$serie->id}})" title="Editar" style="color:#343a40;">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="#" onClick="ModelEliminarSecciones({{$serie->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
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
                                <a href="#" class="btn btn-block btn-primary col-md-2" title="Agregar" data-toggle="modal" data-target="#modal-add-subsection" style="margin-left:82%;">Agregar</a>                                                  
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
                                    @foreach($subseries as $subserie)
                                        <tr>
                                            <td>{{$subserie->id}}</td>
                                            <td>{{$subserie->code}}</td>
                                            @foreach($series as $serie)
                                            @if($serie->id==$subserie->section_id)
                                            <td>{{$subserie->name}}</td>
                                            @endif
                                            @endforeach
                                            <td>{{$subserie->name}}</td>
                                            <td>{{$subserie->acronym}}</td>
                                            @if($subserie->state)
                                            <td>Activo</td>
                                            @endif
                                            @if(!($subserie->state))
                                            <td>Inactivo</td>
                                            @endif
                                            <td>{{$subserie->observation}}</td>
                                            <td>
                                                <a href="#" onClick="ModelEditSubSecciones({{$subserie->id}})" title="Editar" style="color:#343a40;">
                                                    <i class="fa fa-edit "></i>
                                                </a>
                                                <a href="#" onClick="ModelEliminarSubSecciones({{$subserie->id}})" title="Eliminar" style="margin-left:16%; color:#343a40;">
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

<!-- ------------------------------------------ Agregar serie--------------------------------------------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="modal-add-serie" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Serie</h5>
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

@endsection




