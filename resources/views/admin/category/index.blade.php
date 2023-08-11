@extends('layout.admin.main')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card my-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Category</h4>
                    </div>
                    <div class="col-6">
                       <a href="{{url('/admin/add/category')}}" class="btn btn-success" style="float: right">Add</a>
                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th>Name</th>
                                <th>slug</th>
                                <th>imges</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($category as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td> {{$item->slug}}</td>
                                <td class="py-1"> <img src="{{asset($item->images)}}" alt="image" /></td>
                                <td>
                                    <a href="{{url('/admin/category/edit/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('/admin/category/delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Category Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
