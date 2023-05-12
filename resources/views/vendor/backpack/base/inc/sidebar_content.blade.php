{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- Users, Roles, Permissions -->
@hasrole('Amministratore')
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
@endhasrole
@can('Visualizza tornei')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('torneo') }}"><i class="nav-icon la la-trophy"></i> Tornei</a></li>
@endcan
@can('Visualizza partite')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('partita') }}"><i class="nav-icon la la-futbol"></i> Partite</a></li>
@endcan
@can('Gestisci risultati')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('risultati') }}"><i class="nav-icon la la-table"></i> Risultati</a></li>    
@endcan
@can('Visualizza giocatori')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('giocatori') }}"><i class="nav-icon la la-user"></i> Giocatori</a></li>
@endcan
@can('Impostazioni server')
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-server"></i> Server Settings</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('porte') }}"><i class="nav-icon la la-tools"></i> <span>Porte</span></a></li>
    </ul>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tvmanager') }}"><i class="nav-icon la la-tv"></i> <span>Gestione TV</span></a></li>
    </ul>
    <ul  class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
    </ul>
</li>
@endcan
