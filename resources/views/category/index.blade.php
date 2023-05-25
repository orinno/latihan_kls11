@extends('layouts.dashboard')

@push('style')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 py-4">Management Data Category</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_category">
                Launch demo modal
            </button> -->

            <!-- <button class="btn btn-success mb-2 hiden" id="btPrint" onclick="createPDF()" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Cetak Laporan Aktifitas"><i data-feather="printer"></i> Cetak</button> -->

            <button class="btn btn-primary mb-3" onclick="createPDF()" >Export</button>

            <a href="/dashboard/category/create" class="btn btn-primary mb-3">Tambah Kategori</a>

            <div class="" id="box">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Posts</th>
                              <th class="hiden">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @php
                          $no = 1;
                          @endphp
                          @foreach($categories as $category)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $category->name }}</td>
                              <td>{{ $category->slug }}</td>
                              <td>{{ $category->posts->count() }}</td>
                              <td class="hiden">
                                <div class="dropdown">
                                    <i class="fa fa-ellipsis-v" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/dashboard/category/edit/{{$category->id}}"><i class="fas fa-edit pr-1 text-primary"></i> Edit</a>
                                        <a class="dropdown-item" href="/dashboard/category/delete/{{$category->id}}" 
                                        onclick="return confirm('Apakah anda yakin? Data akan dihapus!')">
                                          <i class="fas fa-trash-alt pr-1 text-danger"></i> Delete
                                        </a>
                                    </div>
                                </div>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modal_add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@include('category.export')

@endsection

@push('script')
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
@endpush
