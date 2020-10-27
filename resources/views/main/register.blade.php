@extends ('layout')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Enter your name:</label>
                        <input type="name" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email1">Enter your email:</label>
                        <input type="email" name="email" class="form-control" id="email1">
                    </div>
                    <div class="form-group">
                        <label for="password">Enter password:</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-secondary">Registration</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection

