# Start the Application :

Go to the ***public/*** folder and then open CMD or any command promt and
Type
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
# Form Validation

```

```