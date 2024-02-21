<!DOCTYPE html>
<html lang="{{ @Helper::currentLanguage()->code }}" dir="{{ @Helper::currentLanguage()->direction }}">
<head>
    @include('teacher.layouts.head')
    @stack('css')
</head>
<body>
    <div class="app" id="app">
        {{-- @php( $webmailsNewCount= Helper::webmailsNewCount()) --}}
        @include('teacher.layouts.menu')
        <div id="content" class="app-content box-shadow-z0" role="main">
            @include('teacher.layouts.header')
            @include('teacher.layouts.footer')
            <div ui-view class="app-body" id="view">
                @include('teacher.layouts.errors')
                @yield('content')
            </div>
        </div>
        @include('teacher.layouts.settings')
    </div>
    @include('teacher.layouts.foot')
    @stack('js')
</body>
</html>
