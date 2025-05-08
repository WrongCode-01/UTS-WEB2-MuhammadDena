<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category; // Import Model Category
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function __construct()
    {
        // Proteksi semua method kecuali show/index jika diperlukan
        // $this->middleware('auth'); // Ini sudah dilakukan di route
        // $this->middleware('can:manage-assets')->except(['index', 'show']); // Contoh: Hanya admin yang bisa CRUD selain view
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua aset beserta informasi kategori (menggunakan eager loading)
        $assets = Asset::with('category')->get();
        return view('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manage-assets');
        $categories = Category::all(); // Ambil semua kategori untuk dropdown
        return view('assets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manage-assets');
        // Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Pastikan category_id ada di tabel categories
            'name' => 'required|max:255',
            'description' => 'nullable',
            'serial_number' => 'nullable|unique:assets|max:255', // Serial number harus unik
            'purchase_date' => 'nullable|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'status' => 'required|in:Available,Assigned,Maintenance,Retired', // Batasi status
            'location' => 'nullable|max:255',
        ]);

        // Buat aset baru
        Asset::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('assets.index')->with('success', 'Aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
         // Eager load kategori
         $asset->load('category');
         return view('assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $this->authorize('manage-assets');
        $categories = Category::all(); // Ambil semua kategori untuk dropdown
        return view('assets.edit', compact('asset', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $this->authorize('manage-assets');
        // Validasi input (unique serial_number dikecualikan untuk aset ini)
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'serial_number' => 'nullable|unique:assets,serial_number,' . $asset->id . '|max:255',
            'purchase_date' => 'nullable|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'status' => 'required|in:Available,Assigned,Maintenance,Retired',
            'location' => 'nullable|max:255',
        ]);

        // Update aset
        $asset->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('assets.index')->with('success', 'Aset berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $this->authorize('manage-assets');
        // Hapus aset
        $asset->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('assets.index')->with('success', 'Aset berhasil dihapus!');
    }
}
