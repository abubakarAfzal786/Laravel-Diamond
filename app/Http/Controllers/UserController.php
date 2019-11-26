<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=User::orderBy('id','desc')->paginate(10);
        return view('pages.User.index')->with('user',$user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.User.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            // Names In Form
            'email.required' => 'This Field is Required',
            'name.required' => 'This Field is Required',
            'password.required' => 'This Field is Required', 
        
            
    
            );
            $rules = array(
                'email' => 'unique:users,email',
                'name' => 'required',
                'password' => 'required|confirmed',
            
            );
            $validator = \Validator::make($request->all(), $rules , $messages);
            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator);
            }
     else
     {
        $user=new User();
        $user->name=request('name');
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
        $user->save();
        return redirect('User');
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id',$id);
        return view('pages.User.edit')->with('user',$user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = array(
            // Names In Form
            'email.required' => 'This Field is Required',
            'name.required' => 'This Field is Required',
            'password.required' => 'This Field is Required', 
        
            
    
            );
           if()
            $validator = \Validator::make($request->all(), $rules , $messages);
            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator);
            }
     else
     {
        $user=new User();
        $user->name=request('name');
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
        $user->save();
        return redirect('User');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
