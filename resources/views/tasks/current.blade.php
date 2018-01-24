@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dzisiejsze Zadania
                </div>

                <div class="panel-body">
                    @if (!$tasks)
                       <p>Nie znaleziono wiadomości do wysłania na dzisiaj</p> 
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30px"></th>
                                    <th>Id</th>
                                    <th>Zadanie</th>
                                    <th>Tryb wysyłki</th>
                                    <th>Id Odbiorcy</th>  
                                    <th>Odbiorca</th>  
                                    <th>Telefon</th>                                     
                                    <th style='width:25%'>Wiadomość</th>       
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                        <?php if(!$task['validation']['phone'] || !$task['validation']['message']) { ?>
                                            <i class="fa fa-heartbeat" aria-hidden="true" style='color:red;'></i>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    {{$task['taskId']}} 
                                    </td>                                    
                                    <td>
                                    {{$task['taskName']}}
                                    </td>
                                    <td>
                                    {{$task['dateFormated']}}
                                    </td>
                                    <td>
                                    {{$task['userId']}}
                                    </td>
                                    <td>
                                    {{$task['userName']}}
                                    </td>                                    
                                    <td <?php if(!$task['validation']['phone']) { echo " style='color:red;font-weight:bold'"; } ?> >
                                    {{$task['phoneNumber']}}
                                    </td>
                                    <td <?php if(!$task['validation']['message']) { echo " style='color:red;font-weight:bold'"; } ?>>
                                    {{$task['message']}}
                                    </td>
                                </tr>    
                            @endforeach
                            </tbody>
                        </table>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection