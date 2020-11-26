<?php


namespace App\core;


class Blade
{
    private $getTemplate = [];
    private $getYiedName = [];

    public function bladeLayouts( $layouts )
    {
        $num_yield = substr_count($layouts , "@yield"); // Find how many @yeild strings are in the layouts page

        $s1 = strpos($layouts, "@yield(" ); // find @section and get position number

        for($i = 0 ; $i < $num_yield ; $i++) {
            $s1 = strpos($layouts, "@yield(" , $s1+$i); // find @section and get position
            $s2 = strpos($layouts, ")", $s1);

            $s3 = $s2 - $s1 -1;

            $str = substr($layouts, $s1, $s3);
            array_push($this->getYiedName, substr($str, 8)); // store all the section name in the $getYieldName variable
        }

        return $this->getYiedName;


    }


     public function bladeTemplate($thml , $layout)
     {

          $content = $thml;
          $section_name = [];
          $template_part = [];
          $s1 = strpos($content,"@section("); // find @section and get position numbers

          $num_of_section =  substr_count($layout , "@yield");
          for($i = 0 ; $i < $num_of_section ; $i++){

          $s1 = strpos($content,"@section(" , $s1+$i); // find @section and get position number
          $s2 = strpos($content,"@endsection" , $s1); // find @endsection and get them position

          $s3 = $s2-$s1; // total string number between @section and endsection

          $total_str = substr($content, $s1 , $s3); // get string @section and between @endsection

          $s4 = strpos($total_str, ")"); //find position of ")" like @section(...) ")" .

          $template_string = substr( $total_str, $s4+1); // The string between (....)

          array_push( $template_part , $template_string ) ;  // )" Main Content whice will be html/js/css etc.

          $str1 = substr($total_str, 0 , $s4-1);      // All the strings before of ")"
          $str2 = strpos($str1, "(")+2; // After the string position of "("
          $section_string = substr($str1, $str2); // The string between (....)

          array_push($section_name , $section_string  ) ; //all the section name are push in $section_name array

         }

         foreach($section_name as $key => $value){
            $this->getTemplate[ $section_name[$key] ] = $template_part[$key];  // pass array like ["content" => "html,css , js "]
         }
         return $this->getTemplate;

     }

     public function bladeResolve()
     {
         $array = [];
         foreach ($this->getTemplate as $key => $value){
            for($i = 0 ; $i < count($this->getYiedName) ; $i++){
                if($this->getYiedName[$i] == $key) {
                  array_push($array,["@yield(\"$key\")" => $value]);
                }
            }
         }

        return $array;
     }

}