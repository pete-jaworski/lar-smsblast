@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edycja użytkownika</div>

                <div class="panel-body">
                    
                    <form class="form-horizontal" method="POST" action="{{action('UserController@update',  $user->id)}}">
                        
                        <input name="_method" type="hidden" value="PATCH">
                        
                        {{ csrf_field() }}

                        @include('includes.user_form')                     
 
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Zapisz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
