<table>

    <tr>
        <td colspan="8">
            MUNICIPALIDAD DISTRITAL DE LA VICTORIA
        </td>
    </tr>

    <tr>
        <td colspan="8">
            REPORTE DE TIPO DE INCIDENCIAS
        </td>
    </tr>

    <tr></tr>

    <tr>
        <td>Fecha de generación:</td>
        <td>{{ now()->format('d/m/Y H:i') }}</td>
    </tr>


    <tr>
        <td>Total de tipo de incidencias:</td>
        <td>{{ $typeincidences->count() }}</td>
    </tr>

</table>

<br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>

    <tbody>
        @foreach($typeincidences as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->description }}</td>
                <td>{{ $type->created_at }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>