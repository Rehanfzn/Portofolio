@extends('layouts.app')

@section('content')
    <x-hero :profile="$profile" />
    <x-about :profile="$profile" />
    <x-experience :experience="$experience" />
    <x-skills :skills="$skills" />
    <x-projects :projects="$projects" />
    <x-certificates :certificates="$certificates" />
    <x-contact :profile="$profile" :social="$social" />
@endsection
