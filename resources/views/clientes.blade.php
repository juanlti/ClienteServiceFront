<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Acciones</th>

    </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)

        <tr>
            <td>{{ $cliente['name'] ?? 'N/A' }}</td>
            <td>{{ $cliente['email'] ?? 'N/A' }}</td>
            <td>{{ $cliente['phone'] ?? 'N/A' }}</td>
            <td><a href="{{route('cliente.destroy',['id'=>$cliente['id']])}}">Borrar</a></td>
            <td><a href="{{route('clientes.mostrarCliente',['id'=>$cliente['id']])}}">Editar</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
