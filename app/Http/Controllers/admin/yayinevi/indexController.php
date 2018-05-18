<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Helper\mHelper;
use App\YayinEvi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $data = YayinEvi::paginate(10);
        return view('admin.yayinevi.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.yayinevi.create');
    }

    public function store(Request $request)
    {

        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = YayinEvi::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Yayın Evi Başarı ile Eklendi');
        }
        else
        {
            return redirect()->back()->with('status','Yayın Evi Eklenemedi');
        }


    }

    public function edit($id)
    {
        $c = YayinEvi::where('id','=',$id)->count();
        if($c!=0) {
            $data = YayinEvi::where('id', '=', $id)->get();
            return view('admin.yayinevi.edit', ['data' => $data]);
        }
        else
        {
            return redirect('/');
        }
    }


    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = YayinEvi::where('id','=',$id)->count();
        if($c!=0)
        {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = YayinEvi::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','Yayın Evi Düzenlendi');
            }
            else
            {
                return redirect()->back()->with('status','Yayın Evi Düzenlenemedi');
            }
        }
        else
        {
            return redirect('/');
        }
    }



    public function delete($id)
    {
        $c = YayinEvi::where('id','=',$id)->count();
        if($c!=0)
        {
            $delete = YayinEvi::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    }
}
