<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

	protected $table = 'categories';
    protected $fillable = ['category_en', 'category_vi'];

	// Relationship
	public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

	// All Method
    public function allCategory() {
		return Category::paginate(5);
	}

    public function storeCategory($data) {
		return Category::create($data);
	}

	public function getCategoryById($id) {
		return Category::find($id);
	}

	public function updateCategory($data, $id) {
		return Category::find($id)->update($data);
	}

	public function deleteCategory($id) {
		return Category::find($id)->delete();
	}
}
