<?php

namespace swoft;

use swoft\base\ApplicationContext;
use swoft\base\RequestContext;
use swoft\circuit\CircuitBreakerManager;
use swoft\pool\ManagerPool;
use swoft\web\Application;

/**
 *
 *
 * @uses      Swf
 * @version   2017年04月25日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class Swf
{
    /**
     * @var Application
     */
    public static $app;

    /**
     * @return ManagerPool
     */
    public static function getMangerPool()
    {
        return ApplicationContext::getBean("managerPool");
    }

    /**
     * @return CircuitBreakerManager
     */
    public static function getCricuitBreakerManager(){
        return ApplicationContext::getBean('circuitBreakerManager');
    }

    public static function getMysqlPool()
    {
        return self::getMangerPool()->getPool("mysql");
    }

    public static function getRedisPool()
    {
        return self::getMangerPool()->getPool("redis");
    }

    /**
     * @return log\Logger
     */
    public static function getLogger()
    {
        return RequestContext::getLogger();
    }

    public static function trace($message, array $context = array())
    {

    }

    public static function error($message, array $context = array())
    {
        self::getLogger()->error($message, $context);
    }

    public static function info($message, array $context = array())
    {
        self::getLogger()->info($message, $context);
    }

    public static function warning($message, array $context = array())
    {
        self::getLogger()->warning($message, $context);
    }

    public static function debug($message, array $context = array())
    {
        self::getLogger()->debug($message, $context);
    }
}