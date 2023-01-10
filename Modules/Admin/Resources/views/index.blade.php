@extends('admin::layouts.main')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

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
                    <div class="card-body">{{ $totalProduct }} Products</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.product') }}">View Details</a>
                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{ $totalOrder }} Orders</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.transaction') }}">View Details</a>
                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">{{ $totalUser }} Members</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.user') }}">View Details</a>
                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">{{ $totalRating }} Reviews</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.rating') }}">View Details</a>
                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
         </div>
         {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
         <div class="row">
            <div class="col-sm-6">
               <figure class="highcharts-figure">
                  <div id="container"></div>
               </figure>
            </div>
            <div class="col-sm-6">
               <h2>New Order List</h2>
               <table class="table table-striped table-sm">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>Total order amount</th>
                        <th>Created at</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($transactionNews as $transactionNew)
                     <tr>
                     <td>{{ $transactionNew->id }}</td>
                     <td>{{ isset($transactionNew->user->name) ? $transactionNew->user->name: '[N\A]' }}</td>
                     <td>{{ $transactionNew->tr_address }}</td>
                     <td>{{ $transactionNew->tr_phone }}</td>
                     <td>{{ number_format($transactionNew->tr_total,0,',','.') }} VND</td>
                     <td>{{ $transactionNew->created_at->format('d-m-Y h:i:s A') }}</td>
                     <td>
                        @if ($transactionNew->tr_status == 1)
                           <a href="" class="badge bg-success" style="color: white">Processed</a>
                        @else
                           <a href="{{ route('admin.get.active.transaction',$transactionNew->id) }}" class="badge bg-secondary" style="color: white">Processing</a>
                        @endif
                     </td>
                  </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
            
         <div class="row">
            <div class="col-sm-6">
               <h2>Latest Contact List</h2>
               <div class="table-responsive">
                  <table class="table table-striped table-sm">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Title</th>
                           <th>Customer Name</th>
                           <th>Content</th>
                           <th>Created at</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                       @foreach ($contacts as $contact)
                       <tr>
                         <td>{{ $contact->id }}</td>
                         <td>{{ $contact->c_title }}</td>
                         <td>{{ $contact->c_name }}</td>
                         <td>{{ $contact->c_content }}</td>
                         <td>{{ $contact->created_at }}</td>
                         <td>
                            <a href="{{ route('admin.get.action.contact', ['active', $contact->id]) }}" class="badge {{ $contact->getStatus($contact->c_status)['class'] }}">{{ $contact->getStatus($contact->c_status)['name'] }}</a>
                         </td>
                      </tr>
                       @endforeach
                     </tbody>
                  </table>
                  </div>
               </div>
               <div class="col-sm-6">
                  <h2>Latest Review List</h2>
                  <div class="table-responsive">
                     <table class="table table-striped table-sm">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Customer Name</th>
                              <th>Product</th>
                              <th>Rating</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if (isset($ratings))
                           @foreach ($ratings as $rating)
                           <tr>
                              <td>{{ $rating->id }}</td>
                              <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                              <td>
                                  <a target="_blank" href="{{ route('get.detail.product',[$rating->product->pro_slug, $rating->product->id]) }}">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a>
                              </td>
                              <td>{{ $rating->ra_number }} <i class="fa fa-star" style="color: #ff9705"></i></td>
                           </tr>
                              @endforeach
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
    
@stop

@section('script')
<script>

   // Create the chart
   Highcharts.chart('container', {
      chart: {
         type: 'column'
      },
      title: {
         align: 'left',
         text: 'Revenue statistics chart of VUROT website!'
      },
      subtitle: {
         align: 'left',
         text: 'Click here to go the website. Source: <a href="{{ route('home') }}" target="_blank">VUROT</a>'
      },
      accessibility: {
         announceNewData: {
               enabled: true
         }
      },
      xAxis: {
         type: 'category'
      },
      yAxis: {
         title: {
               text: 'Total income of the website'
         }

      },
      legend: {
         enabled: false
      },
      plotOptions: {
         series: {
               borderWidth: 0,
               dataLabels: {
                  enabled: true,
                  format: '{point.y:.1f} VND'
               }
         }
      },

      tooltip: {
         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} VND </b> of total<br/>'
      },

      series: [
         {
               name: "VUROT",
               colorByPoint: true,
               data: [
                  {
                     name: "Revenue of the day",
                     y: {{ $moneyDay }},
                     drilldown: "Revenue of the day"
                  },
                  {
                     name: "Revenue of the month",
                     y: {{ $moneyMonth }},
                     drilldown: "Revenue of the month"
                  },
                  {
                     name: "Revenue of the year",
                     y: {{ $moneyYear }},
                     drilldown: "Revenue the the year"
                  }
               ]
         }
      ]
   });
</script>
@stop
