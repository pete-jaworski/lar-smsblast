@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Zadania
                </div>

                <div class="panel-body">
                    @if ($tasks->isEmpty())
                        <p>Nie znaleziono zadań</p>
                    @else
                        @include('includes.tasks_table')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection