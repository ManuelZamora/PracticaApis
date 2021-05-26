Inicio (Despliegue de datos)
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->Apellido_Paterno }}</td>
            <td>{{ $empleado->Apellido_Materno }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>{{ $empleado->Telefono }}</td>
            <td>
                <a href="{{ url('/empleados/'.$empleado->id.'/edit')}}">
                Editar
            </a>

            |
                <form method="post" action="{{ url('/empleados/'.$empleado->id)}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE')}}
                    <button type="submit" onclick="return confirm('¿Borrar Registro?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
