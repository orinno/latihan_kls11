@extends('layouts.dashboard')

@push('style')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 py-4">Edit Kategori</h1>

    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('category.edit.update', $categories->id) }}" method="post">
                @csrf
                @method('PATCH')  
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{$categories->name}}" required class="form-control">
                </div> 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    

</div>


@endsection

@push('script')
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
@endpush