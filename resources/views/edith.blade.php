<h1>Nuevo Cliente</h1>
<form action="{{ route('cliente.update') }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$cliente['id']}}">

    <label for="telefono">Telefono</label>
    <input type="text" name="phone" id="telefono" value="{{$cliente['phone']}}">

    <label for="direccion">Direccion</label>
    <input type="text" name="address" id="direccion" value="{{$cliente['address']}}">
    <button type="submit">Guardar</button>

</form>

