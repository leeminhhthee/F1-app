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
                  Update your information
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12">
             
             <form action="" method="POST">
                 @csrf
                 <div class="form-group">
                     <label for="email">Email:</label>
                     <input type="email" disabled class="form-control" placeholder="Enter email" name="email" value="{{ $user->email }}" required>
                 </div>
                 <div class="form-group">
                     <label for="name">Full name:</label>
                     <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ $user->name }}" required>
                 </div>
                 <div class="form-group">
                     <label for="phone">Phone number:</label>
                     <input type="text" class="form-control" placeholder="Enter phone number" name="phone" value="{{ $user->phone }}" required>
                 </div>
                 <div class="form-group">
                     <label for="address">Address:</label>
                     <input type="text" class="form-control" placeholder="Enter your address" name="address" value="{{ $user->address }}">
                 </div>
                 <div class="form-group">
                     <label for="about">Introduce yourself:</label>
                     <textarea name="about" class="form-control" cols="30" rows="5" placeholder="Introduce about you ... ">{{ $user->about }}</textarea>
                 </div>
                 <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
             </form>
 
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop