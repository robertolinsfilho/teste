@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="margin-left:84%">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Criar Novo Produto</a>
            </div>
        </div>
    </div>
   <br>

  
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DETALHES</th>
            <th width="280px">AÇÃO</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $products->links() !!}
      
@endsection 