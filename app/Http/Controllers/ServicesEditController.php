<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;

class ServicesEditController extends Controller
{
    public function execute(Service $services, Request $request){

        if($request->isMethod('DELETE')){
            if($services->delete()){
                return redirect('admin')->with('status', 'Сервіс видалений');
            }

        }

        if($request->isMethod('POST')){

            $input= $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обовязкове для використання',
                'max' => 'Кількість символів в полі :attribute не повинно перевищувати :max',
                'unique'=>'Поле :attribute повинно бути унікальним',

            ];

           $validator = Validator::make($input, [
                'name'=>'required|max:20|unique:services,name,'.$services->id,
                'text'=>'required',
            ], $messages);

            if($validator->fails()){
                return redirect()->route('servicesEdit', ['service'=>$services->id])->withErrors($validator);
            }

            $services->fill($input);

            if($services->update()){
                return redirect('admin')->with('status', 'Сервіс відредаговано');
            }



        }

        $data = [
            'title'=>'Редагування сервісів',
            'services'=> $services
        ];

        return view('admin.services_edit', $data);
    }
}



