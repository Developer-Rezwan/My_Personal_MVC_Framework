<?php


namespace App\Vendor\Framework\Form;
use App\Requests\Requests as Requests;
use App\Vendor\Framework\Core\Application;

class validations
{
    public function error(){
        $error = [];
        $FormData = Application::$app->request->requested_data();
        foreach ($FormData  as $formkey => $formvalue){
            foreach (Requests::rules() as $ruleskey => $rulesvalue){

                if($formkey == $ruleskey){
                    $rules = explode("|",Requests::rules()[$ruleskey]);

                    /*
                     * This validation is for form required!
                     */
                    foreach ($rules as $rulesNameKeys => $rulesNameValues){
                        if($rulesNameValues == "required" && $formvalue == ""){
                            $error[$formkey] = "$formkey is required!";
                        }

                        /*
                         * This validation is for maximum value
                         */
                        elseif(preg_match("/max:\d+/i" , $rulesNameValues) === 1 ){
                            $maxValues = explode(":" , $rulesNameValues);
                            if($maxValues[1] < strlen($FormData[$formkey])){
                                $error[$formkey] = "$formkey can be maximum $maxValues[1] digits!";
                            }
                        }

                        /*
                         * This validation is for minimum values
                         */
                        elseif(preg_match("/min:\d+/i" , $rulesNameValues) === 1 ){
                            $maxValues = explode(":" , $rulesNameValues);
                            if($maxValues[1] > strlen($FormData[$formkey])){
                                $error[$formkey] = "$formkey must be minimum $maxValues[1] digits!";
                            }
                        }

                        /*
                         * This validation is for match
                         */
                        elseif(preg_match("/match:\w+/i" , $rulesNameValues) === 1 ){
                             $matchValues = explode(":" , $rulesNameValues);
                            /*
                             *  echo $formkey; // confirmPassword
                             *  echo $matchValues[1]; // password
                             */
                             if($FormData[$matchValues[1]] != $FormData[$formkey]){
                                 $error[$formkey] = "$matchValues[1] and $formkey are not matched!";
                             }
                        }

                        /*
                         * This Validation is for number
                         */
                        elseif (preg_match("/number/i" , $rulesNameValues) === 1 ){
                          /*
                           * echo $formkey; // phone
                           * echo $rulesNameValues; // number
                           */
                            if(!preg_match('/^[0-9]+$/',$FormData[$formkey]) ){
                                $error[$formkey] = "$formkey must be digits only [0-9]";
                            }
                        }

                        /*
                         * This Validation is for phone number
                         */
                        elseif (preg_match("/phone/i" , $rulesNameValues) === 1 ){
                            /*
                             * echo $formkey; // phone
                             * echo $rulesNameValues; // number
                             */
                            if(!preg_match('/^\+?[0-9]+\-?([0-9]+)?$/',$FormData[$formkey]) ){
                                $error[$formkey] = "$formkey number isn't valid!";
                            }
                        }

                            /*
                             * This validation is for email
                             */
                        elseif (preg_match("/email/i" , $rulesNameValues) === 1 ){
                            /*
                             * echo $rulesNameValues; // email
                             */
                            if (!filter_var($FormData[$formkey], FILTER_VALIDATE_EMAIL)) {
                                $error[$formkey] = "Invalid email format!";
                            }
                        }
                    }
                }
            }
        }
        return $error;
    }

    /*
     * @all function will return all the form data in an array
     */
    public function all(){
        if(empty($this->error())){
            return $FormInfo = Application::$app->request->requested_data();
        }else{

            $all_class = get_declared_classes();
            foreach ($all_class as $class){
                //echo $class."<br>";
                if($a = preg_match("/App\\\Requests/i",$class)){
                    echo $class;
                }else{
                    //echo $class . "<br>";
                }
            }
        }
    }
    /*
     * @only function will recieve multiple parameter which is actually the name of the form field name
     */
    public function only(...$keys ){
        if(empty($this->error())){
            foreach ($keys as $key) {
                $data[$key] = $this->all()[$key];
            }
            return $data;
        }else{

            $all_class = get_declared_classes();
            foreach ($all_class as $class){
                //echo $class."<br>";
                if($a = preg_match("/App\\\Requests/i",$class)){
                    echo $class;
                }else{
                    //echo $class . "<br>";
                }
            }
        }
    }
}