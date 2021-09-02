<table class="table-hover">
    <thead>
        <tr>
            <th>Identifiants</th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($directions as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->nom_directions }}</td>
                <td>{{ $d->sigle_directions }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
