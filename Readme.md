# Start the Application :
####At First You Need to Connect With Your Database with your Application:
Goto the ***.env*** file and write the database informations:
```
APP_NAME=xiaomi
APP_URL=http://localhost:8080 (Your Domain path)

DB_CONNECTION=mysql   (Your Database)
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_mvc    (Your Database Name)
DB_USERNAME=root      (Your Database Username)
DB_PASSWORD=          (Your Database Password)

```
Then , Go to the ***public/*** folder and then open CMD or any command promt and Type

```
  php -S localhost:8080 
```

# Routing :

Go To The **_Routes/web.php_**

```
<?php

use App\core\Application;
use Facade\Route;

use \app\Controllers\homeController;
use \app\Controllers\LoginController;


Route::get('/','welcome');
Route::get('/profile',function (){Start the Application :

    return Application::$app->route->renderView("profile");
});

Route::get('/login',[LoginController::class , "login"]);
Route::post('/login',[LoginController::class , "loginControl"]);

```

# layouts and Template mastaring ...

1 . Write in the Layouts file where you want to dynamic

``` 
       @yield("name-of-section") //For Example @yield("main-content")
```

2 . Write in the Template file

``` 
      @extends("path of the layouts")  //Like @extends("layouts/app") 

      @section("name-of-section")
	// type your html/css/js code or an
      @endsection
```

# Useful methods for the Controller :

1 . _Must extends **Controller** class in your class_

Example of a ControllerCalss ..

```

<?php


namespace app\Controllers;


class homeController extends Controller
{

    public function home(){
        $this->data=[
            "Fullname" => ["name" => "Rezwan","lname" => "Hossain"],
            "Subject" => ["Laravel" , "php"]
        ];
        return $this->view("welcome",$this->data);
    }

}
```

You Can Also Pass Your Variable Like This..

```
	 $data = [];
	 $data["name_of_variable"] = "your string or anything";
		
         $this->view("welcome" , $data);	
	 
	 OR,
	 
	 $data = [
             "name" => "Rezwan Hossain",
	     "lname" => "Sajeeb"
           ];

	$this->view("welcome" , $data);
       
        $data = [
	   "name" => ["First_name" => "Rezwan","lname_name" => "Hossain"],
	   "Father" => ["First_name" => "Rashidul","lname_name" => "Islam"]
	];
         
        $this->view("welcome", $data);
```

# Recieve Data from the view or front-page

```
<?= $name_of_variable; ?>
OR,
<?= $name; ?>
OR,
<?= $name["First_name"]; ?>
```

# Form Validation :

### Controller's Code.

For example:

```
<?php


namespace App\Controllers;


use App\Vendor\Framework\Form\Request;

class RegisterController extends Controller
{
    public function register(){
        return $this->view('register');
    }

    public function registerControl(Request $request){
        $request->validate([
            'email' => "required|max:32",
            'password' => "required|max:8|min:4|password",
            'confirmPassword' => "required|match:password",
            'phone' => "required|phone",
            'username' => "required|max:8|unique",
            'fname' => "required|max:8|unique",
            'mname' => "required|max:8|unique",
            'lname' => "required|max:8|unique",
            'zip' => "required|min:4:max:8"
        ]);

       if( $request->all()){
           print_r($request->all());
       }else{
          return $this->view("register");
       };

    }
}
```

***Validation Conditions :***

```
required = Tield cann't be empty.
min      = Minimum (that you want) digits can be acceptable.
max      = Maximum (that you want) digits can be acceptable.
unique   = If it have already exist in database
phone    = phone number must be with country code like (+880)
match    = What field you want check that are matched or not
```

***You will be able to see your Form data by the bellowing code:***<br><br>

If you want to see all the data which is come from the Form that you sent can see by .

```
    public function registerControl(Request $request){
        print_r($request->all());
    }
 
```

If you want to see some specific data which is come from the Form that you sent can see by .

```
    public function registerControl(Request $request){
        print_r($request->only('email','password',.....));
    }
 
```


***Show error in the front page :***
***For Example (login.blade.php)***

```
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
            <input type="text" class="form-control <?= isset($error['username']) ? "is-invalid" : "" ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
            <?= isset($error['username']) ? "<div class='text-danger font-italic'>" . $error['username'] . "</div>" : "" ?>
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control <?= isset($error['password']) ? "is-invalid" : "" ?>" id="exampleInputPassword1" name="password">
            <?= isset($error['password']) ? "<div class='text-danger font-italic'>" . $error['password'] . "</div>" : "" ?>
        </div>
        
        <div class="form-group form-check float-left">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        
        <button type="submit" class="btn btn-primary my-btn">Submit</button>
        <p>Forgotten <a href="/" >Password</a>! OR Register<a href="/register"> A new Account</a>!</p>
    </form>
</div>

@endsection
```


