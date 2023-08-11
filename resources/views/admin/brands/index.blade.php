@extends('layout.admin.main')
<base href="/public">
@section('content')
    {{-- @include('admin.brands.modal') --}}

    @if (session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
    <div class="col-lg-12 grid-margin stretch-card my-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Brands</h4>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/admin/add/brand') }}" class="btn btn-success" style="float: right">Add</a>
                            {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" --}}
                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th>Name</th>
                                <th>slug</th>
                                <th>Status</th>
                                <th>Category Id</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brand as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td> {{$item->slug}}</td>
                                <td style="background:{{$item->status == 1?'red':'green'}}; display:block; margin-top:20px; color:white; font-weight:800; text-align:center; border-radius:20px; "> {{$item->status == 1?'HIdden':'Visiable'}}</td>
                                <td> {{$item->category_id}}</td>
                                <td>
                                    <a href="{{url('/admin/brand/edit/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('/admin/brand/delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Brands Found</td>
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


{{-- @section('scripts')
<base href="/public">
{{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            console.log('ready function');

            $(".submit-form").click(function(e) {

                e.preventDefault();
                var data = $('#form-data').serialize();
                console.log(data);

                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: 'post',
                    url: "{{ route('store') }}",
                    data: data,

                    beforeSend: function() {
                        $('#create_new').html('....Please wait');
                    },

                    success: function(response) {
                        alert(response.success);
                    },

                    complete: function(response) {
                        $('#create_new').html('Create New');
                    }
                });
            });
        });
    </script>
@endsection --}}
