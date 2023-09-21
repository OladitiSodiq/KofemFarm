<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\CropManagementProduct;
use Illuminate\Http\Request;

class CropManagementProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $products = CropManagementProduct::all();
        return view('crop-management-products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crop-management-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        CropManagementProduct::create(
            $request->all()
        );
        return redirect()->route('crop-management-products.index')->withSuccessMessage('farm record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CropManagementProduct  $cropManagementProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CropManagementProduct $cropManagementProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CropManagementProduct  $cropManagementProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CropManagementProduct $cropManagementProduct)
    {
        //
        return view('crop-management-products.edit',compact('cropManagementProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CropManagementProduct  $cropManagementProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CropManagementProduct $cropManagementProduct)
    {
        //
        $cropManagementProduct->update([
            'name'=> $request->input('name'),
            'description'=> $request->input('description'),
          
        ]);
        return redirect()->route('crop-management-products.index')->withSuccessMessage('crop-management-products updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CropManagementProduct  $cropManagementProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CropManagementProduct $cropManagementProduct)
    {
        //
        if ($cropManagementProduct->children()->exists()){
            return redirect()->route('category.index')->withToastWarning('cannot delete existing parent farm');
            }
            else{
                $cropManagementProduct->delete();
                return redirect()->route('crop-management-products.index')->withSuccessMessage('farm record deleted successfully');
            }
    }
}
