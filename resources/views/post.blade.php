<?php
/** @var \App\Models\Post $post */ ?>

@extends('layout')

@section('content')
    <h1>{{ $post->body }}</h1>
@endsection
