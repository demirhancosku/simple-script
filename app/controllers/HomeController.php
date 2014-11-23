<?php
/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 17:43
 */

class HomeController extends Controller{

    public function index()
    {
        //Model yaratmaya bir örnek
        $UserModel = new UserModel();


        $data = [
            'kullanicilar' => $UserModel->kullanicilar(),
            'baslik'  => "Bir günde yazıldım",
            'menu' => $this->view('welcome/menu')
        ];

        //Tema responseunu ekrana basmak pass ettiğimiz data render edilecek
        $this->view('layout',$data,true);

    }

    public function user($params)
    {
        echo 'Selam ben de user metoduyum. Bana gelen userID '.$params['id'];
    }

}