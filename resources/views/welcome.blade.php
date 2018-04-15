@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body ">
                    <div class="form-group">
                    {!! Form::open(array('url'=>route('queue.store'))) !!}
                        <div class="form-group">
                    {!! Form::label('Priority') !!}
                    {!! Form::select('prio',array(
                             1=>'Non Priority',
                             0=>'Priority'
                    ),null,array('class'=>'form-control')) !!}
                            </div>
                    {!! Form::submit('Next',array('class'=>'btn btn-success')) !!}
                    {!! Form::close() !!}
                    </div>
                    {!! Form::open(array('url'=>route('reset'))) !!}
                         {!! Form::token() !!}
                         {!! Form::submit('Reset',array('class'=>'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
