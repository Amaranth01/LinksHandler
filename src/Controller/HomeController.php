<?php

namespace App\Controller;

use RedBeanPHP\R;

class HomeController extends AbstractController
{
    public function index() {
        $this->render("home/allLinks", [
            'link' => R::findAll('link', $_SESSION['user']->id),
        ]);
    }

    public function pageAddLinks() {
        $this->render('project/links');
    }
}