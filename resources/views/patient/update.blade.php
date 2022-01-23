@extends('layouts.dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Patient</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <form action="{{ route('patient.update') }}" data-parsley-validate class="form-horizontal form-label-left" method="POST" >
                            @csrf

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                                </label>
                                <input type="hidden" id="" class="form-control" name="patient_id" value="{{$patient->id}}">
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" class="form-control" name="first_name" value="{{$patient->first_name}}">
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="last_name" class="form-control" value="{{$patient->last_name}}">
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="email" class="form-control" type="email" name="email" value="{{$patient->email}}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="phone" class="col-form-label col-md-3 col-sm-3 label-align">Phone No.</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="phone" class="form-control" type="number" name="phone" value="{{$patient->phone}}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="age" class="col-form-label col-md-3 col-sm-3 label-align">Age</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="age" class="form-control" type="number" name="age" value="{{$patient->age}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Address
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea name="address" cols="30" rows="5" class="form-control">{{$patient->address}}</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Aadhar No.
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number"  class="form-control" name="aadhar_no" value="{{$patient->aadhar_no}}">
                                    @if ($errors->has('aadhar_no'))
                                        <span class="text-danger">{{ $errors->first('aadhar_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Sex
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="radio"  class="" name="sex" value="male" checked>Male
                                    <input type="radio"  class="" name="sex" value="female">Female
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
