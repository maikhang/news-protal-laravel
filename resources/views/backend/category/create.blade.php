@extends('admin.admin_master')

@section('dashboard')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create Category</h4>
                <form class="forms-sample" method="POST" action="{{ route('category.store') }}">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Category (English)</label>
                    <input type="text" name="category_en" class="form-control" id="exampleInputName1" placeholder="Category English" value=" {{old('category_en')}}">
                    @error('category_en')
                    <span class="text-danger" role="alert">
                        <h6>{{ $message }}</h6>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName2">Category (Vietnamese)</label>
                    <input type="text" name="category_vi" class="form-control" id="exampleInputName2" placeholder="Category Vietnamese" value=" {{old('category_vi')}}">
                    @error('category_vi')
                    <span class="text-danger" role="alert">
                        <h6>{{ $message }}</h6>
                    </span>
                    @enderror
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary mr-2">Add</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection