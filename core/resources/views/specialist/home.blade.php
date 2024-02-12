@extends('specialist.layouts.master')
@section('title', Helper::GeneralSiteSettings('site_title_' . @Helper::currentLanguage()->code))
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css" />
@endpush
@section('content')


@endsection
