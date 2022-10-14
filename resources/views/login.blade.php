@extends('loginmaster')

@section('content')
<div class="container mt-5">
    <div class="row">
        <p style="height:100px;"></p>
        <div class="col-3"></div>

        <div class="col-6">
        <form method="POST" action="/login">
            {{ csrf_field() }}

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">login</button>
          </form>
          <div>
            @foreach ($errors->all() as $error)
             <div style="background-color: red;">
                {{ $error }}
                </div>   <br>
            @endforeach
        </div>
        </div>
        <div class="col-3"></div>
          <p style="height: 350px;"></p>
    </div>
</div>
@endsection

