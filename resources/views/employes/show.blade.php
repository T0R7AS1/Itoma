@extends('layouts.admin')

@section('content')
    <div class="container mt-5 jumbotron text-center">
        <div id="invoice">
            <p class="h5" ><b>Employee name:</b> {{$employes->name}}</p>
            <p class="h5" ><b>Employee e-Mail:</b> {{$employes->email}}</p>
            <p class="h5" ><b>Employee phone number:</b> {{$employes->telephone}}</p>
            <p class="h5" ><b>Employee workplace:</b> {{ $employes->company->name }}</p>
            <hr>
        </div>
        <a href="{{ route('employes.edit', $employes->id) }}" class="btn btn-warning mt-3">Edit</a>
        <form action="{{ route('employes.destroy', $employes->id) }}" method="POST" class="d-inline ">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn-danger btn mt-3">Delete</button>
            <a href="{{ route('employes.index') }}" class="btn btn-primary mt-3"> Back</a>
        </form>
    </div>
@endsection