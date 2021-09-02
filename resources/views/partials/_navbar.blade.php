<header>
    <h5>
        <label for="nav-toggle">
            <span class="fa fa-bars"></span>
        </label>
       <span id="date_heure" style="color:#2c8682;">
        </span>
    </h4>

    <div class="user-wrapper">
        <img src="../../../../../../../images/monde.jpg" alt="..." style="width:40px;height:40px;">
        <div style="margin-left:.5rem;">
            <h5>{{ $users->name ?? 'RAMANANA Thu Ming Thierry' }}
                <br>
                <small>{{ $users->roles->adminRoles ?? 'Super Admin'}}</small>
            </h5>
        </div>
    </div>
</header>
