<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $status)
    {
        $data = Product::where('status', $status)->orderBy('nama', 'asc')->get();
        $resp = $status;
        return view('product.index', compact('data', 'resp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Product::$storeRules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => 'active',
            'image' => $image->hashName(),
        ]);

        return redirect()->route('product.index2', ['active'])->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::findOrFail($id);
        return view('product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::findOrFail($id);
        return view('product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Product::$updateRules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            Storage::delete('public/product/'. $data->image);

            $image->storeAs('public/product', $image->hashName());
            $data->image = $image->hashName();
        }

        $data->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        return redirect()->route('product.index2', ['active'])->with('success', 'Product berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::findOrFail($id);
        Storage::delete('public/product/'. $data->image);
        $data->delete();

        return redirect()->route('product.index2', ['active'])->with('success', 'Product berhasil dihapus');
    }

    public function changeStatus(string $id)
    {
        $data = Product::findOrFail($id);
        $status = $data->status == 'active' ? 'inactive' : 'active';
        $data->update(['status' => $status]);

        return redirect()->route('product.show', $data->id)->with('success', 'Berhasil mengubah status product');
    }
}
