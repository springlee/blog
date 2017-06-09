

@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>

    <form method="POST" action="{{ route('testPost') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="name" title="112"  value="{{old('name')}}">
        <input type="file" name="photo" title="112" >
        <input type="submit" value="提交" >
    </form>


    <div class="btn" id="ajax">ajax</div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{--count{{$count}} 只能用在自己的视图上--}}
@endsection
{{--<script src="/js/app.js"></script>--}}
{{--<script>--}}
    {{--$(function () {--}}
        {{--$.ajaxSetup({--}}
            {{--headers: {--}}
                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--}--}}
        {{--});--}}
        {{--$('#ajax').on('click',function () {--}}
            {{--$.post("{{ route('ajax.test')}}",function(data){--}}
                {{--alert(data);--}}
            {{--});--}}
        {{--})--}}
    {{--})--}}

{{--</script>--}}