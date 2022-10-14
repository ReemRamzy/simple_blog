@section('sidebar')
<div class="col-lg-4">
    <!-- Search widget-->
   <!-- <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div> -->
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">

                        @foreach ($categories as $category)
                        <li><a href="/category/{{ $category->name }}">{{ $category->name }}</a></li>
                        @endforeach


                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">credentials to test website</div>
        <div class="card-body">Email: admin@email.com </br>
        password: 123456 </div>
        <hr>
        <div class="card-body">Email: editor@email.com </br>
            password: 123456 </div>
        <hr>
        <div class="card-body">Email: user@email.com </br>
            password: 123456 </div>
    </div>
</div>
@endsection
