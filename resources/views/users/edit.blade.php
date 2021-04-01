@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Usuário</h2>
            </div>
            <div style="margin-left: 100%;">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
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
  
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nome:">
                </div>
            </div>
            
            <div class="p-3 col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input class="form-control" value="{{ $user->email }}"  name="email" placeholder="Email">
                </div>
            </div>
          
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nível:</strong>
                    <select class="form-control" name="nivel">
                    <option value="{{ $user->nivel }}">{{ $user->nivel }}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                   
                    </select>
                </div>
            </div>
           
            <div class="p-3 col-xs-12 col-sm-12 col-md-12 text-center">
            <br>
              <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>
   
    </form>
    </div>
@endsection