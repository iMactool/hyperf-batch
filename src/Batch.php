<?php 
declare(strict_types=1);

namespace Ylnwqm\HyperfBatch;
class Batch
{
    private static $instance = null;
    public function __call($method, $parameters){
        return call_user_func_array([(new BatchAction),$method],$parameters);
    }

    public static function __callStatic($method, $parameters)
    {
        if (is_null(self::$instance)) {
            self::$instance = new BatchAction();
            call_user_func_array([self::$instance, $method], $parameters);
        } else {
            return call_user_func_array([(new BatchAction), $method], $parameters);
        }
    }
}