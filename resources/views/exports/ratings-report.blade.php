<table>

    <tr>
        <td colspan="8">
            MUNICIPALIDAD DISTRITAL DE LA VICTORIA
        </td>
    </tr>

    <tr>
        <td colspan="8">
            REPORTE DE CALIFICACIONES
        </td>
    </tr>

    <tr></tr>

    <tr>
        <td>Fecha de generación:</td>
        <td>{{ now()->format('d/m/Y H:i') }}</td>
    </tr>


    <tr>
        <td>Total incidencias:</td>
        <td>{{ $ratings->count() }}</td>
    </tr>

</table>

<br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Id de Incidencia</th>
            <th>Id de Vecino</th>
            <th>Calificacion</th>
            <th>Comentario</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>

    <tbody>
        @foreach($ratings as $rating)
            <tr>
                <td>{{ $rating->id }}</td>
                <td>{{ $rating->incidence_id }}</td>
                <td>{{ $rating->neighbor_id }}</td>
                <td>{{ $incidence->rating }}</td>
                <td>{{ $incidence->comment }}</td>
                <td>{{ $incidence->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>