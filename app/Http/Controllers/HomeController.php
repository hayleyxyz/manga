<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 02/06/2015
 * Time: 22:29
 */

namespace App\Http\Controllers;


class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function home() {
        return view('home');
    }

}