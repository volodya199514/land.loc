<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Service;


class ServicesAddController extends Controller
{
    //
    public function execute(Request $request){

        if($request->isMethod('POST')){
            $input = $request->except('_token');

            $messages = [
              'required'=> 'Поле :attribute обовязкове для заповнення' ,
                'unique' => 'Поле :attribute повинно бути унікальним'
            ];

           $validator = Validator::make($input, [
                'name'=>'required|max:255|unique:services',
                'text'=>'required',
            ], $messages);


            if($validator->fails()){
                return redirect()->route('servicesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('icon')){
                $file=$request->file('icon');

                $input['icon'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img/', $input['icon']);
            }

            $service = new Service();

            $service->fill($input);

            if($service->save()){
                return redirect('admin')->with('status', 'Новий сервіс доданий');
            }


        }

        $data = [
            'title'=>'Додавання сервісу',

        ];
        return view('admin.service_add', $data);
    }

}
