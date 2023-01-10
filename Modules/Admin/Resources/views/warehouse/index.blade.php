@extends('admin::layouts.main')
@section('content')
<style>
   .rating .active{
      color: #ff9705 !important;
   }
    .page-title-actions .btn-primary {
    color: #fff;
    background-color: #787a80 !important;
    border-color: #787a80 !important;
   }
   .page-title-actions .active{
      background-color: red !important;
      border-color: red !important;
   }
  
</style>
<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.warehouse') }}">Warehouse</a></li>
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
                  Warehouse 
                  <div class="page-title-subheading">
                     View, create, update, delete and manage.
                  </div>
                  </div>
               </div>
               <div class="page-title-actions">
                  <a href="?type=inventory" class="btn-shadow btn-hover-shine mr-1 btn btn-primary  {{ Request::get('type') == "inventory" || !Request::get('type') ? "active" : "" }}">
                       <span class="btn-icon-wrapper pr-2 opacity-7">
                       </span>
                       Inventory
                  </a>
                  <a href="?type=pay" class="btn-shadow btn-hover-shine mr-3 btn btn-primary {{ Request::get('type') == "pay" ? "active" : "" }}">
                     <span class="btn-icon-wrapper pr-2 opacity-7">
                     </span>
                     Best seller
                </a>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="main-card mb-3 card">

                  <div class="card-header">
                     <form>
                        <div class="input-group">
                           <input type="search" placeholder="Product name search..." name="name" value="{{ \Request::get('name') }}"
                                 class="form-control">
                           <select class="form-control" name="cate">
                              <option value="">--Choose the product type--</option>
                              @if (isset($categories))
                                 @foreach ($categories as $category)
                                       <option value="{{ $category->id }}" {{ \Request::get('cate')== $category->id ? "selected=selected" : "" }}> {{ $category->c_name }}</option>
                                 @endforeach          
                              @endif
                           </select>
                           @if($errors->has('pro_cate_id'))
                              <span class="error-text">
                                 {{$errors->first('pro_cate_id')}}
                              </span>
                           @endif
                           <span class="input-group-append">
                              <button type="submit" class="btn btn-primary">
                                 <i class="fa fa-search"></i>&nbsp;
                                 Search
                              </button>
                           </span>
                        </div>
                     </form>
                  </div>

                  <div class="table-responsive">
                     <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                           <tr>
                              <th class="text-center">ID</th>
                              <th>Product / Type</th>
                              <th class="text-center">Price / Sale</th>
                              <th class="text-center">Qty</th>
                              <th class="text-center">Number of sales</th>
                              <th class="text-center">Featured</th>
                              <th class="text-center">Outstanding</th>
                              <th class="text-center">Actions</th>
                           </tr>
                        </thead>

                        <tbody>
                           @if (isset($products))
                           @foreach ($products as $product)
                           <?php 
                           $age = 0;
                           if ($product->pro_total_rating > 0)
                              $age = round($product->pro_total_number / $product->pro_total_rating,2)
                           ?>
                           <tr>
                              <td class="text-center text-muted">#{{ $product->id }}</td>
                              <td style="width: 500px">
                                 <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                       <div class="widget-content-left mr-3">
                                          <div class="widget-content-left">
                                                <img style="height: 80px; width: 80px; object-fit: contain"
                                                   data-toggle="tooltip" title="Product Image"
                                                   data-placement="bottom"
                                                   src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="">
                                          </div>
                                       </div>
                                       <div class="widget-content-left flex2">
                                          <div class="widget-heading">{{ $product->pro_name }}</div>
                                          <div class="widget-subheading opacity-7">
                                             {{ isset($product->category->c_name) ? $product->category->c_name : ['N\A'] }}
                                          </div>
                                          <span class="rating">
                                             @for ($i = 1;$i <= 5; $i++)
                                                <i class="fa fa-star {{ $i <= $age ? 'active' : '' }}" style="color: #999"></i>
                                             @endfor
                                          </span> 
                                          <span>{{ $age }}</span>  
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                       <div class="widget-content-left flex2">
                                          <div class="widget-heading">
                                             {{ number_format($product->pro_price,'0','','.',).' VND' }}   
                                          </div>
                                          <div class="widget-subheading opacity-7">
                                             {{ $product->pro_sale }} %  
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-center">{{ $product->pro_number }}</td>
                              <td class="text-center">{{ $product->pro_pay }}</td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.action.product', ['active', $product->id]) }}" class="mt-2 badge {{ $product->getStatus($product->pro_active)['class'] }}">{{ $product->getStatus($product->pro_active)['name'] }}</a>
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.action.product', ['hot', $product->id]) }}" class="badge {{ $product->getHot($product->pro_hot)['class'] }}">{{ $product->gethot($product->pro_hot)['name'] }}</a>
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.edit.product', $product->id) }}" data-toggle="tooltip" title="Edit"
                                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                       <span class="btn-icon-wrapper opacity-8">
                                          <i class="fa fa-edit fa-w-20"></i>
                                       </span>
                                 </a>
                                 <form class="d-inline" action="" method="post">
                                       <a href="{{ route('admin.get.action.product', ['delete', $product->id]) }}"
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
                     {{ $products->appends($query)->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop