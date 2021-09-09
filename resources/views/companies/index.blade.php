@extends('layouts.admin')


@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            All Registered Companies
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered w-100" cellspacing="0" id="datatable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>E-Mail</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th width="300">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td><a href="{{ $company->website }}">Company website</a></td>
                            <td width="12%"class=""><img src="{{asset("storage/". $company->image)}}" class="w-50" alt=""></td>
                            <td>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">More</a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning d-inline ">Edit</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn-danger btn btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{-- {{ $companies->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>
@endsection
