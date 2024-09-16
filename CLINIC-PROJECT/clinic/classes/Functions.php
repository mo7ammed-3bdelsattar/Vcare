<?php


class Functions{


  public function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}
public function redirectAfter($url, $numOfSec)
{
    header("Refresh: $numOfSec; url=$url");
    die;
}
public function redirect($url)
{
    header("Refresh: 0 ; url=$url");
    die;
}
public function sanitizeInput($input)
{
    return trim(htmlspecialchars($input));
}
public function url($url){
    return "http://127.0.0.1/vCare/CLINIC-PROJECT/clinic/".$url;

}


}