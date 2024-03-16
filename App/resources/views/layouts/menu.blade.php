<!-- need to remove -->

<li class="nav-item">
    <a href="{{route('home.index')}}" class="nav-link ">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('modules.index')}}" class="nav-link ">
        <i class="nav-icon fas fa-table"></i>
        <p>Modules</p>
    </a>
</li>

<!-- need to remove -->
<li class="nav-item">
    <a href="{{route('competences.index')}}" class="nav-link ">
        <i class="nav-icon fas fa-tasks"></i>
        <p>Competences</p>
    </a>
</li>

@can('index-StagiairesController')

<li class="nav-item">
    <a href="{{route('stagiaires.index')}}" class="nav-link ">
        <i class="fa-solid fa-users pl-1 pr-1"></i>
        <p>Stagiaires</p>
    </a>
</li>
@endcan



