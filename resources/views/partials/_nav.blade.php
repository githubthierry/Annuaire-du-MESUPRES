<nav class="navbar-dark navbar navbar-expand-lg" style="background-color:#2c8682;">
    <div class="container">
        <a href="#" class="navbar-brand">MESupReS</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#open">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="open">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <span class="nav-link">
                            logged in as: {{ auth()->user()->email }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="/deconnection" method="POST">
                            @csrf
                            <button type="submit" class="nav-item btn btn-link">
                                Déconnection
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link">login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">S'inscrire</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
