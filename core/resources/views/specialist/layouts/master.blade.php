<!DOCTYPE html>
<html lang="{{ @Helper::currentLanguage()->code }}" dir="{{ @Helper::currentLanguage()->direction }}">
<head>
    @include('specialist.layouts.head')
</head>
<body>
<div class="app" id="app">
    @php( $webmailsNewCount= Helper::webmailsNewCount())
    @include('specialist.layouts.menu')

    <div id="content" class="app-content box-shadow-z0" role="main">
        @include('specialist.layouts.header')
        @include('specialist.layouts.footer')
        <div ui-view class="app-body" id="view">
            @include('specialist.layouts.errors')
            @yield('content')
        </div>
    </div>

    @include('specialist.layouts.settings')
</div>
@include('specialist.layouts.foot')
</body>
</html>
