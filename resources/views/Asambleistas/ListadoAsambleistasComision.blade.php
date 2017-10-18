@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section("content")
    <div>
        @foreach($comisiones as $comision)
            <p>{{ $comision->nombre }}</p>
        @endforeach

            @foreach($asambleistas as $asambleista)
                {{ $asambleista->cargo }}
            @endforeach
    </div>
@endsection

@section("js")
    <script src="{{ asset('') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
        });
    </script>
@endsection