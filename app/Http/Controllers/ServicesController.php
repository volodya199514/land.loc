<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{
    public function execute(){

        $service = Service::all();

        $data = [
            'title'=>'Сервіси',
            'services'=>$service
        ];

        return view('admin.services', $data);
    }
}
