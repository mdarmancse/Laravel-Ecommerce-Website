@extends('Layout.app')

@section('title','Home')

@section('content')
    @include('Components.HomeBanner')
    @include('Components.TopCatagory')
    @include('Components.NewArrival')
    @include('Components.HomeOffer')
    @include('Components.HomeTestimonial')



@endsection
