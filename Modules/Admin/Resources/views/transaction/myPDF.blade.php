<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <title>Order Notification</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link href="{{ asset('admin_style/main.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_style/my_style.css') }}" rel="stylesheet">
    <style>
        .error-text {
            color: red;
            font-style: italic;
            font-size: 13px;
        }
        .required {
            color: red;
            font: bolder;
            font-size: 15px;
        }
    </style>
    <script>
        window.onload = function () {
            window.print();
        }
    </script>
</head>

<body style="background-color: #e7eff8; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
<div class="container-fluid">
    <div class="container" style="background-color: #e7eff8; width: 600px; margin: auto;">
        <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">
            {{-- <div class="row">
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">
                    </div>
                    <div class="page-title-actions" style="margin-left: -15px;margin-bottom: 10px;">
                        <a onclick="window.print()" href="" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-print"></i>
                            </span>
                            Print 
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="row"
                 style="height: 85px; padding: 10px 20px; line-height: 90px; background-color: white; box-sizing: border-box;">
                <span class="pl-3"
                    style="color: orange; line-height: 00px; float: left; padding-left: 20px; padding-top: 5px;">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" style="padding-left: 145px">
                    <div style="padding-top: 30px;color: black;">
                        @foreach ($transactions as $transaction)
                        @if($transaction->id == $id)
                        <b>Order date:</b> {{ $transaction->created_at->format('d-m-Y h:i:s A') }}
                        @endif
                        @endforeach
                    </div>
                </span>
            </div>

            <div class="row" style="background-color: #00509d; height: 300px; padding: 35px; color: white;">
                <div class="container-fluid">
                    <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                        <strong style="font-size: 32px;">HÓA ĐƠN</strong>
                        <br>
                        Cảm ơn bạn đã mua hàng!
                    </h3>
                    <div class="row mt-5" style="margin-top: 35px; display: flex;">
                        <div class="col-6"
                             style="margin-bottom: 25px; flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                            <b>Người gửi: VuRoT Shop</b>
                            <br>
                            <span>0974649644</span>
                            <br>
                            <b>Địa chỉ:</b> 470 Tran Dai Nghia
                        </div>
                        <?php $i=1?>
                        <?php $total=0 ?>
                        @foreach ($views as $view)
                        @if($i==1)
                        <div class="col-6" style="flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                            <b>Người nhận: {{ $view->name }}</b>
                            <br>
                            <span>{{ $view->tr_phone }}</span>
                            <br>
                            <b>Địa chỉ:</b> {{ $view->tr_address }}
                            <br>
                            <span>
                                <a style="color: white !important;" href="mailto:{{ $view->email }}" target="_blank">{{ $view->email }}</a>
                            </span>
                        </div>
                        @endif
                        <?php  $total += $view->or_qty*($view->or_price * (100 - $view->pro_sale)/100)?>
                        <?php $i++?>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mt-2 p-4" style="background-color: white; margin-top: 15px; padding: 20px;">
                <table>
                    <tr>
                        <td>
                            <img
                                src="https://ci6.googleusercontent.com/proxy/8eUxMUXMkvgUKX8veBCRQM5N7-jXP0Wx8KjQLaGDch2DnV_5HYw9PMgJXsoqgSR_jonTY9jAftWPKNsN5W9cUUneQ9hz7IhxH4rIXNzHMm0ijbsNjHB9m7g6XfJJ=s0-d-e1-ft#https://www.bambooairways.com/reservation/common/hosted-images/tickets.jpg"
                                alt="">
                        </td>
                        <td class="pl-3" style=" padding-left:15px;">
                            <?php $i=1?>
                            <?php $total=0 ?>
                            @foreach ($views as $view)
                            @if($i==1)
                            <span class="d-inline"
                                    style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                You will pay on delivery. <br>
                                Note: <i>{{ $view->tr_note }}</i>
                            </span>
                            @endif
                            <?php  $total += $view->or_qty*($view->or_price * (100 - $view->pro_sale)/100)?>
                            <?php $i++?>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>

            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b>Order details</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px 10px 20px;">
                        <table class="table table-sm table-hover"
                               style="text-align: left;  width: 100%; margin-bottom: 5px; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="padding: 5px 0;">PRODUCT</th>
                                    <th style="padding: 5px 20px 5px 0; text-align: right;">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($views as $view)
                                <tr>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 0;">
                                        {{ $view->pro_name }} (Sale: {{ $view->pro_sale }} %) * QTY: {{ $view->or_qty }} 
                                    </td>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 20px 5px 0; text-align: right;">
                                        {{ number_format($view->or_price-($view->or_price*$view->pro_sale)/100,'0','','.',).' VND' }}
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2"
                         style="background-color: #fff; font-size: 18px; padding: 2px 20px 10px 20px;">
                        <div class="col-12 p-0">
                            <hr style="border-top: 1px solid #0000001a;">
                            <table class="mt-2 w-100"
                                   style="font-size: 16px; width: 100%; text-align: left;  margin-bottom: 5px;">
                                <tr>
                                    <td class="">Shipping fee</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        0.0 VND
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Subtotal</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        {{ number_format($total,'0','','.',).' VND' }}
                                    </td>
                                </tr>
                                <tr style="font-size: 18px;">
                                    <td><b>TOTAL</b></td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        <b>{{ number_format($total,'0','','.',).' VND' }}</b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 mb-4" style="margin-top: 15px; margin-bottom: 25px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b style="color: #00509d; font-size: 18px;">VuRoT Shop thank you !</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
