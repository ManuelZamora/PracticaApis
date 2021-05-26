Sección para editar empleado
<form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <label for="Nombre">{{'Nombre'}}</label>
    <input id="Nombre" class="form-control" type="text" name="Nombre" value="{{$empleado-> Nombre}}">
    <br>

    <label for="Apellido Paterno">{{'Apellido Paterno'}}</label>
    <input id="Apellido Paterno" class="form-control" type="text" name="Apellido Paterno" value="{{$empleado-> Apellido_Paterno}}">
    <br>

    <label for="Apellido Materno">{{'Apellido Materno'}}</label>
    <input id="Apellido Materno" class="form-control" type="text" name="Apellido Materno" value="{{$empleado-> Apellido_Materno}}">
    <br>

    <label for="Correo">{{'Correo'}}</label>
    <input id="Correo" class="form-control" type="email" name="Correo" value="{{$empleado-> Correo}}">
    <br>

    <label for="Telefono">{{'Telefono'}}</label>
    <input id="Telefono" class="form-control" type="text" name="Telefono" value="{{$empleado-> Telefono}}">
    <br>

    <input type="submit" value="Editar">
</form>
