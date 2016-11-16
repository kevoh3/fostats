@extends('layouts.master')
@section('stylesheet')
    {!! Html::style('css/select2.min.css')!!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6"><!--Column left-->

            <h4>create new event</h4>

            {!! Form::open (array('route' => 'game.store')) !!}


            {{form::label('hteam','home_team')}}
            <select class="form-control select2-multi" name="hteam[]" multiple="multiple">
                @foreach($teams as $data)
                    <option value="{{$data->team_id}}">
                        {{$data->team}}
                    </option>
                @endforeach
            </select>

            {{form::label('hscore','home_score')}}
            {{form::number('hscore',null, array('class'=>'form-control'))}}

            {{form::label('ascore','away_score')}}
            {{form::number('ascore',null, array('class'=>'form-control'))}}

            {{form::label('ateam','away_team')}}
            <select class="form-control select2-multi" name="ateam[]" multiple="multiple">
                @foreach($teams as $data)
                    <option value="{{$data->team_id}}">
                        {{$data->team}}
                    </option>
                @endforeach
            </select>


            {{form::label('hstarts','home starts')}}
            <select class="form-control select2-multi" name="hstarts[]" multiple="multiple">
                @foreach($players as $data)
                    <option value="{{$data->player_id}}">
                        {{$data->player}}
                    </option>
                @endforeach
            </select>

            {{form::label('hsubs','home subs')}}
            <select class="form-control select2-multi" name="hsubs[]" multiple="multiple">
                @foreach($players as $data)
                    <option value="{{$data->player_id}}">
                        {{$data->player}}
                    </option>
                @endforeach
            </select>
            {{form::label('astarts','Away starts')}}
            <select class="form-control select2-multi" name="astarts[]" multiple="multiple">
                @foreach($players as $data)
                    <option value="{{$data->player_id}}">
                        {{$data->player}}
                    </option>
                @endforeach
            </select>

            {{form::label('asubs','Away subs')}}
            <select class="form-control select2-multi" name="asubs[]" multiple="multiple">
                @foreach($players as $data)
                    <option value="{{$data->player_id}}">
                        {{$data->player}}
                    </option>
                @endforeach
            </select>

            {{form::label('status','status')}}
            <select class="form-control select2-multi" name="status">
                <option value="1"></option>
                <option value="2">FIFA</option>
                <option value="3">NON-FIFA</option>
            </select>
            <p></p>
            {{form::submit('save new event',['class'=>'btn btn-default btn-block'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection