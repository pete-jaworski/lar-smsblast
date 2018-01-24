@extends('layouts.app')

@section('title', 'Użytkownicy')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Użytkownicy
                </div>

                <div class="panel-body">
                    @if ($users->isEmpty())
                        <p>Nie znaleziono użytkowników</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Admin</th>
                                    <th>Imię i nazwisko</th>
                                    <th>Adres Email</th>    
                                    <th>Uprawnienia</th>                                    
                                    <th style="text-align:center" colspan="2">Operacje</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                    <?php 
                                        if($user->isAdmin()){
                                            echo "<i class='fa fa-diamond' aria-hidden='true'></i>";
                                        } 
                                    ?>    
                                    </td>                                    
                                    <td>
                                    {{$user->name}}
                                    </td>
                                    <td>
                                    {{$user->email}}
                                    </td>
                                    <td>
                                    @foreach ($user->roles as $role)
                                        <?php 
                                            if($role->id == 1){
                                                echo "<span class='label label-danger'>".$role->title."</span>";
                                            } else {
                                                echo "<span class='label label-primary'>".$role->title."</span>";
                                            }
                                        ?>                                        
                                    @endforeach
                                    </td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Usuń', ['class' => 'btn btn-sm btn-link pull-right']) !!}
                                    {!! Form::close() !!}  

                                    <a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-sm btn-primary pull-right">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edytuj
                                    </a>                                    
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