<table class="table-hover">
    <thead>
        <tr>
            <th>Identifiants</th>
            <th>Nom du directions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($divisions as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->nom_divisions }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
