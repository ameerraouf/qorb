
        {{-- <button class="btn btn-sm info" data-toggle="modal"
                data-target="#show-{{ $value->id }}" ui-toggle-class="bounce"
                ui-target="#animate" data-toggle="tooltip" data-original-title="{{ __('backend.showing') }}">
            <small><i class="material-icons">&#xe8f4;</i> {{ __('backend.showing') }}
            </small>
        </button> --}}

        <a class="btn btn-sm success"
            href="{{ route("childrens.edit",$child->id)}}">
            <small><i class="material-icons">&#xe3c9;</i> {{ __('backend.edit') }}</small>
        </a>
        {{-- @if (@Auth::user()->permissionsGroup->webmaster_status) --}}
            <button class="btn btn-sm warning" data-toggle="modal"
                    data-target="#delete-{{ $child->id }}" ui-toggle-class="bounce"
                    ui-target="#animate">
                <small><i class="material-icons">&#xe872;</i> {{ __('backend.delete') }}
                </small>
            </button>
        {{-- @endif --}}

  <!-- .modal -->
{{-- <div id="show-{{ $value->id }}" class="modal fade" data-backdrop="true">
    <div class="modal-dialog" id="animate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('backend.viewDetails') }} : <strong>[ {{ $value->title }} ]</strong></h5>
            </div>
            <div class="modal-body text-center p-lg">
                <ul class="list-group">
                    <li class="list-group-item active">{{ __('backend.advantages') }}</li>
                    <li class="list-group-item">
                    @php
                    $advantages = strtok($value->advantages, ",");

                    while ($advantages !== false)
                        {
                        echo '<span class="btn btn-xs btn-primary" style="margin:0px 5px">' . $advantages . '</span>';
                        $advantages = strtok(",");
                        }
                @endphp
                    </li>
                    <li class="list-group-item">{{ __('backend.price') }} : <strong>[ {{ $value->price }} ]</strong></li>
                    </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark-white p-x-md"
                        data-dismiss="modal">{{ __('backend.cancel') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div> --}}
<!-- / .modal -->


<!-- .modal delete-->
<div id="delete-{{ $child->id }}" class="modal fade" data-backdrop="true">
    <div class="modal-dialog" id="animate">
        <div class="modal-content">
            <form action="{{ route("childrens.destroy",$child->id)}}" class="my-1 my-xl-0" method="post" style="display: inline-block;" >
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                </div>
                <div class="modal-body text-center p-lg">
                    <p>
                        {{ __('backend.confirmationDeleteMsg') }}
                        <br>
                        {{-- <strong>[ {{ $value->title }} ]</strong> --}}
                        {{-- {{ $child->id }} --}}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark-white p-x-md"
                            data-dismiss="modal">{{ __('backend.no') }}
                    </button>
                    <button type="submit" class="btn danger p-x-md"> {{ __('backend.yes') }}</button>
                    {{-- <a href="{{ route("childrens.destroy",$child->id) }}"
                        class="btn danger p-x-md">{{ __('backend.yes') }}
                    </a> --}}
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- / .modal -->
