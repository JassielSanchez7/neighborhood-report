<table>

    <tr>
        <td colspan="8">
            MUNICIPALIDAD DISTRITAL DE LA VICTORIA
        </td>
    </tr>

    <tr>
        <td colspan="8">
            REPORTE DE INCIDENCIAS
        </td>
    </tr>

    <tr></tr>

    <tr>
        <td>Fecha de generación:</td>
        <td>{{ now()->format('d/m/Y H:i') }}</td>
    </tr>

    <tr>
        <td>Desde:</td>
        <td>{{ $filters['desde'] ?? 'Todos' }}</td>
    </tr>

    <tr>
        <td>Hasta:</td>
        <td>{{ $filters['hasta'] ?? 'Todos' }}</td>
    </tr>

    <tr>
        <td>Estado:</td>
        <td>{{ $filters['estado'] ?? 'Todos' }}</td>
    </tr>

    <tr>
        <td>Total incidencias:</td>
        <td>{{ $incidences->count() }}</td>
    </tr>

</table>

<br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Vecino</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Ubicación</th>
            <th>Estado</th>
            <th>Fecha incidencia</th>
        </tr>
    </thead>

    <tbody>
        @foreach($incidences as $incidence)
            <tr>
                <td>{{ $incidence->id }}</td>
                <td>{{ $incidence->neighbor->full_name }}</td>
                <td>{{ $incidence->typeIncidence->name }}</td>
                <td>{{ $incidence->description }}</td>
                <td>{{ $incidence->location }}</td>
                <td>{{ $incidence->status }}</td>
                <td>{{ $incidence->occurred_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>