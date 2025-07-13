<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // 保存可能なカラム（Seederなどで使う場合）
    protected $fillable = [
        'content',
    ];

    /**
     * contactsテーブルとのリレーション（1対多）
     * categories.id → contacts.category_id
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
