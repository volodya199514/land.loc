<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Validator;

class PortfolioAddController extends Controller
{
    //
    public function execute(Request $request){

        if($request->isMethod('Post')){
            $input = $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обовязкове',
                'max'=>'Кількість символів в полі :attribute не повинна перевищувати :max',
                'unique'=>'Поле :attribute повинне бути унікальним'
            ];

            $validator = Validator::make($input, [
                'name'=>'required|max:100|unique:portfolios',
                'filter'=>'required|max:100',
            ], $messages);

            if($validator->fails()){
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')){
                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img/', $input['images']);
            }

            $portfolio = new Portfolio();
            $portfolio->fill($input);

            if($portfolio->save()){
                return redirect('admin')->with('status','Портфоліо додане');
            }

        }

        if(view()->exists('admin.portfolio_add')){

            $data = [
                'title'=>'Нове портфоліо',
            ];

            return view('admin.portfolio_add', $data);
        }

    }
}
