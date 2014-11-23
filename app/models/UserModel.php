<?php
/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 23:19
 */

class UserModel extends Model{

    public function kullanicilar(){
        return [['isim'=>'ali'],['isim'=>'murat'],['isim'=>'fevzi']];
    }
}