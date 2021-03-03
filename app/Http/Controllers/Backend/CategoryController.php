<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$categories = (new Category)->allCategory();
		return view('backend.category.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('backend.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$data = $this->validateForm($request);

		$categories = (new Category)->storeCategory($data);
		return redirect()->back()->with('toast_success', 'Category Created Successfully');
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
		$categories = (new Category)->getCategoryById($id);
		return view('backend.category.edit', compact('categories'));
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

		$categories = (new Category)->updateCategory($data, $id);
		return redirect()->back()->with('toast_success', 'Category Updated Successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		(new Category)->deleteCategory($id);
		return redirect(route('category.index'))->with('toast_success', 'Category Deleted Successfully!');
	}

	public function validateForm($request) {
		return $this->validate($request, [
			'category_en' => 'bail|required|string|unique:categories|max:255',
			'category_vi' => 'bail|required|string|unique:categories|max:255',
		]);
	}
}
