<h1>Nuevo Cliente</h1>
<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="name" id="nombre">
    <label for="telefono">Telefono</label>
    <input type="number" name="phone" id="telefono">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="direccion">Direccion</label>
    <input type="text" name="address" id="direccion">
    <button type="submit">Guardar</button>

    </form>
