<?php
session_start();
class Session
{

    public static function   get(string $key)
    {
        return $_SESSION[$key];
    }
    public  static  function   set(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }
    public static  function   flash(string $key)
    {
      
        if (isset($_SESSION[$key])) {

            echo "$key : " . $_SESSION[$key];
            unset($_SESSION[$key]);
        }
    }

    public static  function   remove(string $key)
    {
        unset($_SESSION[$key]);
    }
    public  static function   removeAll()
    {
        $_SESSION=[];
        session_destroy();
        
    }
    public static  function   getAll()
    {
        return $_SESSION;
    }
    public  static function   check(string $key)
    {
        
        if (isset($_SESSION[$key])) {
            return " $key => Is Exists ";
        }
        return " $key => Is Not Exists ";
    }
}

/*
------------------------
 set Key
------------------------
*/

Session::set('name', 'amir');
Session::set('age', '27');
Session::set('aggree', 'A+');
Session::set('weigth', '65');

/*
------------------------
 get Key
------------------------
*/

echo "name : " . Session::get('name');
echo "<br>";
echo "age : " . Session::get('age');
echo "<br>";
echo "aggree : " . Session::get('aggree');
echo "<br>";


/*
------------------------
 get All
------------------------
*/

var_dump(Session::getAll());
echo "<br>";





/*
------------------------
 remove Key 
------------------------
*/

Session::remove('aggree');
var_dump(Session::getAll());
echo "<br>";


/*
------------------------
 flash  Key
------------------------
*/

Session::flash('weigth');
echo "<br>";


/*
------------------------
 check  Key
------------------------
*/

echo  Session::check('aggree');
echo "<br>";



/*
------------------------
 remove  All
------------------------
*/

Session::removeAll();
var_dump(Session::getAll());
echo "<br>";
