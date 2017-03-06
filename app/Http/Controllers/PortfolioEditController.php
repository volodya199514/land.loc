<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Validator;

class PortfolioEditController extends Controller
{
    //

    public function execute(Portfolio $portfolio, Request $request){

        if($request->isMethod('DELETE')){
            if($portfolio->delete()){
                return redirect('admin')->with('status', 'Портфоліо видалене');
            }
        }

        if($request->isMethod('POST')){
            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'filter'=>'required|max:255',
                'name'=>'required|max:255|unique:portfolios,name, '.$input['id'],
            ]);

            if($validator->fails()){
                return redirect()->route('pagesEdit', ['page'=>$input['id']])->withErrors($validator);
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $file->move(public_path().'/assets/img', $file->getClientOriginalName());
                $input['images'] =  $file->getClientOriginalName();
            }else{
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $portfolio->fill($input);

            if($portfolio->update()){
                return redirect('admin')->with('status', 'Портфоліо обновлено');
            }
        }


        if(view()->exists('admin.portfolio_edit')){

            $data = [
                'title'=>'Редагування портфоліо',
                'portfolio'=>$portfolio,
            ];

            return view('admin.portfolio_edit', $data);

        }



    }
}
