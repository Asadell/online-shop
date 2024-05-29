<?php
namespace App\Config;
use App\Core\DotEnv;

class Config{
  public static function load(){
    (new DotEnv(__DIR__.'../../.env'))->load();
    define('BASEURL', getenv('BASEURL'));
  }
}