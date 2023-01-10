<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="form-group">
                                <label for="page_name">Page Name</label><span class="required"> *</span>
                                <input required type="text" placeholder="Enter the page name..." class="form-control" value="{{ old('ps_name', isset($page->ps_name) ? $page->ps_name : '') }}" name="ps_name">
                            </div>
                            <div class="form-group">
                                <label for="page_select">Page Type</label><span class="required"> *</span>
                                <input required type="text" placeholder="Enter the page type..." class="form-control" value="{{ old('ps_type', isset($page->ps_type) ? $page->ps_type : '') }}" name="type">

                                {{-- <select name="type" class="form-control">
                                    <option value="About Us">About Us</option>
                                    <option value="Delivery Information">Delivery Information</option>
                                    <option value="Privacy Policy">Privacy Policy</option>
                                    <option value="Terms & Condition">Terms & Condition</option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label for="Content">Content</label><span class="required"> *</span>
                                <textarea required name="ps_content" class="form-control" cols="500" rows="0">{{ old('ps_content', isset($page->ps_content) ? $page->ps_content : '') }}</textarea>
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
        CKEDITOR.replace('ps_content');
    </script>
@stop