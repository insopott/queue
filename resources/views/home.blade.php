@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Regular</div>

                <div class="panel-body center-block">
                   <center>

                       <p>Counter {!! $num !!}</p>
                       @if($qnum!=0)
                        <p>Now Serving {!! $qnum !!} {!! $prio !!}</p>
                       @endif
                    {!! Form::open(array('method'=>route('counter.store'))) !!}
                        {!! Form::token() !!}
                        {!! Form::select('prio'
                            ,array(
                                    'Non Prio'
                                    ,'Priority'
                                )
                            ,null
                            ,array('class'=>'form form-control')
                         )!!}
                        {!! Form::submit('Next',array('class'=>'btn btn-success')) !!}
                    {!! Form::close() !!}
                    @if($err==null)
                        <div>
                            {{$err}}
                        </div>
                    @endif                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

