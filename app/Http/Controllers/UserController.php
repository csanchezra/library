<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ValidateCreateUser;
use DataTables;


class UserController extends Controller
{

  public function index(Request $request)
      {
          if ($request->ajax()) {
              $data = User::select('*');
              return Datatables::of($data)
                      ->addIndexColumn()
                      ->addColumn('action', function($row){

                             $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                              return $btn;
                      })
                      ->rawColumns(['action'])
                      ->make(true);
          }

          // echo "<pre>";print_r($data);die();

          return view('users.users');
      }

  public function create()
  {
    return view("users.create");
  }

  public function store(ValidateCreateUser $request)
  {
    // echo "<pre>";print_r($request->all());
    // die();
    $validator = $request->validated();
    if($validator)
    {
      $data_insert = $request->all();
      $simple_password = $data_insert['password'];
      unset($data_insert['password']);
      $data_insert['password'] = Hash::make($simple_password);
      User::create($data_insert);
      return redirect()->route('home');
    }
    else
    {
      return Redirect::route('home')->withErrors($validator)->withInput();
    }
  }


}
