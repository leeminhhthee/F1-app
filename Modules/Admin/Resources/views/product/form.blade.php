<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="pro_name">Product Name</label><span class="required"> *</span>
                                <input type="text" placeholder="Enter the product name..." class="form-control" value="{{ old('pro_name', isset($product->pro_name) ? $product->pro_name : '') }}" name="pro_name">
                                @if($errors->has('pro_name'))
                                    <span class="error-text">
                                        {{$errors->first('pro_name')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Describe">Describe</label><span class="required"> *</span>
                                <textarea name="pro_description" class="form-control" cols="500" rows="0" >{{ old('pro_description', isset($product->pro_description) ? $product->pro_description : '') }}</textarea>
                                @if($errors->has('pro_description'))
                                    <span class="error-text">
                                        {{$errors->first('pro_description')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Content">Content</label><span class="required"> *</span>
                                <textarea name="pro_content" class="form-control" cols="500" rows="0">{{ old('pro_content', isset($product->pro_content) ? $product->pro_content : '') }}</textarea>
                                @if($errors->has('pro_content'))
                                    <span class="error-text">
                                        {{$errors->first('pro_content')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="MetaTitle">Meta Title</label>
                                <input type="text" placeholder="Meta title" class="form-control" value="{{ old('pro_title_seo', isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}" name="pro_title_seo">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="qty">Quantity</label><span class="required"> *</span>
                                <input type="number" value="{{ old('pro_number', isset($product->pro_number) ? $product->pro_number : '0') }}" name="pro_number" class="form-control" placeholder="Qty" min="0">
                            </div>
                            <div class="form-group">
                                <label for="MetaDes">Meta Description</label>
                                <input type="text" placeholder="Meta description" class="form-control" value="{{ old('pro_description_seo', isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}" name="pro_description_seo">
                            </div>
                            <div class="form-group">
                                <label for="ProductType">Product Type</label><span class="required"> *</span>   
                                <select class="form-control" name="pro_cate_id">
                                    <option value="">--Choose the product type--</option>
                                    @if (isset($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('pro_cate_id', isset($product->pro_cate_id) ? $product->pro_cate_id : '') == $category->id ? "selected=selected" : "" }}> {{ $category->c_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('pro_cate_id'))
                                    <span class="error-text">
                                        {{$errors->first('pro_cate_id')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <img id="out_img" src="{{ asset('img/no-image.jpg') }}" alt="" style="width: 100%">
                            </div>
                            <div class="form-group">
                                <label for="Image">Image</label><span class="required"> *</span><br>
                                <input type="file" class="form-control-file" name="pro_avatar" id="input_img">
                            </div>
                            <div class="form-group">
                                <label for="price">Product price</label><span class="required"> *</span>
                                <input type="number" name="pro_price" class="form-control" value="{{ old('pro_price', isset($product->pro_price) ? $product->pro_price : '') }}">
                                @if($errors->has('pro_price'))
                                    <span class="error-text">
                                        {{$errors->first('pro_price')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Discount">Discount</label>
                                <input type="number" value="{{ old('pro_sale', isset($product->pro_sale) ? $product->pro_sale : '0') }}" name="pro_sale" class="form-control" placeholder="% Discount" min="0">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hot">  Outstanding</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
@stop