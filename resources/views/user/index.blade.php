@extends('user.layout')
@section('content')

<style>
   .placeholders {
    margin-bottom: 30px;
    text-align: center;
   }
   .row {
      margin-right: -15px;
      margin-left: -15px;
      margin-bottom: 20px
   }
   .col-sm-3, .col-sm-6{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
   }
   .placeholders {
      margin-bottom: 30px;
      text-align: center;
   }
   .placeholder img {
      display: inline-block;
      border-radius: 50%;
   }
   .img-responsive{
      display: block;
      max-width: 100%;
      height: auto;
   }
   .placeholders img {
      vertical-align: middle;
   }
   .placeholders {
      margin-bottom: 30px;
      text-align: center;
   }

   @media (min-width: 768px){
      .col-sm-3 {
         width: 25%;
      }
   }

   .card-body {
      font-size: 30px;
      font-weight: bolder;
   }
</style>

<div class="app-main__outer">

   <!-- Main -->
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
               </div>
               <div>
                  OVERVIEW
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="row">
            <div class="col-xl-3 col-md-6">
               <div class="card bg-primary text-white mb-4">
                   <div class="card-body">{{ $totalTransaction }} Orders</div>
                   <div class="card-footer d-flex align-items-center justify-content-between">
                       <a class="small text-white stretched-link" href="#">View Details</a>
                       <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                   </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-warning text-white mb-4">
                   <div class="card-body" style="width: 350px">{{ $totalRating }} Commented</div>
                   <div class="card-footer d-flex align-items-center justify-content-between">
                       <a class="small text-white stretched-link" href="#">View Details</a>
                       <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                   </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-success text-white mb-4">
                   <div class="card-body">{{ $totalTransactionDone }} Processed</div>
                   <div class="card-footer d-flex align-items-center justify-content-between">
                       <a class="small text-white stretched-link" href="#">View Details</a>
                       <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                   </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-danger text-white mb-4">
                   <div class="card-body" style="width: 350px;">{{ $totalTransaction - $totalTransactionDone }} Processing</div>
                   <div class="card-footer d-flex align-items-center justify-content-between">
                       <a class="small text-white stretched-link" href="#">View Details</a>
                       <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                   </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12">
            <h2>Your Order List</h2>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>Total order amount</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($transactions))
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->tr_address }}</td>
                        <td>{{ $transaction->tr_phone }}</td>
                        <td>{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                        <td>{{ $transaction->created_at->format('d-m-Y h:i:s A') }}</td>
                        <td>
                           @if ($transaction->tr_status == 1)
                              <a href="#" class="badge bg-success" style="color: white">Processed</a>
                           @else
                              <a href="#" class="badge bg-secondary" style="color: white">Processing</a>
                           @endif
                        </td>
                        <td>
                           <a style="font-size: 12px; border-radius: 6px; padding: 5px 10px; border: 1px solid #999" href="{{ route('get.view.order', $transaction->id) }}"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table> 
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop