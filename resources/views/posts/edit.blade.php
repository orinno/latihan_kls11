@extends('layouts.dashboard')

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4 w-75">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{ route('posts.edit.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control form-control-user" placeholder="Belajar Laravel Dasar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault04">Category</label>
                        <select class="custom-select" name="category_id" id="validationDefault04" required>
                            
                            <option selected value="{{$post->category_id}}">
                                {{$post->category->name ?? ''}}
                            </option>

                            <option disabled value="">Choose...</option>
                            @foreach($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <textarea name="body" rows="5" id="" class="summernote form-control">{{$post->body}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mt-3">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto" id="inputFile" multiple required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    // $('#summernote').summernote('code',');
    $('.summernote').summernote({
        height: 200
    })
</script>
@endpush