<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Page;

class PagesAddController extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('POST')){
            $input = $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обовязкове до заповнення',
                'unique'=>'Поле :attribute повинно бути унікальним',
            ];

            $validator = Validator::make($input,[
               'name'=>'required|max:255',
                'alias' => 'required|unique:pages|max:255',
                'text'=>'required',
            ],$messages);

            if($validator->fails()){
             return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')){
                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);
            }

            $page = new Page();
            $page->fill($input);

            if($page->save()){
                return redirect('admin')->with('status', 'Сторінка добавлена');
            }

        }

        if(view()->exists('admin.pages_add')){
            $data = [
                'title'=>'Нова сторінка'
            ];
            return view('admin.pages_add', $data);
        }

        abort(404);

    }
}
