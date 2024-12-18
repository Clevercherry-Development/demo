<h3>Circuits</h3>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($circuits as $circuit)
            <tr>
                <td><a href="/circuits/{{ $circuit->id }}">{{ $circuit->name }}</a></td>
                <td>{{ $circuit->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>