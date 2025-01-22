<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class ProductController extends Controller
{
    // 商品登録処理
    public function store(Request $request)
    {
        // バリデーション
       $validatedData= $request->validate([
            'name' => 'required|string|max:255',
            'val' => 'required|numeric',
            'explanation' => 'nullable|string',
            'picture' => 'nullable',
            'genre' => 'nullable|string|max:15',
        ]);

        // オリジナルファイル名を取得
        $originalName = $request->file('picture')->getClientOriginalName();

        // ファイルを保存するパスを指定（'public/images' ディレクトリに保存）
        $filePath = $request->file('picture')->storeAs('public/img', $originalName);

        // 公開用のパスを生成
        $publicPath = str_replace('public/', 'storage/', $filePath);

        // Productsテーブルへ登録
        $product = Product::create([
            'name' => $validatedData['name'],
            'val' => $validatedData['val'],
            'explanation' => $validatedData['explanation'],
            'picture' => $publicPath,
            'genre' => $validatedData['genre'],
        ]);

        // 登録後にadminページにリダイレクト
        return redirect()->route('admin');
    }

    // 商品一覧表示
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    //　商品詳細表示
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('item',compact('product'));
    }
}
