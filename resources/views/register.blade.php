@extends('loginmaster')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>
        @if ($stop_register == 1)
        <p style="height: 300px;"></p>

        <h3 style="text-align: center;">sorry!Registration is temporarily not available.</h3>

        @else
        <div class="col-6">
        <form method="POST" action="/register">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" >

              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">login</button>
          </form>
        </div>
        @endif

        <div class="col-3"></div>
          <p style="height: 350px;"></p>
    </div>
</div>
@endsection

