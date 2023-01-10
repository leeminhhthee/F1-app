@extends('admin::layouts.main')
@section('content')
<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.user') }}">Member</a></li>
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
                     User management
                     <div class="page-title-subheading">
                        View, create, delete and manage.
                     </div>
                  </div>
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
                           <th>Full Name</th>
                           <th class="text-center">Email</th>
                           <th class="text-center">Level</th>
                           <th class="text-center">Phone number</th>
                           <th class="text-center">Actions</th>
                           </tr>
                     </thead>
                     <tbody>
                        @if (isset($users))
                        @foreach ($users as $user)
                        <tr>
                           <td class="text-center text-muted">{{ $user->id }}</td>
                           <td>
                              <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                       <div class="widget-content-left mr-3">
                                          <div class="widget-content-left">
                                                <img width="40" class="rounded-circle"
                                                   data-toggle="tooltip" title="Image"
                                                   data-placement="bottom"
                                                   src="{{ asset(pare_url_file($user->avatar)) }}" alt="">
                                          </div>
                                       </div>
                                       <div class="widget-content-left flex2">
                                          <div class="widget-heading">{{ $user->name }}</div>
                                       </div>
                                    </div>
                              </div>
                           </td>
                           <td class="text-center">{{ $user->email }}</td>
                           <td class="text-center">
                              User
                           </td>
                           <td class="text-center">{{ $user->phone }}</td>
                           <td class="text-center">
                              <a href="{{ route('admin.get.action.user', ['active', $user->id]) }}" class="mt-2 badge {{ $user->getStatus($user->active)['class'] }}">{{ $user->getStatus($user->active)['name'] }}</a>
                              <a href="{{ route('admin.get.action.user', ['delete', $user->id]) }}" onclick="return confirm('Do you really want to delete this item?')">
                                 <span class="btn-icon-wrapper opacity-8">
                                    <i class="fa fa-trash fa-w-20"></i>
                                 </span>
                              </a>
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>

               <div class="d-block card-footer">
               {{ $users->links() }}
               </div>

            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop