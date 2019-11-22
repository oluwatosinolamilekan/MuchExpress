@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <resto-group :restos="{{json_encode($resto) }}"></resto-group>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <menu-contanier :items="{{json_encode($menus) }}" :resto-id={{$restoId}}></menu-contanier>
        </div>
    </div>
</div>
@endsection
