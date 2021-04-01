@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Categorias</h2>
        </div>
        <div style="margin-left:100%">
            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categorias:</strong>
                <input type="text" name="categoria" class="form-control" placeholder="Marca">
            </div>
        </div>
      
        <div class="p-3 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
   
</form>
</div>
@endsection