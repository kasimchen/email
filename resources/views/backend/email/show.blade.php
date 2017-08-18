@extends ('backend.layouts.app')

@section ('title','邮件列表')

@section('after-styles')

@stop

@section('page-header')

@endsection

@section('content')

{!! $data->textHtml !!}

@stop

@section('after-scripts')



@stop
