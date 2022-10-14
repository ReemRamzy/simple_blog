@extends('loginmaster')

@section('content')
<div class="container">
    <h3>control panel</h3>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>User</th>
                <th>Editor</th>
                <th>Admin</th>
            </tr>
            @foreach ($users as $user )
            <form method="post" action="/add-role">
                {{ csrf_field() }}
                <input type="hidden" name="email" value="{{ $user->email }}">
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <input type="checkbox" onchange="this.form.submit()" name="role_user" {{ $user->hasRole('user') ? 'checked' : ' '}}>
                </td>
                <td>
                    <input type="checkbox" onchange="this.form.submit()" name="role_editor" {{ $user->hasRole('editor') ? 'checked' : ' ' }}>
                </td>
                <td>
                    <input type="checkbox" onchange="this.form.submit()" name="role_admin" {{ $user->hasRole('admin') ? 'checked' : ' ' }}>
                </td>
            </tr>
            </form>
            @endforeach

        </table>
    </div>
    <p style="height: 100px;"></p>
</div>
<hr>
<div class="container">
    <h6>settings</h6>
    <form method="post" action="/settings">
        {{ csrf_field() }}
       stop comments: <input type="checkbox" name="stop_comment" onchange="this.form.submit()" {{ $stop_comment == 1 ? 'checked' : ' ' }} >
       <hr>
       stop Register: <input type="checkbox" name="stop_register" onchange="this.form.submit()" {{ $stop_register == 1 ? 'checked' : ' ' }} >

    </div>
    <p style="height: 200px;"></p>

@endsection

