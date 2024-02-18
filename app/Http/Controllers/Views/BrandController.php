<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        return view('admin.brands.brands');
    }

    public function noPublish()
    {
        return view('admin.brands.brands_noPublish');
    }

    public function createBrand()
    {
        return view('admin.brands.addBrand');
    }

    public function store(BrandRequest $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function update(BrandRequest $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
