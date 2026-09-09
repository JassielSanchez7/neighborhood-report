<table>

    <tr>
        <td colspan="8">
            MUNICIPALIDAD DISTRITAL DE LA VICTORIA
        </td>
    </tr>

    <tr>
        <td colspan="8">
            REPORTE DE VECINOS
        </td>
    </tr>

    <tr></tr>

    <tr>
        <td>Fecha de generación:</td>
        <td>{{ now()->format('d/m/Y H:i') }}</td>
    </tr>

    

    <tr>
        <td>Total Vecinos:</td>
        <td>{{ $neighbors->count() }}</td>
    </tr>

</table>

<br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>Email</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Fecha Registro</th>
        </tr>
    </thead>

    <tbody>
        @foreach($neighbors as $neighbor)
            <tr>
                <td>{{ $neighbor->id }}</td>
                <td>{{ $neighbor->full_name }}</td>
                <td>{{ $neighbor->email }}</td>
                <td>{{ $neighbor->dni }}</td>
                <td>{{ $neighbor->phone }}</td>
                <td>{{ $neighbor->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>