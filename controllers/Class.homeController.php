<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 28.09.2016
 * Time: 14:21
 */


class homeController extends Controller {

    public function home(){
        if ($this->getActiveUser()) {
            $this->redirect('showuser', 'showuser');
            exit;
        }
    }

}