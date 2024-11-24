@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-11"><h1>Produtos</h1></div>
    </div>
    <div class="col-1"><button class="btn btn-success">Adicionar</button></div>
@stop

@section('content')
    <x-product-list :products="$products" />
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop


