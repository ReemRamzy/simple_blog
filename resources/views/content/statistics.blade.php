@extends('master')

@section('content')
<div class="container">
<div class="col-md-8">
    <h2><small>website statistics</small></h2>
 </div>
 <div>
    <table class="table table-hover">
        <tr>
            <td>All users</td>
            <td> {{ $statistics['users'] }} </td>
        </tr>
        <tr>
            <td>All posts</td>
            <td> {{ $statistics['posts'] }} </td>
        </tr>
        <tr>
            <td>All comments </td>
            <td> {{ $statistics['comments'] }}</td>
        </tr>
        <tr>
            <td>Most Active User</td>
            <td> <b>{{ $statistics['active_user'] }} </b> likes_count:{{ $statistics['active_user_likes']}} & comments_count: {{ $statistics['active_user_comments'] }} </td>
        </tr>
        <tr>
            <td>Most Active Topic </td>
            <td> </td>
        </tr>
    </table>
 </div>
 <p style="height: 400px;"></p>
</div>

@stop
