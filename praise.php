<?php
header("Content-type: application/json; charset=utf-8");

require_once 'RedisCmnCache.php';
try {
    $PRAISE_TIMES_KEY = 'fen_praise_times';
    $cmnCache = new RedisCmnCache();

    $praiseTimes = $cmnCache->get($PRAISE_TIMES_KEY);
    if ($praiseTimes) {
        $cmnCache->set($PRAISE_TIMES_KEY, ++$praiseTimes);
    } else {
        $cmnCache->set($PRAISE_TIMES_KEY, 1);
    }
    echo responseData(array('praise' => $praiseTimes));
} catch(Exception $e){
    echo responseData($e->getPrevious(), $e->getCode(), $e->getMessage());
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
