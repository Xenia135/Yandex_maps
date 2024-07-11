<h1>Пользователи</h1>
<table>
  <thead>
    <tr>
      <th>Имя</th>
      <th>Email</th>
      <th>Роль</th>
      <th>Локации</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr id="row_{{$user->id}}">
        <td data-id="{{ $user->name }}">{{ $user->name }}</td>
        <td data-id="{{ $user->email }}">{{ $user->email }}</td>
        <td data-id="{{ $user->role }}">{{ $user->role }}</td>
        <td><button type="button" onclick="window.location.href='/locations/' + {{ $user->id }}" data-id="{{ $user->id }}">Показать локации</button></td>
      </tr>
    @endforeach
  </tbody>
</table>