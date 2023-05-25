@extends('layouts.app')

@section('content')

    <div class="container d-flex">
        @foreach($post as $item)
        <div class="row">
            <div class="col-lg-4">
                <div class="card m-2" style="width: 18rem">
                    <img src="{{asset('foto/'. $item->foto)}}" class="card-img-top" width="100%">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        {{-- <h5 class="card-title"> --}}
                            {{$item->title}}
                        {{-- </h5> --}}
                        <p class="card-text">
                            {!! $item->body ?? '' !!}
                            {{-- <p>Mari kita <b>coba!</b><br></p>  --}}
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection