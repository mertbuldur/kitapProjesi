<?php

namespace App\Http\Controllers\admin\order;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $data = Order::paginate(10);
        return view('admin.order.index',['data'=>$data]);
    }

    public function detail($id)
    {
        $c = Order::where('id','=',$id)->count();
        if($c!=0)
        {
            $w = Order::where('id','=',$id)->get();
            return view('admin.order.detail',['data'=>$w]);
        }
        else
        {
            return redirect('/');
        }
    }
}
