<?php


namespace App\Vendor\Framework\Core;


class Blade
{
    private $getTemplate = [];
    private $getYiedName = [];

    public function bladeLayouts( $layouts )
    {

        /*
         * Find how many @yeild strings are in the layouts page
         */
        $num_yield = substr_count($layouts , "@yield");

        /*
         * find @section and get position number
         */
        $s1 = strpos($layouts, "@yield(" );

        for($i = 0 ; $i < $num_yield ; $i++) {
            /*
             * find @section and get position
             */
            $s1 = strpos($layouts, "@yield(" , $s1+$i);
            $s2 = strpos($layouts, ")", $s1);

            $s3 = $s2 - $s1 -1;
            /*
             * store all the section name in the $getYieldName variable
             */
            $str = substr($layouts, $s1, $s3);
            array_push($this->getYiedName, substr($str, 8));
        }

        return $this->getYiedName;


    }


     public function bladeTemplate($thml , $layout)
     {

          $content = $thml;
          $section_name = [];
          $template_part = [];
          /*
           * find @section and get position numbers
           */
          $s1 = strpos($content,"@section(");

          $num_of_section =  substr_count($layout , "@yield");
          for($i = 0 ; $i < $num_of_section ; $i++){
          /*
           * find @section and get position number
           */
          $s1 = strpos($content,"@section(" , $s1+$i);
          /*
           * find @endsection and get them position
           */
          $s2 = strpos($content,"@endsection" , $s1);
          /*
           * total string number between @section and endsection
           */
          $s3 = $s2-$s1;
          /*
           * get string @section and between @endsection
           */
          $total_str = substr($content, $s1 , $s3);
           /*
            * find position of ")" like @section(...) ")" .
            */
          $s4 = strpos($total_str, ")");
          /*
           * The string between (....)
           */
          $template_string = substr( $total_str, $s4+1);
          /*
           *  )" Main Content whice will be html/js/css etc.
           */
          array_push( $template_part , $template_string ) ;
          /*
           * All the strings before of ")"
           */
          $str1 = substr($total_str, 0 , $s4-1);
          /*
           * After the string position of "("
           */
          $str2 = strpos($str1, "(")+2;
          /*
           *  The string between (....)
           */
          $section_string = substr($str1, $str2);
          /*
           * all the section name are push in $section_name array
           */
          array_push($section_name , $section_string  ) ;

         }

         foreach($section_name as $key => $value){
             /*
              *  pass array like ["content" => "html,css , js "]
              */
            $this->getTemplate[ $section_name[$key] ] = $template_part[$key];
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