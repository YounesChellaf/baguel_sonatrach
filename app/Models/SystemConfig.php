<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model{
  protected $guarded = [];

  public static function config($config_key = null){
    if($config_key){
      $config = SystemConfig::where('config_key', $config_key)->first();
      if($config){
        return $config->config_value;
      }else{
        return '';
      }
    }else{
      return '';
    }
  }

  public static function isNewConfig($config_key = null){
    if($config_key){
      $config = SystemConfig::where('config_key', $config_key);
      if($config->count() == 1){
        return false;
      }else{
        return true;
      }
    }else{
      return false;
    }
  }

  public static function edit($config_key = null, $config_value = null){
    if($config_key && $config_value){
      $config = SystemConfig::where('config_key', $config_key)->first();
      $config->config_value = $config_value;
      $config->save();
    }
  }

  public static function store($request){
    if($request->post()){
      $post = $request->post();
      unset($post['_token']);
      foreach ($post as $config_key => $config_value){
        if(SystemConfig::isNewConfig($config_key)){
          SystemConfig::create([
            'config_key' => $config_key,
            'config_value' => $config_value,
          ]);
        }else{
          SystemConfig::edit($config_key,$config_value);
        }
      }
    }
  }
}
