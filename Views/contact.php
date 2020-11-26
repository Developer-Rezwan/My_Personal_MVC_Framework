@extends("layouts/app")

@section("title")
Welcome to the Contact page
@endsection

@section('form')
<form action="/contact" method="post">
    <label for="email">Eamil</label>
    <input type="text" name="email">
    <label for="email">Username</label>
    <input type="text" name="username">
    <label for="email">Password</label>
    <input type="password" name="password">
    <input type="submit" value="Sign Up">
</form>
@endsection

@section("footer-name")
Developer_Rezwan
@endsection
