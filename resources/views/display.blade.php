@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Display</div>

                <div class="panel-body yes">
                    <div class="row yes">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h2>Regular</h2></div>

                                <div class="panel-body">
                                    <h2>Now Serving </h2>
                                    @if($d!=null)
                                        <h1> Costomer number:{!!$d->queue->number !!}</h1>
                                        <h1> at counter number {!!$d->counter_number !!}</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h2>Pregnant/Disabled/Senior Citizen</h2></div>

                                <div class="panel-body">
                                    <h2>Now Serving </h2>
                                    @if($d2!=null)
                                        <h1> Costomer number:{!!$d2->queue->number !!}</h1>
                                        <h1> at counter number {!!$d2->counter_number !!}</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

