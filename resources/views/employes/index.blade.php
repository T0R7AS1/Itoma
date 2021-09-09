@extends('layouts.admin')


@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            All Registered Employes
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone Number</th>
                            <th>Workplace</th>
                            <th width="300">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($employes as $employe)
                        <tr>
                            <td>{{ $employe->name }}</td>
                            <td>{{ $employe->email }}</td>
                            <td>{{ $employe->telephone }}</td>
                            <td>{{ $employe->company->name }}</td>
                            <td>
                                <a href="{{route('employes.show', $employe->id)}}" class="btn btn-info">More</a>
                                <a href="{{route('employes.edit', $employe->id)}}" class="btn btn-warning d-inline ">Edit</a>
                                <form action="{{route('employes.destroy', $employe->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn-danger btn btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{-- {{ $employes->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>
@endsection