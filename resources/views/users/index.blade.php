@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <div>User List</div>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-outline-danger btn-sm me-1" href="{{URL::to('generate-pdf')}}"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-success btn-sm" href="{{route('users.create')}}">New User</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Mobile</td>
                        <td>State</td>
                        <td>City</td>
                        <td>Postcode</td>
                        <td>Gender</td>
                        <td>Hobbies</td>
                        <td>Role</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u =>$user)
                    <tr>
                        <td>{{$u+1}}</td>
                        <td>
                            <img class="rounded-circle" style="width: 30px;height:30px;" src="{{ asset('uploads/users/'.$user->image) }}">
                        </td>
                        <td>{{ucfirst($user->first_name) ." " .ucfirst($user->last_name)}} </td>
                        <td>{{ucfirst($user->email)}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{!empty($user->city_id) ? $user->getCity->getState['name'] : ''}}</td>
                        <td>{{!empty($user->city_id) ? $user->getCity['name'] : ''}}</td>
                        <td>{{$user->postcode}}</td>
                        <td>{{$user->gender_name}}</td>
                        <td>{{ucfirst($user->hobbies)}}</td>
                        <td>
                            @foreach ($user->roles as $role)
                            {{ $role->name }}
                            @if (!$loop->last)
                            ,
                            @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{URL::to('users/'.encrypt($user->id).'/edit')}}"><i class="fa fa-pencil text-dark"></i></a>
                            <a type="button" class="delete-btn" data-url="{{ route('users.destroy', ['user' => encrypt($user->id)]) }}"><i class="fa fa-trash text-danger"></i></a>
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
                {{$users->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection