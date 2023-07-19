<?php  
$url = $_SERVER['REQUEST_URI'];

if(array_key_exists($url,$routes))
{
    $routesParts= explode('@',$routes[$url]);
    $controllerName = $routesParts[0];
    $methodName = $routesParts[1];

    require_once "../controller/".$controllerName.".php";
    $controler = new $controllerName();
    $controler->$methodName();
}
else
{
    echo "Pagina não encontrada";


}

?>