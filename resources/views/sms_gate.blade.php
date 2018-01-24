@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bramka SMS</div>

                <div class="panel-body">
                    
                    <form class="form-horizontal" method="POST" action="{{action('SMSGateController@store')}}">
                        
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('phones') ? ' has-error' : '' }}">
                            <label for="phones" class="col-md-4 control-label">Numery telefonów</label>
                            <div class="col-md-6">
                                <input id="phones" type="text" class="form-control" name="phones" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                Numery telefonów przedzielaj przecinkami.
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Treść</label>
                            <div class="col-md-6">
                                <textarea id="message" name="message" class="form-control" style="min-height:200px"></textarea> 
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                                Maksymalnie 160 znaków.
                            </div>
                        </div> 
                        
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Wyślij
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
