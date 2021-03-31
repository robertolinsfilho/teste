<?php
  
namespace App\Http\Controllers;
  
use App\Categorie;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategorieController extends Controller
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
       $results = DB::select('select * from users where id = '.$id.' and nivel = 1 or nivel = 2 or nivel = 3' );
       if($results){
        $categories = Categorie::latest()->paginate(5);
        return view('categories.index',compact('categories'));
       }else{
        return redirect()->route('home')
        ->with('success','Você não tem acesso ');
       }
       exit();
      
            
    }


    public function index()
    {

        $categories = Categorie::latest()->paginate(5);
  
        return view('categories.index',compact('categories'));
            
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('categories.create');
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
            'categorie' => 'required',
            
        ]);
  
        Categorie::create($request->all());
   
        return redirect()->route('categories.index')
                        ->with('success','Produto Criado com Sucesso.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }
   
    
    public function edit(Categorie $categorie)
    {
        return view('categories.edit',compact('categorie'));
    }
  
    
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'categorie' => 'required',
            
        ]);
  
        $categorie->update($request->all());
  
        return redirect()->route('categories.index')
                        ->with('success','Produto atualizado com sucesso');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
  
        return redirect()->route('categories.index')
                        ->with('success','Produto Deletado com sucesso');
    }
}