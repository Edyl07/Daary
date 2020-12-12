<ul class="collection with-header">

    <li class="collection-header center">
        <div class="m-t-10">
            <img src="{{Storage::url('users/'.auth()->user()->image)}}" alt="{{ auth()->user()->name }}"
                class="circle responsive-img">
        </div>
        <h5 class="truncate">
            {{ auth()->user()->name }}
        </h5>
        <h6 class="m-t-0"><small>{{ auth()->user()->email }}</small></h6>
    </li>

    <a href="{{ route('agent.dashboard') }}">
        <li class="collection-item {{ Request::is('agent/dashboard') ? 'active' : '' }}">
            <i class="material-icons left">dashboard</i>
            <span>Espace Agent<span>
        </li>
    </a>

    <a href="{{ route('agent.profile') }}">
        <li class="collection-item {{ Request::is('agent/profile') ? 'active' : '' }}">
            <i class="material-icons left">person</i>
            <span>Profile</span>
        </li>
    </a>
    <a href="{{ route('agent.message') }}">
        <li class="collection-item {{ Request::is('agent/message*') ? 'active' : '' }}">
            <i class="material-icons left">mail</i>
            <span>Messages</span>
        </li>
    </a>

    <a href="{{ route('agent.properties.index') }}">
        <li class="collection-item {{ Request::is('agent/properties') ? 'active' : '' }}">
            <i class="material-icons left">view_list</i>
            <span>Liste des Propriétés<span>
        </li>
    </a>
    <a href="{{ route('agent.properties.create') }}">
        <li class="collection-item {{ Request::is('agent/properties/create') ? 'active' : '' }}">
            <i class="material-icons left">create</i>
            <span>Créer Une Propriété<span>
        </li>
    </a>
    <a href="{{ route('agent.edit.position') }}">
        <li class="collection-item {{ Request::is('agent/edit/position') ? 'active' : '' }}">
            <i class="material-icons left">add_location</i>
            <span>Modifier l'emplacement des propriétes</span>
        </li>
    </a>
    <a href="{{ route('agent.changepassword') }}">
        <li class="collection-item {{ Request::is('agent/changepassword') ? 'active' : '' }}">
            <i class="material-icons left">lock</i>
            <span>Changer de Mot de Passe</span>
        </li>
    </a>
</ul>