<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Validator;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Receipt::orderBy('no_penerimaan', 'desc')->get();
        return view('penerimaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::where('type', 'supplier')->pluck('nama', 'id');
        $purchase = PurchaseOrder::where('status', 'approve')->pluck('no_po', 'id');
        $product = Product::where('status', 'active')->pluck('nama', 'id');
        $user = User::pluck('name', 'id');
        return view('penerimaan.create', compact('contact', 'user', 'purchase', 'product'));
    }

    public function getPurchaseOrder($id)
    {
        $purchaseOrder = PurchaseOrder::with('product')->find($id);

        if (!$purchaseOrder) {
            return response()->json(['error' => 'Sales Order not found'], 404);
        }

        return response()->json($purchaseOrder);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Receipt::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $receipt = Receipt::latest()->first();
        $no = $receipt ? ((int) substr($receipt->no_penerimaan, -4)) + 1 : 1;
        $no_urut = sprintf('%04d', $no);
        $year = date('Y');
        $no_penerimaan = 'PO/' . $year . '/' . $no_urut;

        Receipt::create([
            'contact_id' => $request->contact_id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'purchase_id' => $request->purchase_id,
            'no_penerimaan' => $no_penerimaan,
            'tanggal_diterima' => $request->tanggal_diterima,
            'qty' => $request->qty,
            'total' => $request->total,
            'status' => 'draft',
        ]);

        return redirect()->route('penerimaan.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Receipt::findOrFail($id);
        return view('penerimaan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Receipt::findOrFail($id);
        $contact = Contact::where('type', 'supplier')->pluck('nama', 'id');
        $purchase = PurchaseOrder::where('status', 'approve')->pluck('no_po', 'id');
        $product = Product::where('status', 'active')->pluck('nama', 'id');
        $user = User::pluck('name', 'id');
        return view('penerimaan.edit', compact('data', 'contact', 'user', 'purchase', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Receipt::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $receipt = Receipt::findOrFail($id);
        $receipt->update([
            'contact_id' => $request->contact_id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'purchase_id' => $request->purchase_id,
            'tanggal_diterima' => $request->tanggal_diterima,
            'qty' => $request->qty,
            'total' => $request->total,
        ]);

        return redirect()->route('penerimaan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->delete();

        return redirect()->route('penerimaan.index')->with('success', 'Data berhasil dihapus');
    }

    public function approve(string $id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->update(['status' => 'approve']);

        $productId = $receipt->product->id;
        $inventory = Inventory::where('product_id', $productId)->first();

        if ($inventory != null) {
            $inventory->update([
                'qty_tersedia' => $inventory->stock + $receipt->qty,
            ]);
        } else {
            Inventory::create([
                'product_id' => $productId,
                'qty_tersedia' => $receipt->qty,
            ]);
        }

        return redirect()->route('penerimaan.index')->with('success', 'Data berhasil diapprove, dan stock di gudang bertambah!');
    }
}
