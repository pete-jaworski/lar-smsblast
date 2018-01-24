                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Status</th>
                                    <th>Typ</th>  
                                    <th>Nazwa</th>                                     
                                    <th>Realizacja</th>       
                                    <th>Autor</th>  
                                    <th>Baza danych</th>  
                                    <th style="text-align:center" colspan="2">Operacje</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                    {{$task->id}}
                                    </td>
                                    <td>
                                        <?php 
                                            if($task->status == 0){
                                                echo "<span class='label label-danger'>Nieaktywne</span>";
                                            } else {
                                                echo "<span class='label label-primary'>Aktywne</span>";
                                            }
                                        ?>                                           
                                    </td>
                                    <td>
                                    {{$task->type}}
                                    </td>
                                    <td>
                                    {{$task->name}}
                                    </td>
                                    <td>
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$task->convertDates()}}
                                    </td>
                                    <td>
                                    {{$task->user->name}}
                                    </td>
                                    <td>
                                    {{$task->datasource->name}}
                                    </td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Usuń', ['class' => 'btn btn-sm btn-link pull-right']) !!}
                                    {!! Form::close() !!}  

                                    <a href="{{action('TaskController@edit', $task['id'])}}" class="btn btn-sm btn-primary pull-right">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edytuj
                                    </a>                                          
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>