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
     header('Location:'.Functions::url($url));
    exit;
}
public function sanitizeInput($input)
{
    return trim(htmlspecialchars($input));
}
public static function url($url){
    return "http://127.0.0.1/vCare/CLINIC-PROJECT/clinic/".$url;

}
public static function urlAdmin($url){
    return "http://127.0.0.1/vCare/CLINIC-PROJECT/clinic/admin/".$url;

}

}