<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">       
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="CategoryName">Brand Name</label><span class="required"> *</span>
                        <input type="text" class="form-control" value="{{ old('CategoryName', isset($category->c_name) ? $category->c_name : '') }}" name="CategoryName">
                        @if($errors->has('CategoryName'))
                            <span class="error-text">
                                {{$errors->first('CategoryName')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <img id="out_img" src="{{ asset('img/no-image.jpg') }}" alt="" style="width: 30%">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label><br>
                        <input type="file" class="form-control-file" name="avatar" id="input_img">
                    </div>
                    <div class="form-group">
                        <label for="MetaTitle">Meta Title</label>
                        <input type="text" placeholder="Meta title" class="form-control" value="{{ old('c_title_seo', isset($category->c_title_seo) ? $category->c_title_seo : '') }}" name="c_title_seo">
                    </div>
                    <div class="form-group">
                        <label for="MetaDes">Meta Description</label>
                        <input type="text" placeholder="Meta description" class="form-control" value="{{ old('c_description_seo', isset($category->c_description_seo) ? $category->c_description_seo : '') }}" name="c_description_seo">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" name="hot">  Outstanding</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>