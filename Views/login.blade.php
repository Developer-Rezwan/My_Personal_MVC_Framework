@extends("layouts/style")
@section("title")
    Login Your Existing Account
@endsection
@section("content")
    <div class="container mt-2">
        <h2 class="text-center text-success">Login Your Account</h2>
        <form class="container col-6 border" action="/login" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control <?= isset($error['username']) ? "is-invalid" : "" ?>"
                       id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                <?= isset($error['username']) ? "<div class='text-danger font-italic'>" . $error['username'] . "</div>" : "" ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control <?= isset($error['password']) ? "is-invalid" : "" ?>"
                       id="exampleInputPassword1" name="password">
                <?= isset($error['password']) ? "<div class='text-danger font-italic'>" . $error['password'] . "</div>" : "" ?>
            </div>
            <div class="form-group form-check float-left">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary my-btn">Submit</button>
            <p>Forgotten <a href="/">Password</a>! OR Register<a href="/register"> A new Account</a>!</p>
        </form>
    </div>
@endsection