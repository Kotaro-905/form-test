<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::with('category');

        // フィルタ
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('until')) {
            $query->whereDate('created_at', '<=', $request->until);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(10)->appends($request->query());
        $categories = Category::all();

        return view('admin.contacts.index', compact('contacts', 'categories'));
    }

    public function show($id)
    {
        $contact = Contact::with('category')->findOrFail($id);
        return response()->json([
            'contact' => $contact,
            'gender_label' => $contact->gender_label,
            'category_content' => optional($contact->category)->content,
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.contacts.index')->with('success', '削除しました');
    }

    public function export(Request $request)
    {
        // CSVエクスポートのロジック（省略）
    }
}
