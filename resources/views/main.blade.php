@extends('welcome')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MESupReS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Mon Profiles</a></li>
                        <li><a class="dropdown-item" href="#">Modifier Profiles</a></li>
                        <li><a class="dropdown-item" href="#">Changer le mot de passe</a></li>
                        <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid shadow p-4 bg-white mb-4">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Identifiant(s)</th>
                <th scope="col">Objet(s)</th>
                <th scope="col">Date début</th>
                <th scope="col">Date fin</th>
                <th scope="col">Nombre de jours</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Description des objets</td>
                    <td>12/09/21</td>
                    <td>30/09/21</td>
                    <td>
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                    </td>
                    <td>
                        <a href="#"  class="btn btn-success" type="button"><span class="fa fa-plus"></span></a>
                        <a href="#"  class="btn btn-info" type="button"><span class="fa fa-pencil"></span></a>
                        <a href="#"  class="btn btn-danger" type="button"><span class="fa fa-trash-o"></span></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Description des objets</td>
                    <td>12/09/21</td>
                    <td>30/09/21</td>
                    <td>
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                    </td>
                    <td>
                        <a href="#"  class="btn btn-success" type="button"><span class="fa fa-plus"></span></a>
                        <a href="#"  class="btn btn-info" type="button"><span class="fa fa-pencil"></span></a>
                        <a href="#"  class="btn btn-danger" type="button"><span class="fa fa-trash-o"></span></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Description des objets</td>
                    <td>12/09/21</td>
                    <td>30/09/21</td>
                    <td>
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                    </td>
                    <td>
                        <a href="#"  class="btn btn-success" type="button"><span class="fa fa-plus"></span></a>
                        <a href="#"  class="btn btn-info" type="button"><span class="fa fa-pencil"></span></a>
                        <a href="#"  class="btn btn-danger" type="button"><span class="fa fa-trash-o"></span></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Description des objets</td>
                    <td>12/09/21</td>
                    <td>30/09/21</td>
                    <td>
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                    </td>
                    <td>
                        <a href="#"  class="btn btn-success" type="button"><span class="fa fa-plus"></span></a>
                        <a href="#"  class="btn btn-info" type="button"><span class="fa fa-pencil"></span></a>
                        <a href="#"  class="btn btn-danger" type="button"><span class="fa fa-trash-o"></span></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>
                        <textarea placeholder="Entrer la description" class="form-control" autocomplete="off" autofocus name="objet" cols="15" rows="5"></textarea>
                    </td>
                    <td>
                        <input type="date"  class="form-control" name="datedebut" />
                    </td>
                    <td>
                        <input type="date"  class="form-control" name="datefin" />
                    </td>
                    <td>
                        <input type="number"  class="" name="jours" placeholder="Entrer le nombre de jours de travailler">
                    </td>
                    <td>
                        <a href="#"  class="btn btn-success" type="button"><span class="fa fa-plus"></span></a>
                        <a href="#"  class="btn btn-info" type="button"><span class="fa fa-pencil"></span></a>
                        <a href="#"  class="btn btn-danger" type="button"><span class="fa fa-trash-o"></span></a>
                    </td>
                <tr>
            </tbody>
        </table>
    </div>
</div>

@include('partials.layout.footer')

@stop
