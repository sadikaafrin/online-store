@extends('layouts.app')
@section('body')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Category Module</h4>


            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Category Form</h4>
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control" onchange="getSubCategoryByCategory(this.value)">
                                    <option value=""> -- Select Product Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select name="sub_category_id" class="form-control" id="subCategoryId">
                                    <option value=""> -- Select Sub Product Category -- </option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}" {{$product->sub_category_id == $sub_category->id ? 'selected' : ''}}>{{ $sub_category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <select name="brand_id" class="form-control">
                                    <option value=""> -- Select Product Brand -- </option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select name="unit_id" class="form-control">
                                    <option value=""> -- Select Product Unit -- </option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{$product->unit_id == $unit->id ? 'selected': ''}}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$product->name}}" id="firstName" name="name" placeholder="Product Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$product->code}}"  name="code" placeholder="Product Code" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input class="form-control" value="{{$product->regular_price}}" name="regular_price" placeholder="Regular Price" type="number">
                                    <input class="form-control" value="{{$product->selling_price}}" name="selling_price" placeholder="Selling Price" type="number">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Stock Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$product->stock_amount}}"  name="stock_amount" placeholder="Stock Amount" type="number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" name="short_description" placeholder="Category Description">{{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote"  name="long_description" placeholder="Category Description">{{$product->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="product_status" class="col-md-3 form-label">Product Status</label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="product_status" id="new_arrival" value="1" {{ $product->product_status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="new_arrival">New Arrival</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="product_status" id="best_selling" value="2" {{ $product->product_status == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="best_selling">Best Sellers</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="product_status" id="featured" value="3" {{ $product->product_status == 3 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="trending_product">Featured</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="product_status" id="special_offer" value="4" {{ $product->product_status == 4 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="special_offer">Special Offer</label>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" name="image" type="file">
                                <img src="{{asset($product->image)}}" alt="" height="100" width="130">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" multiple name="other_image[]" type="file">
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" alt="" height="100" width="130">
                                @endforeach
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-success w-md">Update Product Information</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        $('#summernote').summernote({
                            tabsize: 2,
                            height: 220,
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
