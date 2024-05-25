<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Product;
use App\Models\SalesOrder;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PurchaseOrder::orderBy('created_at', 'desc')->get();
        return view('purchase.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::where('type', 'supplier')->pluck('nama', 'id');
        $sales = SalesOrder::where('status', 'approve')->pluck('no_so', 'id');
        $product = Product::where('status', 'active')->pluck('nama', 'id');
        $user = User::pluck('name', 'id');
        return view('purchase.create', compact('contact', 'user', 'sales', 'product'));
    }

    public function getSalesOrder($id)
    {
        $salesOrder = SalesOrder::with('product')->find($id);

        if (!$salesOrder) {
            return response()->json(['error' => 'Sales Order not found'], 404);
        }

        return response()->json($salesOrder);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), PurchaseOrder::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $purchase = PurchaseOrder::latest()->first();
        $no = $purchase ? ((int) substr($purchase->no_po, -4)) + 1 : 1;
        $no_urut = sprintf('%04d', $no);
        $year = date('Y');
        $no_po = 'PO/' . $year . '/' . $no_urut;

        $date = date('Y-m-d');
        $purchase = PurchaseOrder::create([
            'contact_id' => $request->contact_id,
            'user_id' => $request->user_id,
            'sales_id' => $request->sales_id,
            'product_id' => $request->product_id,
            'no_po' => $no_po,
            'date' => $date,
            'qty' => $request->qty,
            'total' => $request->total,
            'status' => 'draft',
        ]);

        return redirect()->route('purchase.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PurchaseOrder::findOrFail($id);
        return view('purchase.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PurchaseOrder::findOrFail($id);
        $contact = Contact::where('type', 'supplier')->pluck('nama', 'id');
        $sales = SalesOrder::where('status', 'approve')->pluck('no_so', 'id');
        $user = User::pluck('name', 'id');
        return view('purchase.edit', compact('data', 'contact', 'sales', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), PurchaseOrder::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $purchase = PurchaseOrder::findOrFail($id);
        $purchase->update([
            'contact_id' => $request->contact_id,
            'user_id' => $request->user_id,
            'sales_id' => $request->sales_id,
            'qty' => $request->qty,
            'total' => $request->total,
        ]);

        return redirect()->route('purchase.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = PurchaseOrder::findOrFail($id);
        $purchase->delete();

        return redirect()->route('purchase.index')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Change status to approve.
     */
    public function approve(string $id)
    {
        $purchase = PurchaseOrder::findOrFail($id);
        $purchase->update([
            'status' => 'approve',
        ]);

        return redirect()->route('purchase.show', [$id])->with('success', 'Purchase Order berhasil diapprove');
    }
}
