<?php

namespace App\Http\Controllers\CKFinder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psr\Container\ContainerInterface;

class CKFinderController extends \CKSource\CKFinderBridge\Controller\CKFinderController
{
    public function browserAction(ContainerInterface $container, Request $request)
    {
        return view('ckfinder::browser');
    }
}