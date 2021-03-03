@extends('admin.admin_master')

@section('dashboard')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Category</h4>
                <form class="forms-sample" method="POST" action="{{ route('category.update', $categories->id) }}">
                    @csrf
                    {{method_field('PUT')}}
                  <div class="form-group">
                    <label for="exampleInputName1">Category (English)</label>
                    <input type="text" name="category_en" class="form-control" id="exampleInputName1" placeholder="Category English" value="{{$categories->category_en}}">
                    @error('category_en')
                    <span class="text-danger" role="alert">
                        <h6>{{ $message }}</h6>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName2">Category (Vietnamese)</label>
                    <input type="text" name="category_vi" class="form-control" id="exampleInputName2" placeholder="Category Vietnamese" value="{{$categories->category_vi}}">
                    @error('category_vi')
                    <span class="text-danger" role="alert">
                        <h6>{{ $message }}</h6>
                    </span>
                    @enderror
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection