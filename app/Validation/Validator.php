<?php


namespace App\Validation;


class Validator
{
    public $patterns = [
        'string'        => '[\p{L}\s]+',
        'numeric'       => '[0-9]+',
        'tel'           => '[09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}]+',
        'text'          => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'email'         => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]'
    ];

    public $errors = [];
    public $aliases = [];

    public function name($name){

        $this->name = $name;
        return $this;

    }

    public function value($value){

        $this->value = $value;
        return $this;

    }

    public function alias($alias = null)
    {
        $this->aliases[$this->name] = $alias;
        return $this;
    }

    public function get_alias($name)
    {
        return $this->aliases[$this->name] ??  $name;
    }

    public function pattern($name){

        if($name == 'array'){

            if(!is_array($this->value)){
                $this->errors[$this->name] = 'فرمت فیلد '.$this->get_alias($this->name).' نامعتبر است.';
            }

        }else{

            $regex = '/^('.$this->patterns[$name].')$/u';
            if($this->value != '' && !preg_match($regex, $this->value)){
                $this->errors[$this->name] = 'فرمت فیلد '.$this->get_alias($this->name).' نامعتبر است.';
            }

        }
        return $this;

    }


    public function required(){

        if((isset($this->file) && $this->file['error'] == 4) || ($this->value == '' || $this->value == null)){
            $this->errors[$this->name] = 'فیلد '.$this->get_alias($this->name).' الزامی است.';
        }
        return $this;

    }

    public function min($length){

        if(is_string($this->value)){

            if(strlen($this->value) < $length){
                $this->errors[$this->name] = 'طول '.$this->get_alias($this->name).' کمتر از .' . $length . ' است';
            }

        }else{

            if($this->value < $length){
                $this->errors[$this->name] = 'مقدار '.$this->get_alias($this->name).' کمتر از .' . $length . ' است';
            }

        }
        return $this;

    }

    public function max($length){

        if(is_string($this->value)){

            if(strlen($this->value) > $length){
                $this->errors[$this->name] = 'طول '.$this->get_alias($this->name).' بیشتر از .' . $length . ' است';
            }

        }else{

            if($this->value > $length){
                $this->errors[$this->name] = 'مقدار '.$this->get_alias($this->name).' بیشتر از .' . $length . ' است';
            }

        }
        return $this;

    }

    public function purify($string){
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public function isSuccess(){
        return empty($this->errors);
    }

    public function getErrors(){
        if(!$this->isSuccess())
            return $this->errors;
        else
            return [];
    }

    public static function is_string($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function is_alpha($value){
        return filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z]+$/")));
    }
}