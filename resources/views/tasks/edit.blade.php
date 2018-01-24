@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tabbable" id="tabs-471439">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#panel-865702" data-toggle="tab">Edycja Zadania</a>
                                        </li>
                                        <li>
                                            <a href="#panel-95388" data-toggle="tab">Odbiorcy</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="panel-865702">
                                            <p>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Edycja Zadania</div>
                                                <div class="panel-body">
                                                <form class="form-horizontal" method="POST" action="{{action('TaskController@update',  $task->id)}}">
                                                    {{ csrf_field() }}

                                                    <input name="_method" type="hidden" value="PATCH">

                                                    @include('includes.task_form')                     
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
                                            </p>
                                        </div>
                                        <div class="tab-pane" id="panel-95388">
                                            <p>
                                            <div class="tab-pane active" id="panel-865702">
                                                <p>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Odbiorcy</div>
                                                    <div class="panel-body">
                                                        <p><small>Poniżej znajduje się próbka 10 wiadomości tego zadania. Aby zobaczyć zmiany należy najpierw zapisać zmiany. Wiadomości zaznaczone na czerwono nie zostaną wysłane.</small></p>    
                                                        <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 30px"></th>
                                                                <th>Id</th>
                                                                <th>Imię i nazwisko</th>
                                                                <th>Telefon</th>  
                                                                <th style="width: 50%">Wiadomość</th>                                     
                                                            </tr>
                                                        </thead>
                                                        <tbody>  
                                                            @foreach ($recipients as $recipient)
                                                            <tr>
                                                                <td>
                                                                    <?php if(!$recipient['validation']['phone'] || !$recipient['validation']['message']){ ?>
                                                                        <i class="fa fa-heartbeat" aria-hidden="true" style='color:red;'></i>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>{{$recipient['userId']}}</td>
                                                                <td>{{$recipient['userName']}}</td>
                                                                <td <?php if(!$recipient['validation']['phone']) { echo " style='color:red;font-weight:bold'"; } ?>>{{$recipient['phoneNumber']}}</td>
                                                                <td <?php if(!$recipient['validation']['message']) { echo " style='color:red;font-weight:bold'"; } ?>>{{$recipient['message']}}</td>
                                                            </tr>    
                                                            @endforeach
                                                        </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                                </p>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                            
 
    </div>
</div>
@endsection
