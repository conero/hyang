<?php
/**
 * Auther: Joshua Conero
 * Date: 2018/6/28 0028 14:37
 * Email: brximl@163.com
 * Name: phar 解压
 */

namespace app\cmd;


use hyang\surong\cmd\Controller;
use sr\uPhar;

class Source extends Controller
{
    function Main(){
        $action = $this->action;
        if($action){
            $action = substr($action, -5) == '.phar'? $action : $action . '.phar';
            if(!is_file($action)){
                $pathName = './'. $action;
                if(is_file($pathName)){
                    $action = $pathName;
                }
            }
            if(is_file($action)){
                $this->unPhar($action);
            }
        }
    }
    function DefaultAction(){}
    function unPhar($path){
        if(is_file($path)){
            $phar = new \Phar($path);
            $phar->extractTo(uPhar::getNameByPath($path));
        }
    }
}