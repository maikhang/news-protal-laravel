@extends('admin.admin_master')

@section('dashboard')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card" style="color:white">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">SubCategory List</h4>
                <a href="{{ route('subcategory.create') }}" class="btn btn-success btn-fw">Add New</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-dark" style="color:white; margin-bottom: 10px;">
                        <thead>
                        <tr>
                            <th> STT </th>
                            <th> Belong Category </th>
                            <th> SubCategory (English) </th>
                            <th> SubCategory (Vietnamese) </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <th> {{ $subcategory->categories->category_en }} </th>
                            <th> {{ $subcategory->subcategory_en }} </th>
                            <th> {{ $subcategory->subcategory_vi }} </th>
                            <td>
                                <a href="{{route('subcategory.edit', $subcategory->id)}}" class="btn btn-primary btn-fw">Edit</a>
                                <a href="#" class="btn btn-danger btn-fw" onclick="if(confirm('Do you want to delete?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$subcategory->id}}').submit()
                                }else{
                                    event.preventDefault();
                                }
                                ">
                                <form id="delete-form{{$subcategory->id}}" method="POST" action="{{route('subcategory.destroy', $subcategory->id)}}" >
                                    @csrf
                                      {{method_field('DELETE')}}
                                </form>
                                Delete
                                </a>
                                {{-- <a href="" class="btn btn-danger btn-fw">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $subcategories->links() }}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection