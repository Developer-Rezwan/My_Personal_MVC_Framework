@extends("layouts/style")
@section("title")
    Create a New Account
@endsection
@section("content")
    <div class="container col-8 mt-2">
        <h3 class="text-center text-success">Register A New Account </h3>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control <?= isset($error['username']) ? "is-invalid":"" ?>"
                           id="8 digit username" name="username">
                    <?= isset($error['username']) ? "<div class='text-danger font-italic'>" . $error['username'] . "</div>" : "" ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control <?= isset($error['password']) ? "is-invalid" : "" ?>"
                           id="8 digit password" name="password">
                    <?= isset($error['password']) ? "<div class='text-danger font-italic'>" . $error['password'] . "</div>" : "" ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control <?= isset($error['email']) ? "is-invalid" : "" ?>"
                           id="inputAddress" placeholder="example@example.com" name="email">
                    <?= isset($error['email']) ? "<div class='text-danger font-italic'>" . $error['email'] . "</div>" : "" ?>
                </div>
                <div class="col-sm-6">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password"
                           class="form-control <?= isset($error['confirmPassword']) ? "is-invalid" : "" ?>"
                           id="confirmPassword" placeholder="********" name="confirmPassword">
                    <?= isset($error['confirmPassword']) ? "<div class='text-danger font-italic'>" . $error['confirmPassword'] . "</div>" : "" ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control <?= isset($error['fname']) ? "is-invalid" : "" ?>" id="fname"
                           placeholder="Rezwan" name="fname">
                    <?= isset($error['fname']) ? "<div class='text-danger font-italic'>" . $error['fname'] . "</div>" : "" ?>
                </div>
                <div class="form-group col-sm-4">
                    <label for="mname">Middle Name</label>
                    <input type="text" class="form-control <?= isset($error['mname']) ? "is-invalid" : "" ?>"
                           id="inputAddress2" placeholder="Hossain" name="mname">
                    <?= isset($error['mname']) ? "<div class='text-danger font-italic'>" . $error['mname'] . "</div>" : "" ?>
                </div>
                <div class="form-group col-sm-4">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control <?= isset($error['lname']) ? "is-invalid" : "" ?>" id="lname"
                           placeholder="Sajeeb" name="lname">
                    <?= isset($error['lname']) ? "<div class='text-danger font-italic'>" . $error['lname'] . "</div>" : "" ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Phone</label>
                    <input type="text" class="form-control <?= isset($error['phone']) ? "is-invalid" : "" ?>"
                           id="inputCity" placeholder="+880*********" name="phone">
                    <?= isset($error['phone']) ? "<div class='text-danger font-italic'>" . $error['phone'] . "</div>" : "" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Country</label>
                    <select id="inputState" class="form-control" name="country">
                        <option selected>Bangladesh</option>
                        <option>Indea</option>
                        <option>USA</option>
                        <option>Pakistan</option>
                    </select>
                    <?= isset($error['country']) ? "<div class='text-danger font-italic'>" . $error['country'] . "</div>" : "" ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control <?= isset($error['zip']) ? "is-invalid" : "" ?>"
                           id="inputZip" name="zip">
                    <?= isset($error['zip']) ? "<div class='text-danger font-italic'>" . $error['zip'] . "</div>" : "" ?>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check float-left">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="accept">
                    <label class="form-check-label" for="gridCheck">
                        Accept Terms & Conditions
                    </label>
                    <?= isset($error['accept']) ? "<div class='text-danger font-italic'>" . $error['accept'] . "</div>" : "" ?>
                    <p class="mt-2">*** If Already Registered ! You should <a href="/login">Login</a></p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Register</button>
        </form>
    </div>
@endsection