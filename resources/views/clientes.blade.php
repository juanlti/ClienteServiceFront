<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)

        <tr>
            <td>{{ $cliente['name'] ?? 'N/A' }}</td>
            <td>{{ $cliente['email'] ?? 'N/A' }}</td>
            <td>{{ $cliente['phone'] ?? 'N/A' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
