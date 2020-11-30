@extends("layouts/style")
@section("title")
Create a New Account
@endsection
@section("content")
<div class="container col-8 mt-2">
    <h3 class="text-center text-success">Register A New Account </h3>
    <form action="/register" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" id="8 digit username" name="username">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="8 digit password" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Email</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="example@example.com" name="email">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Full Name</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Rezwan Hossain Sajeeb" name="name">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Phone</label>
                <input type="text" class="form-control" id="inputCity" placeholder="+880*********" name="phone">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Country</label>
                <select id="inputState" class="form-control" name="country">
                    <option selected>Bangladesh</option>
                    <option>Indea</option>
                    <option>USA</option>
                    <option>Pakistan</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check float-left">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="accept">
                <label class="form-check-label" for="gridCheck">
                    Accept Terms & Conditions
                </label>
                <p class="mt-2">*** If Already Registered ! You should <a href="/login" >Login</a> </p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right" name="register">Register</button>
    </form>
</div>
@endsection