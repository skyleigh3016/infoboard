@extends('admin.layouts.app')
@section('title')
    Students
@endsection
<?php $menu = 'Students';
$submenu = 'Students'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>students</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                         Add students
                    </button>
                    <button type="button" class="btn  btn-info btn-sm" data-toggle="modal" data-target="#staticBackdrop1">
                         upload students
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">
            <div class="mb-2" >
                    <form class="form-inline" action="" method="GET">
                        <label>Course &nbsp;</label>
                        <select class="form-control"  id="department" name="department">
                            <option disabled selected>Select Course</option>
                            <option value="BSIS">BSIS</option>
                            <option value="BSAIS">BSAIS</option>
                            <option value="BSE">BSE</option>
                            <option value="BSE">BSA</option>
                            <option value="BSE">BSTM</option>
                            <option value="BSE">ICT</option>
                            <option value="BSE">ABM</option>
                            <option value="BSE">HE</option>
                        </select>

                        <span>&nbsp;&nbsp;</span>
                        <label for="c_class">Year &nbsp;</label>
                        <select class="form-control" id="year_filter" name="c_class">
                            <option disabled selected>Select Year Level</option>
                            <option value="Grade-11">Grade-11</option>
                            <option value="Grade-12">Grade-12</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                        <span>&nbsp;&nbsp;</span>
                           <button type="submit" class="btn btn-primary">Search</button>  
                        
                    </form>
                
                </div>
                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Phone</th>
                            <th>Year Level</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($students) > 0)
                        @foreach ($students as $item)
                            <tr>
                                <td>{{ $item->st_id }}</td>
                                <td>
                                    @if ($item->photo)
                                        <img class="img-fluid" src="{{ asset('images/students' . '/' . $item->photo) }}"
                                            alt="Photo" style="width: 80px">
                                    @else
                                        <img class="img-fluid" src="{{ asset('images/asset_img/user-icon.png') }}"
                                            alt="Photo" style="width: 80px">
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->department }}</td>
                              

                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->c_class }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('students.show', $item->id) }}"
                                            class="btn btn-info mr-1 px-1 py-0"><i class="bi bi-person"></i></a>

                              
                                        <a href="mailto:{{ $item->email }}" class="btn btn-danger px-1 py-0"
                                            target="blank"><i class="bi bi-envelope"></i></a>
                                    </div>
                                    {{-- @if ($item->c_class != 'Old_Student')
                                        <a href="{{ route('students.transfer-class', $item->id) }}"
                                            class="confirm btn btn-outline-primary btn-sm mt-2">
                                            Transfer <i class="far fa-arrow-alt-circle-right ml-1"></i></a>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                        @else
                <tr>
                    <td colspan="7" class="text-center">No Data Found</td>
                </tr>  
            @endif
                    </tbody>
                </table>
                
            </div>

            
  

            <!-- Modal for add student -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" st_id">Student ID</label>
                                        <input class="form-control @error('st_id') is-invalid @enderror" type="text"
                                            name=" st_id" value="{{ old(' st_id') }}">
                                        @error('st_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=" name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name=" name" value="{{ old(' name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" session">Residency Range</label>
                                        <input class="form-control @error('session') is-invalid @enderror" type="text"
                                            name=" session" value="{{ old(' session') }}">
                                        @error('session')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=" department">Course</label>
                                        <select name="department" class="form-control">
                                            <option value="BSIS">BSIS</option>
                                            <option value="BSAIS">BSAIS</option>
                                            <option value="BSE">BSE</option>
                                            <option value="BSE">BSA</option>
                                            <option value="BSE">BSTM</option>
                                            <option value="BSE">ICT</option>
                                            <option value="BSE">ABM</option>
                                            <option value="BSE">HE</option>
                                        </select>
                                    </div>
                                </div>

                                

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" c_class">Year Level</label>
                                        <select name="c_class" class="form-control">
                                            <option value="4th Year">4th Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="2nd Year">2nd Year</option>
                                            <option value="1st Year">1st Year</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" dob">Date of birth</label>
                                        <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                            name=" dob" value="{{ old(' dob') }}">
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
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                            name=" phone" value="{{ old(' phone') }}">
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
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            name=" email" value="{{ old(' email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" photo">Photo <small>(.jpg/.jpeg/.png)</small></label>
                                        <input class="form-control p-1" type="file" name=" photo">
                                    </div>
                                </div>

                               

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Add student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Modal for upload student -->
            <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('students.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                               

                               

                                

                                

                            
                               
                              
                                    <div class="form-group col-md-6">
                                        <label for=" photo">Import Excel<small>(.csv format)</small></label>
                                        <input class="form-control p-1" type="file" name=" file">
                                    </div>
                               

                               

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Upload student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
