@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <div>Role List</div>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-success btn-sm" href="{{route('roles.create')}}">Add roles</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $u =>$role)
                    <tr>
                        <td>{{$u+1}}</td>
                        <td>{{ucfirst($role->name)}} </td>
                        <td>
                            <a href="{{URL::to('roles/'.encrypt($role->id).'/edit')}}"><i class="fa fa-pencil text-dark"></i></a>
                            <a type="button" class="delete-btn" data-url="{{ route('roles.destroy', ['role' => encrypt($role->id)]) }}"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Record Not Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination-block">
                {{$roles->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection