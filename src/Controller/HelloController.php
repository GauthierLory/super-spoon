<?php
namespace App\Controller;
use App\Http\Request;


class HelloController {
    public function hello(Request $request) {
        $name = $request->getParam('name') ?? "World";
        $response = new \App\Http\Response(200, "Hello $name");

        return $response;
    }
}