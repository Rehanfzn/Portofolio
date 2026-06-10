@extends('layouts.app')

@section('content')
    <x-hero :profile="$profile" :hero_images="$hero_images" />
    <x-experience :experience="$experience" />
    <x-projects :projects="$projects" />
    <x-skills :skills="$skills" />
    <x-about :profile="$profile" :social="$social" />
@endsection
