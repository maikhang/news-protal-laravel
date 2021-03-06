<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = ['category_id','subcategory_en', 'subcategory_vi'];

	// Relationship
	public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

	// All Method
    public function allSubCategory() {
		return SubCategory::paginate(5);
	}

    public function storeSubCategory($data) {
		return SubCategory::create($data);
	}

	public function getSubCategoryById($id) {
		return SubCategory::find($id);
	}

	public function updateSubCategory($data, $id) {
        $subcategories = SubCategory::find($id);

		$subcategories->category_id = $data['category_id'];
		$subcategories->subcategory_en = $data['subcategory_en'];
		$subcategories->subcategory_vi = $data['subcategory_vi'];
		$subcategories->save();
		return $subcategories;
	}

	public function deleteSubCategory($id) {
		return SubCategory::find($id)->delete();
	}
}
