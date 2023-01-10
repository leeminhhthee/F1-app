@extends('user.layout')
@section('content')
<div class="app-main__outer">
    <div class="page-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Order detail</li>
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
                    <?php $i=1?>
                    <?php $total=0 ?>
                    @foreach ($views as $view)
                        @if($i==1)    
                        <h1 class="h2">Order Details #<b>{{ $view->or_transaction_id }}</b></h1>
                        @endif
                    <?php  $total += $view->or_qty*($view->or_price * (100 - $view->pro_sale)/100)?>
                    <?php $i++?>
                    @endforeach
                </div>
             </div>
          </div>
        </div>
 
        <div class="row">
          <div class="col-sm-12">
             <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>N.o</th>
                        <th>Product</th>
                        <th>Product name</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Sale</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($views as $view)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <img src="{{ asset(pare_url_file($view->pro_avatar))}}" class="img-responsive" style="width: 100px"/>
                        </td>
                        <td style="width: 40%;">
                            <h6>{{ $view->pro_name }}</h6>
                        </td>
                        <td>{{ $view->or_qty }}</td>
                        <td>
                            <div>{{ number_format($view->or_price,'0','','.',).' VND' }}</div>
                        </td>
                        <td>{{ $view->pro_sale }} %</td>
                        <td>{{ number_format(($view->or_price-($view->or_price*$view->pro_sale)/100)*$view->or_qty,'0','','.',).' VND' }}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach   
                </tbody>
            </table>
          </div>
       </div>
    </div>
    <!-- End Main -->
 </div>
@stop
