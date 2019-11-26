@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="mb-0">User</h4>

        </div>
        @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div style="color:red; font-size:14px;">{{$error}}</div>
     @endforeach
 @endif
        <form class="form form-vertical" method="POST" action="{{ route('User.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                <div class="form-group row">
                <label class="control-label col-sm-4 text-right font-weight-bold" for="name">Name</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="name" type="text" class="form-control input-sm" value=""
                                   placeholder="Name" require>
                                         
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                    <label class="control-label col-sm-4 text-right font-weight-bold" for="email">Email</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="email" type="email" class="form-control input-sm" value=""
                                   placeholder="Email" require>
                                            
                        </div>
                    </div>
                    <hr>
                    
                    <div class="form-group row">
                    <label class="control-label col-sm-4 text-right font-weight-bold" for="password">Password</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="password" type="password" class="form-control input-sm" value=""
                                   placeholder="password" require>
                       
                        </div>
                    </div>

                    <hr>
                  
                    <div class="form-group row">
                    <label class="control-label col-sm-4 text-right font-weight-bold" for="confirm password">Confirm Password</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="password_confirmation" type="password" class="form-control input-sm" value=""
                                   placeholder="confirm Password" require>
                        </div>
                    </div>

                   


                </div>
            </div>
            <div class="card-footer mb-3">
                <div class="pull-right">

                <button type="reset" class="btn btn-warning btn-xs text-white">Cancel</button>
                &nbsp;&nbsp;&nbsp;
                   <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</button>
                   
                </div>
            </div>
        </form>
    </div>












@endsection