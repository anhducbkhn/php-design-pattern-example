<?php
/**
 * Created by PhpStorm.
 * User: AnhDuc
 * Date: 6/19/16
 * Time: 2:39 PM
 */

class SingletonBoss
{

    private static $boss = null;
    private static $isCreated = false;


    /**
     * SingletonBoss constructor.
     */
    private function __construct()
    {
    }

    public static function getBoss()
    {
        if (false == self::$isCreated) {

            if (null == self::$boss) {
                self::$boss = new SingletonBoss();
            }

            self::$isCreated = true;
        }

        return self::$boss;
    }
}

$boss1 = SingletonBoss::getBoss();
$boss2 = SingletonBoss::getBoss();

if ($boss1 === $boss2) {
    echo 'Same boss';
} else {
    echo 'different boss';
}

