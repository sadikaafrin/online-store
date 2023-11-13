@extends('layouts.app')
@section('body')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Sub Category Module</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <h4 class="card-title">All Sub Category Information</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">SL NO</th>
                            <th class="wd-15p border-bottom-0">Category Name</th>
                            <th class="wd-15p border-bottom-0">Sub Category Name</th>
                            <th class="wd-20p border-bottom-0">Sub Category Description</th>
                            <th class="wd-15p border-bottom-0">Sub Category Image</th>
                            <th class="wd-10p border-bottom-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sub_category->category->name}}</td>
                                <td>{{$sub_category->name}}</td>
                                <td>{{Str::limit($sub_category->description, 10)}}</td>
                                <td>
                                    <img src="{{asset($sub_category->image)}}" alt="" height="60" width="80">
                                </td>
                                <td>
                                    <a href="{{route('sub-category.edit', ['id' => $sub_category->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('sub-category.delete', ['id' => $sub_category->id])}}"  onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

