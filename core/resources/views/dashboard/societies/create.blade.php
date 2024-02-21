@extends('dashboard.layouts.master')
@section('title',__('backend.societies') )
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="fa fa-plus"></i>{{ __('backend.add') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="">{{ __('backend.societies') }}</a> /
                    <a href="">{{ __('backend.add') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("societies")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['societiesStore'],'method'=>'POST' ])}}

                <div class="form-group row">
                    <label for="role" class="col-sm-2 form-control-label">{{ __('backend.questionAR') }}</label>
                    <div class="col-sm-10">
                        {!! Form::text('question_ar','', array('placeholder' => '','class' => 'form-control','id'=>'question_ar')) !!}
                        @if ($errors->has('question_ar'))
                            <div class="text-danger">{{ $errors->first('question_ar') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-sm-2 form-control-label">{{ __('backend.questionEN') }}</label>
                    <div class="col-sm-10">
                        {!! Form::text('question_en','', array('placeholder' => '','class' => 'form-control','id'=>'question_en')) !!}
                        @if ($errors->has('question_en'))
                            <div class="text-danger">{{ $errors->first('question_en') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="link_status"
                           class="col-sm-2 form-control-label">{!!  __('backend.status') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','1',true, array('id' => 'status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ __('backend.active') }}
                            </label>
                            &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','0',false, array('id' => 'status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ __('backend.notActive') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row m-t-md">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! __('backend.add') !!}</button>
                        <a href="{{route("roles")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! __('backend.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
