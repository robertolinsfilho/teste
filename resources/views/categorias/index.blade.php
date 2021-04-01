@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
         
            <div  style="margin-left:84%">
                <a class="btn btn-success" href="{{ route('categorias.create') }}">Cadastrar Categoria</a>
            </div>
        </div>
    </div>
   
 
   
    <table  style="margin-top: 2%;" class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Categoria</th>
          
            <th width="280px">Ação</th>
        </tr>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{  $categoria->id }}</td>
            <td>{{ $categoria->categoria }}</td>
           
            <td>
                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('categorias.show',$categoria->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('categorias.edit',$categoria->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $categorias->links() !!}
      
@endsection