<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class SubcategoryController extends Controller
{
     /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$subcategories = (new SubCategory)->allSubCategory();
		return view('backend.subcategory.index', compact('subcategories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::all();
		return view('backend.subcategory.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$data['category_id'] = $request['category_id'];
		$data['subcategory_en'] = $request['subcategory_en'];
		$data['subcategory_vi'] = $request['subcategory_vi'];

		$data = $this->validateForm($request);
		(new SubCategory)::create($data);

		// $categories = (new SubCategory)->storeSubCategory($data);
		return redirect()->back()->with('toast_success', 'SubCategory Created Successfully');
	}

	// /**
	//  * Display the specified resource.
	//  *
	//  * @param  int  $id
	//  * @return \Illuminate\Http\Response
	//  */
	// public function show($id) {
	// 	//
	// }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$subcategories = (new SubCategory)->getSubCategoryById($id);
		$categories = Category::all();
		return view('backend.subcategory.edit', compact('subcategories', 'categories'));
	}

	// /**
	//  * Update the specified resource in storage.
	//  *
	//  * @param  \Illuminate\Http\Request  $request
	//  * @param  int  $id
	//  * @return \Illuminate\Http\Response
	//  */
	public function update(Request $request, $id) {
		$data = $this->validateForm($request);
		
		(new SubCategory)->updateSubCategory($data, $id);
		return redirect()->back()->with('toast_success', 'SubCategory Updated Successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		(new SubCategory)->deleteSubCategory($id);
		return redirect(route('subcategory.index'))->with('toast_success', 'SubCategory Deleted Successfully!');
	}

	public function validateForm($request) {
		return $this->validate($request, [
			'category_id' => 'bail|required',
			'subcategory_en' => 'bail|required|string|max:255',
			'subcategory_vi' => 'bail|required|string|max:255',
        ],
        [
            'category_id.required' => 'This Field is Required',
            'subcategory_en.required' => 'This Field is Required',
            'subcategory_vi.required' => 'This Field is Required',
        ]
    );
	}
}
