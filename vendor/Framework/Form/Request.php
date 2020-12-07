<?php


namespace App\Vendor\Framework\Form;

use App\Vendor\Framework\Core\Application;

class Request extends Validations
{

  /*
   * Recieve all the Rules this function
   */
  public function validate(array $rules){
     return self::rules($rules);
  }



    /*
     | @all function will return all the form data in an array
     */
    public function all()
    {
        if (empty($this->error())) {
            return $FormInfo = Application::$app->request->requested_data();
        }
    }



    /*
     * @only function will recieve multiple parameter which is actually the name of the form field name
     */
    public function only(...$keys ):array
    {
        if(empty($this->error())){
            foreach ($keys as $key) {
                $data[$key] = $this->all()[$key];
            }
            return $data;
        }
    }
}