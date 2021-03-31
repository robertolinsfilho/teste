<?php
  
namespace App\Http\Controllers;
  
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BrandController extends Controller
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
        $brands = Brand::latest()->paginate(5);
        return view('brands.index',compact('brands'));
       }else{
        return redirect()->route('home')
        ->with('success','Você não tem acesso ');
       }
       exit();
      
            
    }
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
  
        return view('brands.index',compact('brands'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
            'brand' => 'required',
            
        ]);
  
        Brand::create($request->all());
   
        return redirect()->route('brands.index')
                        ->with('success','Marca Criada Com Sucesso');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('brands.show',compact('brand'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit',compact('brand'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand' => 'required',
           
        ]);
  
        $brand->update($request->all());
  
        return redirect()->route('brands.index')
                        ->with('success','Marca Atualizada Com Sucesso');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
  
        return redirect()->route('brands.index')
                        ->with('success','Marca Deletada');
    }
}