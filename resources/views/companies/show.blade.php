@extends('layouts.admin')

@section('content')
    <div class="container mt-5 jumbotron text-center">
        <div id="invoice">
            <p class="h5" ><b>Company Name:</b> {{$companies->name}}</p>
            <p class="h5" ><b>Company E-Mail:</b> {{$companies->email}}</p>
            <p class="h5" ><b>Company Website:</b> <a href="{{$companies->website}}">Company Website</a></p>
            <p class="h5" ><b>Logo of the company:</b> <center><img src="{{asset("storage/". $companies->image)}}" class="w-25" alt=""></center></p>
            <hr>
        </div>
        <a href="{{ route('companies.edit', $companies->id) }}" class="btn btn-warning mt-3">Edit</a>
        <form action="{{ route('companies.destroy', $companies->id) }}" method="POST" class="d-inline ">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn-danger btn mt-3">Delete</button>
            <a href="{{ route('companies.index') }}" class="btn btn-primary mt-3"> Back</a>
        </form>
    </div>
@endsection