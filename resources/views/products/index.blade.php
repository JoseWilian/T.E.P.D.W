@extends('layouts.layout')
@section('title', 'All fruits')

@section('content')
    <ul role="listbox" class="has-shadow has-hover">
        @foreach ($products as $product)
            <li role="option" data-id="{{ $product->id }}">{{ $product->name }}</li>
        @endforeach
    </ul>
@endsection
