<?php


namespace App\Vendor\Framework\Form;
use App\Vendor\Framework\Core\Application;

class Validations
{
    private static array $rules = [];

    protected static function rules($rules){
        return self::$rules = $rules;
    }



    public function error(): array
    {
        $error = [];
        $FormData = Application::$app->request->requested_data();
        foreach ($FormData as $formkey => $formvalue) {
            foreach ( self::$rules as $ruleskey => $rulesvalue) {

                if ($formkey == $ruleskey) {
                    $rules = explode("|", self::$rules[$ruleskey]);


                        /*
                         * This validation is for form required!
                         */
                    foreach ($rules as $rulesNameKeys => $rulesNameValues) {
                        if ($rulesNameValues == "required" && $formvalue == "") {
                            $error[$formkey] = "This Field is required!";
                        }


                        /*
                         * This validation is for maximum value
                         */
                        elseif (preg_match("/max:\d+/i", $rulesNameValues) === 1) {
                            $maxValues = explode(":", $rulesNameValues);
                            if ($maxValues[1] < strlen($FormData[$formkey])) {
                                $error[$formkey] = "This Field can be maximum $maxValues[1] digits!";
                            }
                        }


                        /*
                         * This validation is for minimum values
                         */
                        elseif (preg_match("/min:\d+/i", $rulesNameValues) === 1) {
                            $maxValues = explode(":", $rulesNameValues);
                            if ($maxValues[1] > strlen($FormData[$formkey])) {
                                $error[$formkey] = "This Field must be minimum $maxValues[1] digits!";
                            }
                        }


                        /*
                         * This validation is for match
                         */
                        elseif (preg_match("/match:\w+/i", $rulesNameValues) === 1) {
                            $matchValues = explode(":", $rulesNameValues);
                            /*
                             | ----------------------------------
                             |  echo $formkey; // confirmPassword
                             | ----------------------------------
                             |  echo $matchValues[1]; // password
                             |------------------------------------
                             */
                            if ($FormData[$matchValues[1]] != $FormData[$formkey]) {
                                $error[$formkey] = ucwords($matchValues[1]) ." and ".ucwords($formkey) ." are not matched!";
                            }
                        }


                        /*
                         * This Validation is for number
                         */
                        elseif (preg_match("/number/i", $rulesNameValues) === 1) {

                            /*
                             * echo $formkey; // phone
                             * echo $rulesNameValues; // number
                             */
                            if (!preg_match('/^[0-9]+$/', $FormData[$formkey])) {
                                $error[$formkey] = "$formkey must be digits only [0-9]";
                            }
                        }


                        /*
                         * This Validation is for phone number
                         */
                        elseif (preg_match("/phone/i", $rulesNameValues) === 1) {


                            /*
                             * echo $formkey; // phone
                             * echo $rulesNameValues; // number
                             */
                            if (!preg_match('/^\+?[0-9]+\-?([0-9]+)?$/', $FormData[$formkey])) {
                                $error[$formkey] = "$formkey number isn't valid!";
                            }
                        }



                            /*
                             * This validation is for email
                             */
                        elseif (preg_match("/email/i", $rulesNameValues) === 1) {
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
}