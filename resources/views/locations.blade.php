<h1>Места</h1>
<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Долгота</th>
            <th>Широта</th>
        </tr>
    </thead>
    <tbody>
    @foreach($marks as $mark)
        <tr>
            <td>{{ $mark->name }}</td>
            <td>{{ $mark->longitude }}</td>
            <td>{{ $mark->width }}</td>
            </tr>
    @endforeach
    </tbody>
</table>