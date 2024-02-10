@extends('dashboard.layouts.master')
@section('title',__('backend.roles') )
@section('content')
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
/>
<link
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
rel="stylesheet"
/>
</head>
<style type="text/css">
.bootstrap-tagsinput .tag {
margin-right: 2px;
color: white !important;
background-color: #0d6efd;
padding: 0.2rem;
}
</style>
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="fa fa-plus"></i>{{ __('backend.add') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="">{{ __('backend.roles') }}</a> /
                    <a href="">{{ __('backend.add') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("roles")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['rolesStore'],'method'=>'POST' ])}}

                <div class="form-group row">
                    <label for="role" class="col-sm-2 form-control-label">{{ __('backend.role') }}</label>
                    <div class="col-sm-10">
                        {!! Form::text('role','', array('placeholder' => '','class' => 'form-control','id'=>'role')) !!}
                        @if ($errors->has('role'))
                            <div class="text-danger">{{ $errors->first('role') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permissions" class="col-sm-2 form-control-label">{{ __('backend.permissions') }}</label>
                    <div class="col-sm-10">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label class="ui-check">
                                        {!! Form::checkbox('permissions[]', '1' ,false, array('id' => 'vbMap')) !!}
                                        <i class="dark-white"></i><label
                                            for="vbMap">{{ __('backend.vbMap') }}</label>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label class="ui-check">
                                        {!! Form::checkbox('permissions[]', '2' ,false, array('id' => 'Status')) !!}
                                        <i class="dark-white"></i><label
                                            for="Status">{{ __('backend.Status') }}</label>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label class="ui-check">
                                        {!! Form::checkbox('permissions[]', '3' ,false, array('id' => 'Session')) !!}
                                        <i class="dark-white"></i><label
                                            for="Session">{{ __('backend.Session') }}</label>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label class="ui-check">
                                        {!! Form::checkbox('permissions[]', '4' ,false, array('id' => 'Consulting')) !!}
                                        <i class="dark-white"></i><label
                                            for="Consulting">{{ __('backend.Consulting') }}</label>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label class="ui-check">
                                        {!! Form::checkbox('permissions[]', '5' ,false, array('id' => 'Treatment')) !!}
                                        <i class="dark-white"></i><label
                                            for="Treatment">{{ __('backend.Treatment') }}</label>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label class="ui-check">
                                        {!! Form::checkbox('permissions[]', '6' ,false, array('id' => 'final')) !!}
                                        <i class="dark-white"></i><label
                                            for="final">{{ __('backend.final') }}</label>
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        @if ($errors->has('permissions'))
                            <div class="text-danger">{{ $errors->first('permissions') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row m-t-md">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! __('backend.add') !!}</button>
                        <a href="{{route("financial-transactions")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! __('backend.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script>
    $(function () {
      $('input')
        .on('change', function (event) {
          var $element = $(event.target);
          var $container = $element.closest('.example');

          if (!$element.data('tagsinput')) return;

          var val = $element.val();
          if (val === null) val = 'null';
          var items = $element.tagsinput('items');

          $('code', $('pre.val', $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $('code', $('pre.items', $container)).html(
            JSON.stringify($element.tagsinput('items'))
          );
        })
        .trigger('change');
    });
  </script>
<script>
    $(document).ready(function() {

$('input[name="advantages"]').tagsinput({
    trimValue: true,
    confirmKeys: [13, 44, 32],
    focusClass: 'my-focus-class'
});

$('.bootstrap-tagsinput input').on('focus', function() {
    $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
}).on('blur', function() {
    $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
});

});
</script>
@endsection
