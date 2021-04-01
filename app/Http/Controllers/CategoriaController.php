<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
 

    public function check()
    {
       $id = auth()->user()->id;
       $results = DB::select('select * from users where id = '.$id.' and nivel = 4  or nivel = 3' );
       if($results){
        $categorias = Categoria::latest()->paginate(5);
        return view('categorias.index',compact('categorias'));
       }else{
        return redirect()->route('home')
        ->with('success','Você não tem acesso ');
       }
       exit();
      
            
    }
    public function index()
    {
        $categorias = Categoria::latest()->paginate(5);
  
        return view('categorias.index',compact('categorias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            
        ]);
  
        Categoria::create($request->all());
   
        return redirect()->route('categorias.index')
                        ->with('success','Categoria Criada Com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'categoria' => 'required',
           
        ]);
  
        $categoria->update($request->all());
  
        return redirect()->route('categorias.index')
                        ->with('success','Categoria Atualizada Com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
  
        return redirect()->route('categorias.index')
                        ->with('success','Categoria Deletada');
    }
}
