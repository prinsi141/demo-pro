@extends('layouts.app')

@section('content')
<div class="container-fluid module" data-name="users">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 fw-bold">
                                Users Create
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <p class="mb-3 text-danger">
                                    @foreach ($errors->all() as $error)
                                    <i class="fa fa-angle-double-right txt-primary"></i>{{ $error }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        @endif
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">{{ __('First name') }}</label>
                                    <input id="first_name" type="text" class="form-control checkOnlyAlpha" name="first_name">
                                    <span class="field_err" id="fname_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">{{ __('Last name') }}</label>
                                    <input id="last_name" type="text" class="form-control checkOnlyAlpha" name="last_name">
                                    <span class="field_err" id="lname_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="text" class="form-control" name="email">
                                    <span class="field_err" id="email_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" maxlength="9">
                                    <span class="field_err" id="password_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">{{ __('Mobile') }}</label>
                                    <input id="mobile" type="text" class="form-control checkOnlyNumeric" name="mobile" maxlength="10">
                                    <span class="field_err" id="mobile_number_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcode">{{ __('Postcode') }}</label>
                                    <input id="postcode" type="text" class="form-control checkOnlyNumeric" name="postcode" maxlength="6">
                                    <span class="field_err" id="postcode_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hobbies">{{ __('Hobbies') }} :</label><br>
                                    <input id="reading" type="checkbox" name="hobbies[]" value="reading">
                                    <label for="reading" class="me-3">Reading</label>
                                    <input id="drawing" type="checkbox" name="hobbies[]" value="drawing">
                                    <label for="drawing" class="me-3">Drawing</label>
                                    <input id="danceing" type="checkbox" name="hobbies[]" value="danceing">
                                    <label for="danceing">Danceing</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">{{ __('Gender') }}:</label><br>
                                    <input type="radio" name="gender" id="male" value="1" checked>
                                    <label for="male" class="me-3">Male</label>
                                    <input type="radio" name="gender" id="female" value="2">
                                    <label for="female" class="me-3">Female</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">{{ __('Role') }}</label>
                                    <select name="role_id[]" id="role_id" class="form-control" multiple>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">{{ __('State') }}</label>
                                    <select id="state" name="state" class="form-control"></select>
                                    <span class="field_err" id="state_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group select-city">
                                    <label for="city">{{ __('City') }}</label>
                                    <select id="city" name="city" class="form-control"></select>
                                    <span class="field_err" id="city_err"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer borderd-none">
                        <button class="btn btn-success save-user" type="submit">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection