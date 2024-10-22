<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::query()->paginate(10);

        return view('admin.brands.brands', compact('brands'));
    }

    public function noPublish()
    {
        $brands = Brand::where('is_public', false)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.brands.brands_noPublish', compact('brands'));
    }

    public function createBrand()
    {
        return view('admin.brands.addBrand');
    }

    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brands.brand', compact('brand'));
    }

    public function store(BrandRequest $request)
    {
        $validated = $request->validated();

        $isPublic = $request->has('is_public') ? 1 : 0;
        $validated['is_public'] = $isPublic;

        if ($request->hasFile('img')) {
            $validated['img'] = "/storage/{$request->file('img')->store('brands/images', 'public')}";
        }

        $brand = Brand::query()->create($validated);
        return redirect()->route('admin.brands')->with(['message' => "Бренд \"$brand->name\" успешно добавлен "]);

    }


    public function update(BrandUpdateRequest $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $validated = $request->validated();

        $isPublic = $request->has('is_public') ? 1 : 0;
        $validated['is_public'] = $isPublic;

        $brand->update($validated);

        return redirect()->back()->with('success', 'Бренд успешно изменён');
    }


    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        return redirect()->back()->with('success', 'Бренд успешно удалён');
    }
}
