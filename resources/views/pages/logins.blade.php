Show all logins here

@foreach ($logins as $login)
    <li>{{$login->created_at}}</li>
    @endforeach
