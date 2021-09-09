@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Employe Info</h3></div>
                            <a href="{{ route('employes.index')}}" class="btn btn-primary w-100"> Back</a>
                            <div class="card-body">
                                <form action="{{route('employes.update', $employes->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="mb-1">Employe Name</label>
                                        <input type="text" class="form-control" value="{{$employes->name}}" name="name">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('name') Name must be valid @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Employe E-Mail</label>
                                        <input type="text" class="form-control" value="{{$employes->email}}" name="email">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('email') Email must be valid @enderror
                                    </div>
                                        <label class="mb-1">Employe Phone Number</label>
                                        <div class="form-group input-group-prepend"> 
                                        <span class="input-group-text" id="basic-addon1">3706</span>
                                        <input type="text" class="form-control" value="{{substr($employes->telephone, 4)}}" name="telephone">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('telephone') Phone number must be valid @enderror
                                    </div>
                                    <label class="mb-1">Employe Name</label>
                                        <select name="company_id" id="inputProjectname" class="form-control">
                                            @foreach ($companies as $company)
                                                <option name="company_id" value="{{$company->id}}"
                                                 @if ($company->id == old('company_id', $employes->company_id))selected @endif>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    <div class="mb-3 text-danger">
                                        @error('company_id') Workplace must be valid @enderror
                                    </div>
                                    <input type="submit" class="btn btn-success btn-block mt-4 mb-2" name="update" value="update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </main>
    </div>
</div>
@endsection