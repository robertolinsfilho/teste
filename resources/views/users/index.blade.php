@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
              
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Nível</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nivel }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                  
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $users->links() !!}
      
@endsection 