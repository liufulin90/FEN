<?php
header("Content-type: text/html; charset=utf-8"); 

require_once 'RedisCmnCache.php';
try {
    $VISITOR_TIMES_KEY = 'fen_visitor_times';
    $cmnCache = new RedisCmnCache();

    $visitorTimes = $cmnCache->get($VISITOR_TIMES_KEY);
    if ($visitorTimes) {
        $cmnCache->set($VISITOR_TIMES_KEY, ++$visitorTimes);
    } else {
        $cmnCache->set($VISITOR_TIMES_KEY, 1);
    }
    echo responseData($visitorTimes);
} catch(Exception $e){
    echo responseData($e->getTrace(), $e->getCode(), $e->getMessage());
}

function responseData($data = array(), $code = 20000, $message = 'success'){
    $res = array(
        'code' => $code,
        'msg' => $message,
        'data' => $data
    );
    return json_encode($res);
}
?>
