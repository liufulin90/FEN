<?php
header("Content-type: text/html; charset=utf-8"); 

require_once 'RedisCmnCache.php';
try {

    $cmnCache = new RedisCmnCache();
    $obj = array("jon","tom","jack",4);
    //$obj = json_encode($obj);
    $cmnCache->hset("test2", "test", $obj);//("test", $obj, 1600);
    $cmnCache->set('test','testsetvalue');
    var_dump($cmnCache->hget("test2"));
    var_dump($cmnCache->hget("test2","test"));
    var_dump(unserialize($cmnCache->hget("test2","test")));
} catch(Exception $e){
    var_dump($e->getMessage());
}
?>
