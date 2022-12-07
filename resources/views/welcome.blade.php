@extends('layouts.maintemp')

@section('title', $title)

@section('content')


@php
    $i = 0;
@endphp
@if ($i == 0)
<script src="js/main.js" type="module"></script>
@endif

@endsection