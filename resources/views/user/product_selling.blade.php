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

   /* highchart */
   .highcharts-figure,
   .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
   }

   #container {
      height: 400px;
   }

   .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
   }

   .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
   }

   .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
   }

   .highcharts-data-table td,
   .highcharts-data-table th,
   .highcharts-data-table caption {
      padding: 0.5em;
   }

   .highcharts-data-table thead tr,
   .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
   }

   .highcharts-data-table tr:hover {
      background: #f1f7ff;
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
                  Selling Products
               </div>
            </div>
         </div>
       </div>

       <div class="row">
         <div class="col-sm-12">
            <table class="table table-striped table-sm">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>Image</th>
                       <th>Product Name</th>
                       <th style="text-align: center">Sale</th>
                       <th>Price</th>
                       <th>Number of purchases</th>
                   </tr>
               </thead>
               <tbody>
                   @if (isset($products))
                   @foreach ($products as $product)
                   @if($product->pro_pay > 0)
                       <tr>
                           <td>{{ $product->id }}</td>
                           <td style="width: 110px;">
                               <img src="{{ asset(pare_url_file($product->pro_avatar)) }}" class="img img-responsive" style="width: 100%">
                           </td>
                           <td style="width: 500px"><a href="{{ route('get.detail.product',[$product->pro_slug, $product->id]) }}">{{ $product->pro_name }}</a></td>
                           <td style="text-align: center">{{ $product->pro_sale }} %</td>
                           <td style="width: 260px; ">
                               @if($product->pro_sale > 0)
                               <del>{{ number_format($product->pro_price,0,',','.') }} VND</del> <i class="fa fa-arrow-right"></i> {{ number_format($product->pro_price-($product->pro_price*$product->pro_sale/100),0,',','.') }} VND
                               @else
                               {{ number_format($product->pro_price,0,',','.') }} VND
                               @endif
                           </td>
                           <td style="width: 151px;text-align: center;">{{ $product->pro_pay }}</td>
                       </tr>
                   @endif
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