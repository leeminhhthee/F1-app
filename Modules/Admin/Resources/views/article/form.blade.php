<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="a_name">Article Name</label><span class="required"> *</span>
                                <input type="text" placeholder="Enter the article name..." class="form-control" value="{{ old('a_name', isset($article->a_name) ? $article->a_name : '') }}" name="a_name">
                                @if($errors->has('a_name'))
                                    <span class="error-text">
                                        {{$errors->first('a_name')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Describe">Describe</label>
                                <textarea name="a_description" class="form-control" cols="500" rows="0" >{{ old('a_description', isset($article->a_description) ? $article->a_description : '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Content">Content</label><span class="required"> *</span>
                                <textarea name="a_content" class="form-control" cols="500" rows="0">{{ old('a_content', isset($article->a_content) ? $article->a_content : '') }}</textarea>
                                @if($errors->has('a_content'))
                                    <span class="error-text">
                                        {{$errors->first('a_content')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="MetaTitle">Meta Title</label>
                                <input type="text" placeholder="Meta title" class="form-control" value="{{ old('a_title_seo', isset($article->a_title_seo) ? $article->a_title_seo : '') }}" name="a_title_seo">
                            </div>
                            <div class="form-group">
                                <label for="MetaDes">Meta Description</label>
                                <input type="text" placeholder="Meta description" class="form-control" value="{{ old('a_description_seo', isset($article->a_description_seo) ? $article->a_description_seo : '') }}" name="a_description_seo">
                            </div>

                            <div class="form-group">
                                <label for="Image">Image</label><br>
                                <input type="file" class="form-control-file" name="a_avatar">
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('a_content');
    </script>
@stop