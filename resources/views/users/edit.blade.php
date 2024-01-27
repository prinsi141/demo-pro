@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ URL::to('users/'.encrypt($user->id))}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 fw-bold">
                                Users Update
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
                                    <label for="first_name">{{ __('First name') }}</label>
                                    <input id="first_name" type="text" class="form-control checkOnlyAlpha" name="first_name" value="{{$user->first_name}}">
                                    <span class="field_err" id="fname_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">{{ __('Last name') }}</label>
                                    <input id="last_name" type="text" class="form-control checkOnlyAlpha" name="last_name" value="{{$user->last_name}}">
                                    <span class="field_err" id="lname_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
                                    <span class="field_err" id="email_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">{{ __('Mobile') }}</label>
                                    <input id="mobile" type="text" class="form-control checkOnlyNumeric" maxlength="10" name="mobile" value="{{$user->mobile}}">
                                    <span class="field_err" id="mobile_number_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcode">{{ __('Postcode') }}</label>
                                    <input id="postcode" type="text" class="form-control checkOnlyNumeric" maxlength="6" name="postcode" value="{{$user->postcode}}">
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
                                    <input id="reading" type="checkbox" name="hobbies[]" value="reading" <?php echo (in_array('reading', explode(', ', $user->hobbies))) ? 'checked' : ''; ?>>
                                    <label for="reading" class="me-3">Reading</label>

                                    <input id="drawing" type="checkbox" name="hobbies[]" value="drawing" <?php echo (in_array('drawing', explode(', ', $user->hobbies))) ? 'checked' : ''; ?>>
                                    <label for="drawing" class="me-3">Drawing</label>

                                    <input id="danceing" type="checkbox" name="hobbies[]" value="danceing" <?php echo (in_array('danceing', explode(', ', $user->hobbies))) ? 'checked' : ''; ?>>
                                    <label for="danceing" class="me-3">Danceing</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">{{ __('Gender') }}:</label><br>
                                    <input type="radio" name="gender" id="male" value="1" @if($user->gender == 1) checked @endif>
                                    <label for="male" class="me-3">Male</label>
                                    <input type="radio" name="gender" id="female" value="2" @if($user->gender == 2) checked @endif>
                                    <label for="female" class="me-3">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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