@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
         
            <div style="margin-left:87%">
                <a class="btn btn-success" href="{{ route('brands.create') }}"> Cadastrar Marca</a>
            </div>
        </div>
    </div>
   
 
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Marca</th>
          
            <th width="280px">Ação</th>
        </tr>
        @foreach ($brands as $brand)
        <tr>
            <td>{{  $brand->id }}</td>
            <td>{{ $brand->brand }}</td>
           
            <td>
                <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('brands.show',$brand->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $brands->links() !!}
      
@endsection