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
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.contact') }}">Contact</a></li>
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
                  Contact
                  <div class="page-title-subheading">
                     View, delete and manage.
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
                              <th>Title</th>
                              <th>Customer Name</th>
                              <th class="text-center">Email</th>
                              <th>Content</th>
                              <th class="text-center">Created at</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Actions</th>
                           </tr>
                        </thead>

                        <tbody>
                           @foreach ($contacts as $contact)
                           <tr>
                              <td class="text-center">{{ $contact->id }}</td>
                              <td>{{ $contact->c_title }}</td>
                              <td>{{ $contact->c_name }}</td>
                              <td class="text-center">{{ $contact->c_email }}</td>
                              <td>{{ $contact->c_content }}</td>
                              <td class="text-center">
                                 {{ $contact->created_at }}
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.action.contact', ['active', $contact->id]) }}" class="badge {{ $contact->getStatus($contact->c_status)['class'] }}">{{ $contact->getStatus($contact->c_status)['name'] }}</a>
                              </td>
                              <td class="text-center">
                                 <a href="" data-toggle="tooltip" title="reply"
                                    data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                    <span class="btn-icon-wrapper opacity-8">
                                       <i class="fas fa-reply fa-w-20"></i>
                                    </span>
                                 </a>
                                 <form class="d-inline" action="" method="post">
                                       <a href="{{ route('admin.get.action.contact', ['delete', $contact->id]) }}" onclick="return confirm('Do you really want to delete this item?')">
                                          <span class="btn-icon-wrapper opacity-8">
                                             <i class="fa fa-trash fa-w-20"></i>
                                          </span>
                                       </a>
                                 </form>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>

                  <div class="d-block card-footer">
                     {{ $contacts->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop