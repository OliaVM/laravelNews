@extends('main')


@section('header')
	@parent
@endsection


@section('navbar')
	@parent
@endsection

@section('content')
	@include('layouts.news.' . $name)
@endsection


@section('footer')
	@parent
@endsection