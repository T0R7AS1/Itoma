@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add a company</h3></div>
                            <a href="{{ route('companies.index')}}" class="btn btn-primary w-100">Back</a>
                            <div class="card-body">
                                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1">Company Name</label>
                                        <input type="text" class="form-control" placeholder="Enter company name" name="name" >
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('name') Name must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class="mb-1">E-Mail</label>
                                        <input class="form-control" placeholder="Enter company E-mail" name="email">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('email') Email must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class="mb-1">Company Website</label>
                                        <input type="text" class="form-control" placeholder="Enter company website" name="website">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('website') Website must be valid @enderror
                                    </div>
                                    <label class="mb-1">Logo Of The Company</label>
                                    <div class="file-field">
                                        <span>Choose file</span>
                                        <input type="file" name="image">
                                    </div>
                                    <input type="submit" class="btn btn-success btn-block mt-4 mb-2" name="add" value="add">
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