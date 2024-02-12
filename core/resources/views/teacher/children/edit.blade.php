@extends('teacher.layouts.master')
@section('title',__('teacher.childrens') )
@push('css')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
<style type="text/css">
    .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: white !important;
    background-color: #0d6efd;
    padding: 0.2rem;
    }
</style> --}}

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fileinput/css/fileinput.min.css') }}">

@endpush
@section('content')
    <div class="padding">
        <div class="box">
            {{-- breadcrm --}}
            <div class="box-header dker">
                <h3><i class="fa fa-plus"></i>{{ __('backend.add') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="{{ route('childrens.index') }}">{{ __('teacher.childrens') }}</a> /
                    <a href="">{{ __('backend.add') }}</a>
                </small>
            </div>

            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{ route('childrens.index') }}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- breadcrm --}}

            <div class="box-body">
                <form class="form" action="{{ route('childrens.update',$children->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name_ar">{{ __('teacher.childname-ar') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="{{ __('teacher.childname-ar') }}"
                                           name="name_ar"
                                           value="{{ old('name_ar',$children->name_ar) }}" >
                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name_en">{{ __('teacher.childname-en') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="{{ __('teacher.childname-en') }}"
                                           name="name_en"
                                           value="{{ old('name_en',$children->name_en) }}" >
                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{ __('teacher.childname') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="{{ __('teacher.childname') }}"
                                           name="name"
                                           value="{{ old('name',$children->name) }}" >
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">{{ __('teacher.childage') }}</label>
                                    <input type="number" min="1"
                                           onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                           class="form-control"
                                           placeholder="{{ __('teacher.childage') }}"
                                           name="age"
                                           value="{{ old('age',$children->age) }}" />
                                    @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <fieldset  class="form-group">
                                    <label for="problem">{{ __('teacher.childproblem') }}</label>
                                    <textarea  name="problem" class="form-control" id="editor1" placeholder="{{ __('teacher.childproblem') }}">
                                        {!! old('problem',$children->problem) !!}
                                    </textarea>
                                    @error('problem')<span class="text-danger">{{ $message }}</span>@enderror
                                </fieldset>
                            </div>
                            {{-- <div class="col-md-6">
                                <fieldset  class="form-group">
                                    <label for="problem_ar">{{ __('teacher.childproblem-ar') }}</label>
                                    <textarea  name="problem_ar" class="form-control" id="editor1" placeholder="{{ __('teacher.childproblem-ar') }}">
                                        {!! old('problem_ar',$children->problem_ar) !!}
                                    </textarea>
                                    @error('problem_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset  class="form-group">
                                    <label for="description_en">{{ __('teacher.childproblem-en') }}</label>
                                    <textarea  name="problem_en" class="form-control" id="editor" placeholder="{{ __('teacher.childproblem-en') }}">
                                        {!! old('problem_en',$children->problem_en) !!}
                                    </textarea>
                                    @error('problem_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </fieldset>
                            </div> --}}
                        </div>
                        <div class="row pt-4">
                            <div class="col-12">
                                <label for="images">{{ __('teacher.attachment') }}</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="images[]" id="children-images" class="file-input-overview" multiple="multiple" accept="image/*,.pdf">
                                    @error('images.*')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row m-t-md  form-actions">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary m-t">
                                <i class="material-icons"> &#xe31b;</i> {!! __('backend.add') !!}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('js')
<script src="{{ asset('assets/fileinput/js/plugins/piexif.min.js') }}"></script>
<script src="{{ asset('assets/fileinput/js/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('assets/fileinput/js/fileinput.min.js') }}"></script>
{{-- <script src="{{ asset('assets/fileinput/themes/bs5/theme.min.js') }}"></script> --}}
<script>
$(function(){
    $("#children-images").fileinput({
        // theme: "bs5",
        maxFileCount: 5,
        // allowedFileTypes: ['pdf'],
        allowedFileExtensions: ['jpg', 'png', 'gif','jpeg','svg','pdf'],
        showCancel: true,
        showRemove: false,
        showUpload: false,
        overwriteInitial: false,
        initialPreview:
        [
            @if($children->media()->count() > 0)
                @foreach($children->media as $media)
                "{{ asset('uploads/children/' . $media->file_name) }}",
                @endforeach
            @endif
        ],
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
        initialPreviewConfig: [
            @if($children->media()->count() > 0)
                @foreach($children->media as $media)
                    {
                        @if($media->file_type === 'application/pdf')
                          type:"pdf",
                        @endif
                        caption: "{{ $media->file_name }}",
                        size: '{{ $media->file_size }}',
                        width: "120px",
                        url: "{{ route('childrens.remove_image', ['image_id' => $media->id, 'children_id' => $children->id, '_token' => csrf_token()]) }}",
                        key: {{ $media->id }}
                    },
                @endforeach
            @endif
        ]
    }).on('filesorted', function (event, params) {
        console.log(params.previewId, params.oldIndex, params.newIndex, params.stack);
    });
});
</script>

    {{-- <script
    src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
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
    </script> --}}
@endpush
{{--  --}}
