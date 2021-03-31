@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Categoria</h2>
            </div>
            <div style="margin-left: 100%;">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
   
    <div class="row">
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marca :</strong>
                {{ $categorie->categorie }}
            </div>
        </div>
    </div>
    </div>
@endsection