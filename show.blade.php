@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover table-responsive table-condensed" >
                    <thead>
                    <tr>

                        <th>home_team</th>
                        <th>home_score</th>
                        <th>away_score</th>
                        <th>away_team</th>
                        <th>player</th>
                        <th>status</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td>{{ $game ->hteam}}</td>
                        <td>{{ $game  ->hscore}}</td>
                        <td>{{ $game  ->ascore}}</td>
                        <td>{{ $game  ->ateam}}</td>
                        <td>{{ $game  ->venue}}</td>
                        <td>{{ $game  ->player}}</td>
                        <td>{{ $game  ->status}}</td>
                    </tr>
                    </tbody>
                </table>
<p>$game->team</p>
            </div>
            <div class="col-md-4">  <!--Column right-->
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created at:</dt>
                        <dd>{{ $game->created_at->format('F d, Y')}}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Updated at:</dt>
                        <dd>{{$game->updated_at->format('F d, Y')}}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!!Html::linkroute('test.edit','Edit', array($game->game_id), array('class'=>"btn btn-primary btn-block"))!!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open (['route'=>['test.destroy' , $game->game_id],'method'=>'DELETE']) !!}
                            {!! Form::submit ('Delete', ['class'=>"btn btn-primaryt btn-block"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div><!-end of well>
                </div><!--Column right-->
                <div class="col-md-12">
                    {!!Html::linkroute('test.index','back', array($game->game_id), array('class'=>"btn btn-default btn-block"))!!}
                </div>
            </div>
        </div>
    </div><!--Column right-->
@endsection
