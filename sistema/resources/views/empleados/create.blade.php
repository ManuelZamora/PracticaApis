Sección para crear empleados
<form action="{{url ('/empleados')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="Nombre">{{'Nombre'}}</label>
    <input id="Nombre" class="form-control" type="text" name="Nombre">
    <br>

    <label for="Apellido Paterno">{{'Apellido Paterno'}}</label>
    <input id="Apellido Paterno" class="form-control" type="text" name="Apellido Paterno">
    <br>

    <label for="Apellido Materno">{{'Apellido Materno'}}</label>
    <input id="Apellido Materno" class="form-control" type="text" name="Apellido Materno">
    <br>

    <label for="Correo">{{'Correo'}}</label>
    <input id="Correo" class="form-control" type="email" name="Correo">
    <br>

    <label for="Telefono">{{'Telefono'}}</label>
    <input id="Telefono" class="form-control" type="text" name="Telefono">
    <br>

    <input type="submit" value="Agregar">

</form>
