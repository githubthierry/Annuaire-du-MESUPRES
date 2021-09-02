<div class="sidebar">

    <div class="sidebar-brand">
        <h4>
            <span>MESupReS</span>
        </h4>
        <div class="t"></div>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="#">
                    <span class="fa fa-home"></span>
                    <span>Accueil</span>
                </a>
            </li>
            <li>
                <a class="{{ set_active_menu('directions.index') }}" href="{{ route('directions.index') }}">
                    <span class="fa fa-folder"></span>
                    <span>Directions</span>
                </a>
            </li>
            <li>
                <a class="{{ set_active_menu('services.index') }}"  href="{{ route('services.index') }}">
                    <span class="fa fa-folder-open"></span>
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a class="{{ set_active_menu('divisions.index') }}" href="{{ route('divisions.index') }}">
                    <span class="fa fa-folder-open"></span>
                    <span>Divisions</span>
                </a>
            </li>
            <li>
                <a class="{{ set_active_menu('postes.index') }}" href="{{ route('postes.index') }}">
                    <span class="fa fa-folder-open"></span>
                    <span>Postes</span>
                </a>
            </li>
            <li>
                <a class="{{ set_active_menu('personnels.index') }}" href="{{ route('personnels.index') }}">
                    <span class="fa fa-users"></span>
                    <span>Personnels</span>
                </a>
            </li>
            <li>
                <a class="{{ set_active_menu('utilisateurs.index') }}" href="{{ route('utilisateurs.index') }}">
                    <span class="fa fa-users"></span>
                    <span>Utilisateurs</span>
                </a>
            </li>
            <li>
                <a class="{{ set_active_menu('profiles') }}"  href="{{ route('profiles',['user' => 1]) }}">
                    <span class="fa fa-user"></span>
                    <span>Mon Compte</span>
                </a>
            </li>
            <li>
                <a href="{{ route('deconnexion') }}" onclick="return confirm('voulez-vous vraiment déconnecter ?')">
                    <span class="fa fa-power-off"></span>
                    <span>Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>
</div>
