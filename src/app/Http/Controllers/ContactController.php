<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 入力画面
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }

    // 確認画面
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();

        // 戻るボタンが押された場合は入力画面へ戻す（バリデーション通過後）
        if ($request->has('back')) {
            return redirect()->route('contact.index')->withInput();
        }

        $categories = Category::all();
        return view('contact.confirm', compact('inputs', 'categories'));
    }

    // 保存処理
    public function store(Request $request)
    {
        // DB保存（ログインユーザーありの場合は user_id を付与）
        Contact::create([
            'user_id'     => auth()->check() ? auth()->id() : null,
            'category_id' => $request->input('category_id'),
            'first_name'  => $request->input('first_name'),
            'last_name'   => $request->input('last_name'),
            'gender'      => $request->input('gender'),
            'email'       => $request->input('email'),
            'tel'         => $request->input('tel'),
            'address'     => $request->input('address'),
            'building'    => $request->input('building'),
            'detail'      => $request->input('content'),
        ]);

        return redirect()->route('contact.thanks');
    }

    // サンクスページ
    public function thanks()
    {
        return view('contact.thanks');
    }

}
