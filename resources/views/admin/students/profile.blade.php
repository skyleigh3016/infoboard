@extends('admin.layouts.app')
@section('title')
    {{ $item->name }}
@endsection
<?php $menu = 'Students';
$submenu = $item->c_class; ?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($item->photo)
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/students') . '/' . $item->photo }}" alt="profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/asset_img/user-icon.png') }}" alt="profile picture">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{ $item->name }}</h3>
                        <p class="text-muted text-center"><i class="bi bi-telephone"></i> <a
                                href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>ID</b> <a class="float-right">{{ $item->st_id }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Class</b> <a class="float-right">{{ $item->c_class }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Group</b> <a class="float-right">{{ $item->department }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Session</b> <a class="float-right">{{ $item->session }}</a>
                            </li>
                        </ul>

                        <!-- <a href="{{ route('admin.students.idcard.generate', $item->id) }}"
                            class="btn btn-primary btn-block" target="blank"><i class="bi bi-person-badge"></i>
                            Generate ID Card</a> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header attachment-block p-3 d-flex justify-content-between">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#information" data-toggle="tab"><i
                                        class="bi bi-info-square"></i> Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab"><i
                                        class="bi bi-pencil-square"></i> Edit</a>
                            </li>
                        </ul>

                      

                    </div><!-- /.card-header -->

                    <div class="card-body pt-1">
                        <div class="tab-content">
                            <div class="active tab-pane" id="information">
                                <!-- Post -->
                                <ul class="list-group list-group-unbordered mb-3">
                                 
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right">{{ $item->gender }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of birth</b> <a
                                            class="float-right">{{ date('d F, Y', strtotime($item->dob)) }}</a>
                                    </li>
                                  
                                   
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $item->email }}</a>
                                    </li>
                                </ul>


                                


                              


                               

                               
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="edit">

                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('students.destroy', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm py-1 mb-2 delete"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </div>

                                <form action="{{ route('students.update', $item->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" st_id">Student ID</label>
                                            <input class="form-control @error('st_id') is-invalid @enderror"
                                                type="text" name=" st_id" value="{{ $item->st_id }}">
                                            @error('st_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" name">Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                                name=" name" value="{{ $item->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" session">Session</label>
                                            <input class="form-control @error('session') is-invalid @enderror"
                                                type="text" name=" session" value="{{ $item->session }}">
                                            @error('session')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" department">Course</label>
                                            <select name="department" class="form-control">
                                                <option value="BSIS" @if ($item->department == 'BSIS') selected @endif>
                                                BSIS</option>
                                                <option value="BSAIS"
                                                    @if ($item->department == 'BSAIS') selected @endif>BSAIS</option>
                                                <option value="BSE"
                                                    @if ($item->department == 'BSE') selected @endif>
                                                    BSE</option>
                                            </select>
                                        </div>
                                    </div>

                                  

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" c_class">Year Level</label>
                                            <select name="c_class" class="form-control">
                                                <option value="4th Year" @if ($item->c_class == '4th Year') selected @endif>
                                                4th Year
                                                </option>
                                                <option value="3rd Year" @if ($item->c_class == '3rd Year') selected @endif>
                                                3rd Year
                                                </option>
                                                <option value="2nd Year"
                                                    @if ($item->c_class == '2nd Year') selected @endif>2nd Year
                                                </option>
                                                <option value="1st Year"
                                                    @if ($item->c_class == '1st Year') selected @endif>1st Year</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" dob">Date of birth</label>
                                            <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                                name=" dob" value="{{ $item->dob }}">
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" gender">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="Male" @if ($item->gender == 'Male') selected @endif>
                                                    Male
                                                </option>
                                                <option value="Female" @if ($item->gender == 'Female') selected @endif>
                                                    Female</option>
                                                <option value="Other" @if ($item->gender == 'Other') selected @endif>
                                                    Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" phone">Phone</label>
                                            <input class="form-control @error('phone') is-invalid @enderror"
                                                type="text" name=" phone" value="{{ $item->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" email">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                type="email" name=" email" value="{{ $item->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" photo">Photo</label>
                                            <input class="form-control p-1" type="file" name="photo">
                                            <input type="hidden" name="old_photo" value="{{ $item->photo }}">
                                        </div>
                                    </div>

                                   
                                    <div class="d-flex justify-content-end mt-2">
                                        <button type="submit" class="btn  btn-primary"><i
                                                class="bi bi-check2-square"></i>
                                            Update info</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


    @php
    $mt_mark = DB::table('model_test_exam')
        ->where('c_class', $item->c_class)
        ->where('st_id', $item->id)
        ->first();
    $hy_mark = DB::table('half_yearly_exam')
        ->where('c_class', $item->c_class)
        ->where('st_id', $item->id)
        ->first();
    $fnl_mark = DB::table('final_exam')
        ->where('c_class', $item->c_class)
        ->where('st_id', $item->id)
        ->first();
    @endphp

    @include('admin.students.exam_modals.science')
    @include('admin.students.exam_modals.humanities')
    @include('admin.students.exam_modals.business')

@endsection
