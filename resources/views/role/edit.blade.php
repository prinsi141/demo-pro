@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ URL::to('roles/'.encrypt($role->id))}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 fw-bold">
                                Roles Update
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <p class="mb-3 text-danger">
                                    @foreach ($errors->all() as $error)
                                    <i class="fa fa-angle-double-right txt-primary m-r-10"></i>{{ $error }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        @endif
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control checkOnlyAlpha" name="name" value="{{$role->name}}" required>
                                    <span class="field_err" id="name_err"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success " type="submit">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection