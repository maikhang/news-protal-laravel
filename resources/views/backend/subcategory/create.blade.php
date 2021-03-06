@extends('admin.admin_master')

@section('dashboard')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create SubCategory</h4>
                <form class="forms-sample" method="POST" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                    @csrf

                  <div class="form-group">
                    <label for="exampleSelectGender">Belong Category</label>
                    <select name="category_id" value="{{old('category_id')}}" id="" class="form-control js-example-basic-single">
                      <option value="">-----Choose Category-----</option>
                      @foreach($categories as $category)
                      <option name="category_id" value="{{$category->id}}">{{$category->category_en}}  |  {{$category->category_vi}}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger" role="alert">
                        <h6>{{ $message }}</h6>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputName1">SubCategory (English)</label>
                    <input type="text" name="subcategory_en" class="form-control" id="exampleInputName1" placeholder="SubCategory English" value=" {{old('subcategory_en')}}">
                    @error('subcategory_en')
                    <span class="text-danger" role="alert">
                        <h6>{{ $message }}</h6>
                    </span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputName2">SubCategory (Vietnamese)</label>
                    <input type="text" name="subcategory_vi" class="form-control" id="exampleInputName2" placeholder="SubCategory Vietnamese" value=" {{old('subcategory_vi')}}">
                    @error('subcategory_vi')
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