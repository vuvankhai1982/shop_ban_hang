@extends('admin.layout.admin_layout')
@section('content')
    @foreach($categories as $category)
        {{ $category->name }}
    @endforeach
@endsection
