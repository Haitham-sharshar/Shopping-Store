<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
{
    $data['users'] = User::count();
    $data['products'] = Product::count();
    return view('admin.layout.index',$data);
}
}
