@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
         
            <div  style="margin-left:85%">
                <a class="btn btn-success" href="{{ route('categories.create') }}">Cadastrar Categoria</a>
            </div>
        </div>
    </div>
   
 
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Categoria</th>
          
            <th width="280px">Ação</th>
        </tr>
        @foreach ($categories as $categorie)
        <tr>
            <td>{{  $categorie->id }}</td>
            <td>{{ $categorie->categorie }}</td>
           
            <td>
                <form action="{{ route('categories.destroy',$categorie->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('categories.show',$categorie->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('categories.edit',$categorie->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $categories->links() !!}
      
@endsection