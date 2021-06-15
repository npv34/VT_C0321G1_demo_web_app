<?php

namespace Src\Controller;

class HomeController extends Controller
{
    function showDashBoard()
    {
        include_once "view/dashboard.php";
    }
}