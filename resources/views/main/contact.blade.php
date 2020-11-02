@extends ('layouts.layout', ['title' => 'Contact'])

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Your name:</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email1">Your email:</label>
                        <input type="email" name="email" class="form-control" id="email1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary">Send message</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection

