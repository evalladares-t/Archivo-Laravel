@php
$p=Route::current()->getName();
@endphp

<li class="nav-item has-treeview menu">
        <a href="{{url('/home')}}" class="nav-link @if($p=='home') active @endif">
            <i class="nav-icon fas fa-th"></i>
            <p>Home</p>
        </a>
    </li>
    @foreach($permis as $access)
    @if(($access->menu_id==1) and $access->activar)
    <li class="nav-item has-treeview menu">
        <a href="#" class="nav-link @if(($p=='operationsp') or($p=='operationsu')) active @endif">
        <i class="nav-icon far fa-edit"></i>
            <p>Opciones del sistema<i class="right fas fa-angle-left"></i></p>
        </a>  
    @endif  
    @endforeach
        <ul class="nav nav-treeview">
    @foreach($permis as $access)
    @if(($access->menu_id==2) and $access->activar)
            <li class="nav-item">
                <a href="{{url('/operationsp')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Gestión de Perfiles</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==3)and ($access->activar))
            <li class="nav-item">
                <a href="{{url('/operationsu')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestión de Usuarios</p>
                </a>
            </li>
    @endif
    @endforeach
        </ul>
    </li>  
    @foreach($permis as $access)
    @if(($access->menu_id==4)and ($access->activar))
    <li class="nav-item has-treeview menu">
        <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>Fondo Documental<i class="right fas fa-angle-left"></i></p>
        </a>
    @endif
    @endforeach
        <ul class="nav nav-treeview">
    @foreach($permis as $access)
    @if(($access->menu_id==5)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Archivo</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==6)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Audio</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==7)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tomo</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==8)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Plano</p>
                </a>
            </li>
    @endif
    @endforeach
        </ul>
    </li>
    @foreach($permis as $access)
    @if(($access->menu_id==9)and ($access->activar))
    <li class="nav-item has-treeview menu">
        <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>Servicios<i class="right fas fa-angle-left"></i></p>
        </a>
    @endif
    @endforeach
        <ul class="nav nav-treeview">
        @foreach($permis as $access)
        @if(($access->menu_id==10)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>M. I. Archivísitcos</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==11)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>M. S. Archivísiticos</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==12)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Generador de Servicios</p>
                </a>
            </li>
    @endif
    @endforeach
        </ul>    
    </li>
    @foreach($permis as $access)
    @if(($access->menu_id==13)and ($access->activar))
    <li class="nav-item has-treeview menu">
        <a href="#" class="nav-link @if($p=='mantenimientos') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Matenimiento<i class="right fas fa-angle-left"></i></p>
        </a>
    @endif
    @endforeach
        <ul class="nav nav-treeview">
    @foreach($permis as $access)
    @if(($access->menu_id==14)and ($access->activar))
            <li class="nav-item">
                <a href="{{url('/mantenimientos')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Ub. Topográfica</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==15)and ($access->activar))
            <li class="nav-item">
                <a href="{{url('/mantenimientosSD')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sec. Documentales</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==16)and ($access->activar))
            <li class="nav-item">
                <a href="{{url('/mantenimientosSerD')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ser. Documentales</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==17)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Doc. Archivos</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==18)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Adm. Archivo</p>
                </a>
            </li>
    @endif
    @endforeach
        </ul>    
    </li>
    @foreach($permis as $access)
    @if(($access->menu_id==19)and ($access->activar))
    <li class="nav-item has-treeview menu">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Reportes<i class="right fas fa-angle-left"></i></p>
        </a>
    @endif
    @endforeach
        <ul class="nav nav-treeview">
    @foreach($permis as $access)
    @if(($access->menu_id==20)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>R. Archivos</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==21)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>R. Servicios</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==22)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>R. R. Archivos</p>
                </a>
            </li>
    @endif
    @endforeach
    @foreach($permis as $access)
    @if(($access->menu_id==23)and ($access->activar))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>R. R. Préstamos</p>
                </a>
            </li>
    @endif
    @endforeach
        </ul>    
    </li>


    <li class="nav-item has-treeview menu">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p>Cerrar sesión</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
        