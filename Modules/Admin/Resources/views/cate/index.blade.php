@extends('admin::layouts.main')
@section('content')
<style>
   .rating .active{
      color: #ff9705 !important;
   }
</style>
<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.category') }}">Brand</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
   </div>
   <!-- Main -->
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
               </div>
               <div>
                  Brand
                  <div class="page-title-subheading">
                     View, create, update, delete and manage.
                  </div>
                  </div>
               </div>

               <div class="page-title-actions">
                  <a href="{{ route('admin.get.create.category') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                       <span class="btn-icon-wrapper pr-2 opacity-7">
                           <i class="fa fa-plus fa-w-20"></i>
                       </span>
                       Create
                  </a>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="main-card mb-3 card">

                  <div class="table-responsive">
                     <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                           <tr>
                              <th class="text-center">ID</th>
                              <th class="text-center">Brand</th>
                              <th></th>
                              <th class="text-center">Title</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Show on home page?</th>
                              <th class="text-center">Actions</th>
                           </tr>
                        </thead>

                        <tbody>
                           @if (isset($categories))
                           @foreach ($categories as $category)
                           <tr>
                              <td class="text-center text-muted">#{{ $category->id }}</td>
                              <td class="text-center">{{ $category->c_name }}</td>
                              <td style="width: 100px">
                                 <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                       <div class="widget-content-left mr-3">
                                          <div class="widget-content-left">
                                             @if (isset($category->c_avatar))
                                                <img style="height: 80px; width: 80px; object-fit: contain"
                                                   data-toggle="tooltip" title="{{ $category->c_name }}"
                                                   data-placement="bottom"
                                                   src="{{ asset(pare_url_file($category->c_avatar)) }}" alt="">
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-center">{{ $category->c_title_seo }}</td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.action.category', ['active', $category->id]) }}" class="badge {{ $category->getStatus($category->c_active)['class'] }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.action.category', ['home', $category->id]) }}" class="badge {{ $category->getHome($category->c_home)['class'] }}">{{ $category->getHome($category->c_home)['name'] }}</a>
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.edit.category', $category->id) }}" data-toggle="tooltip" title="Edit"
                                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                       <span class="btn-icon-wrapper opacity-8">
                                          <i class="fa fa-edit fa-w-20"></i>
                                       </span>
                                 </a>
                                 <form class="d-inline" action="" method="post">
                                       <a href="{{ route('admin.get.action.category', ['delete', $category->id]) }}"
                                          onclick="return confirm('Do you really want to delete this item?')">
                                          <span class="btn-icon-wrapper opacity-8">
                                             <i class="fa fa-trash fa-w-20"></i>
                                          </span>
                                       </a>
                                 </form>
                              </td>
                           </tr>
                           @endforeach
                           @endif
                        </tbody>
                     </table>
                  </div>

                  <div class="d-block card-footer">
                     {{ $categories->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop