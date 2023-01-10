@extends('admin::layouts.main')
@section('content')

<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.transaction') }}">Order</a></li>
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
                  Order
                  <div class="page-title-subheading">
                     View, create, update, delete and manage.
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
                              <th>Customer</th>
                              <th class="text-center" style="width: 200px">Address</th>
                              <th>Phone number</th>
                              <th class="text-center">Amount</th>
                              <th class="text-center">Created at</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Actions</th>
                           </tr>
                     </thead>
                     <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                           <td class="text-center text-muted">#{{ $transaction->id }}</td>
                           <td>
                              <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                       <div class="widget-content-left flex2">
                                          <div class="widget-heading">{{ isset($transaction->user->name) ? $transaction->user->name: '[N\A]' }}</div>
                                       </div>
                                    </div>
                              </div>
                           </td>
                           <td class="text-center">{{ $transaction->tr_address }}</td>
                           <td class="text-center">{{ $transaction->tr_phone }}</td>
                           <td class="text-center">{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                           <td class="text-center">{{ $transaction->created_at->format('d-m-Y h:i:s A') }}</td>
                           <td class="text-center">
                              @if ($transaction->tr_status == 1)
                                 <a href="" class="badge badge-success" style="color: white">Processed</a>
                              @else
                                 <a href="{{ route('admin.get.active.transaction',$transaction->id) }}" class="badge badge-dark" style="color: white">Processing</a>
                              @endif
                           </td>
                           <td class="text-center">
                              <a href="{{ route('admin.get.view.order', $transaction->id) }}"
                                    class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                    Details
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>

               <div class="d-block card-footer">
                  {{ $transactions->links() }}
               </div>

            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop
