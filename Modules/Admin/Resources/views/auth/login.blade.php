<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Admin</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
        background-color: white;
        }
    
        #loginbox {
            margin-top: 30px;
        }
    
        #loginbox > div:first-child {        
            padding-bottom: 10px;    
        }
    
        .iconmelon {
            display: block;
            margin: auto;
        }
    
        #form > div {
            margin-bottom: 25px;
        }
    
        #form > div:last-child {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    
        .panel {    
            background-color: transparent;
        }
    
        .panel-body {
            padding-top: 30px;
            background-color: rgba(2555,255,255,.3);
        }
    
        #particles {
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;                        
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            z-index: -2;
        }
    
        .iconmelon,
        .im {
        position: relative;
        width: 150px;
        height: 50px;
        display: block;
        fill: #525151;
        }
    
        .iconmelon:after,
        .im:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 10px;">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row">                
            <div class="iconmelon">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </div>
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center"><a href="http://localhost:8080/example-app/public/home" target="_blank">vurot.com</a></div>
            </div>     

            <div class="panel-body" >

                <form action="" name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                   @csrf
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required>                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
                        </div>
                    </div>

                </form>     

            </div>                     
        </div>  
    </div>
</div>

    
</body>
</html>
