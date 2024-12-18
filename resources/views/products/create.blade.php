@extends('layouts.layout2')
@section('title', 'Create')
@section('window-title', 'Create')

@section('content')
    <form action="{{ url('products') }}" method="POST">
        @csrf
        <div class="field-row-stacked" style="width: 200px">
            <label for="text27">Name:</label>
            <input id="text27" type="text" name="name" placeholder="Name" required />
        </div>

        <div class="field-row-stacked" style="width: 200px">
            <label for="text29">Description:</label>
            <textarea id="text29" rows="2" name="description" placeholder="Description" required></textarea>
        </div>
        <button type="submit" style="margin-top: 10px;">Save</button>
    </form>
@endsection
