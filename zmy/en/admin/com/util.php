<?php


class util
{
    /**
     * 获取当前时间
     *
     * @param string $length
     * @return string
     */
    static function getRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /**
     * 获取当前时间
     * @return string
     */
    static function  getCurDate()
    {
        $date3=date('YYYY_mm_dd_HH_ii_ss');
    }

}