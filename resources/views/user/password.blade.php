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
                   Update your password
                </div>
             </div>
          </div>
        </div>
 
        <div class="row">
            <div class="col-sm-12">
            
                <form action="" method="POST">
                    @csrf
                    <div class="form-group" style="position: relative">
                        <label for="password_old">Old password:</label>
                        <input type="password" class="form-control" placeholder="Enter your old password" name="password_old" value="">
                        <a style="position: absolute;top: 54%; right: 10px;" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                        @if($errors->has('password_old'))
                        <span class="error-text">
                            {{$errors->first('password_old')}}
                        </span>
                    @endif
                    </div>
                    <div class="form-group" style="position: relative">
                        <label for="password">New password:</label>
                        <input type="password" class="form-control" placeholder="Enter your new password" name="password" value="">
                        <a style="position: absolute;top: 54%; right: 10px;" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                        @if($errors->has('password'))
                        <span class="error-text">
                            {{$errors->first('password')}}
                        </span>
                    @endif
                    </div>
                    <div class="form-group" style="position: relative">
                        <label for="confirm_password">Confirm new password:</label>
                        <input type="password" class="form-control" placeholder="Enter your new password again" name="confirm_password" value="">
                        <a style="position: absolute;top: 54%; right: 10px;" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                        @if($errors->has('confirm_password'))
                        <span class="error-text">
                            {{$errors->first('confirm_password')}}
                        </span>
                    @endif
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                </form>

            </div>
        </div>
    </div>
    <!-- End Main -->
</div>
@stop
@section('script')
    <script>
        $(function(){
            $(".form-group a").click(function(){
                let $this = $(this);
                if ($this.hasClass('active'))
                {
                    $this.parents('.form-group').find('input').attr('type','password');
                    $this.removeClass('active');
                }else 
                {
                    $this.parents('.form-group').find('input').attr('type','text');
                    $this.addClass('active');
                }
            });
        });
    </script>
@stop