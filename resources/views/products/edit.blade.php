@extends('layouts.layout2')
@section('title', 'Edit')
@section('window-title', 'Create')

@section('content')
    <form action="{{ url('products', $product->id) }}" method="POST">
        @csrf
        <div class="field-row-stacked" style="width: 200px">
            <label for="text27">Name:</label>
            <input id="text27" type="text" name="name" value="{{ $product->name }}" required />
        </div>

        <div class="field-row-stacked" style="width: 200px">
            <label for="text29">Description:</label>
            <textarea id="text29" rows="4" name="description"required>{{ $product->description }}</textarea>
        </div>

        <button type="submit" style="margin-top: 10px;">Update</button>
    </form>
@endsection
