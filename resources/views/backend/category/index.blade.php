@extends('admin.admin_master')

@section('dashboard')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card" style="color:white">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Category List</h4>
                <a href="{{ route('category.create') }}" class="btn btn-success btn-fw">Add New</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-dark" style="color:white; margin-bottom: 10px;">
                        <thead>
                        <tr>
                            <th> STT </th>
                            <th> Category (English) </th>
                            <th> Category (Vietnamese) </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($categories as $category)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <th> {{ $category->category_en }} </th>
                            <th> {{ $category->category_vi }} </th>
                            <td>
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary btn-fw">Edit</a>
                                <a href="#" class="btn btn-danger btn-fw" onclick="if(confirm('Do you want to delete?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$category->id}}').submit()
                                }else{
                                    event.preventDefault();
                                }
                                ">
                                <form id="delete-form{{$category->id}}" method="POST" action="{{route('category.destroy', $category->id)}}" >
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
                    {{ $categories->links() }}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection