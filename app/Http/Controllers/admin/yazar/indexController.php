<?php

namespace App\Http\Controllers\admin\yazar;

use App\Helper\mHelper;
use App\Yazarlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\imageUpload;
use File;
class indexController extends Controller
{
    public function index()
    {
        $data = Yazarlar::paginate(10);
        return view('admin.yazar.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.yazar.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1,9000),"yazar",$request->file('image'));

        $insert = Yazarlar::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Yazar Eklendi');
        }
        else
        {
            return redirect()->back()->with('status','Yazar Eklenemedi');
        }
    }

    public function edit($id)
    {
        $c = Yazarlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $data = Yazarlar::where('id','=',$id)->get();
            return view('admin.yazar.edit',['data'=>$data]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Yazarlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $data = Yazarlar::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,900),"yazar",$request->file('image'),$data,"image");
            $update = Yazarlar::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','Yazar Başarı ile düzenlendi');
            }
            else
            {
                return redirect()->back()->with('status','Yazar Düzenlenemedi');
            }
        }
        else
        {
            return redirect('/');
        }
    }



    public function delete($id)
    {

        $c = Yazarlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $w = Yazarlar::where('id','=',$id)->get();
            File::delete('public/'.$w[0]['image']);
            Yazarlar::where('id','=',$id)->delete();
            return redirect()->back();

        }
        else
        {
            return redirect('/');
        }
    }
}
