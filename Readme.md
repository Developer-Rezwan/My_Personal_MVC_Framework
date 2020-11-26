#layouts and Template mastaring ...

1. Layouts mastaring ... 
       @yield("name-of-section");

2. Template mastaring .. 
      @extends("layouts/app")  //any type of path are acceptable.. 

      @section("name-of-section")
	// type your html/css/js code
      @endsection

# Useful methods of Controller
3. Contoller method.....
      ** Must extends Controller class in your class
	
      1.View frontend part...
	$this->view("welcome") //Which is views/welcome.php

      2. $variable passing..
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

## Recieve Data in front page 
	<?= $name_of_variable; ?>
	OR,
	<?= $name; ?>
	OR,
	<?= $name["First_name"]; ?>
