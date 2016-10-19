<?php
$totalApplicants = $applicantsTotal;
$notRated = $totalApplicants - $rated;

function checkPrev($ref_num, $rateTable, $index, $user) {
    $prev = false;

        //  return print_r($rateTable);
    foreach($rateTable as $ratee) {
        if($ratee->ref_num==$ref_num && trim($ratee->name)==trim($user)) {
            return print_r('<span class="badge ratebg" id="rtval'.$index.'">'.$ratee->rating.'</span>');
        } else {
            return print_r('<div id="rate'.$index.'" class="rateYo"></div><span class="badge" id="rtval'.$index.'">0</span>');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Interview</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pace.green.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/ladda.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.rateyo.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Roboto';
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <!--<div id="data">
            
</div>-->
<body class="ash">
    <noscript>
        <h1>You must enable JavaScript To Continue</h1>
    </noscript>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Interview</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Interview') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/dashboard">Interview</a></li>
                    <li class="active"><a href="/rate2">Rating Table</a></li>
                    <li><a href="/panelists">Panelists</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;font-weight:bold;color:black;"><img src="{{asset('img/demo_wait.gif')}}" width="64" height="64"><br>Please wait...</div>

<div class="container" id="dt">
    <div class="row">
        <div class="col-md-12">
            <div>
              <!-- Nav tabs -->
              <h4>Total Applicants:  <span id="total">{{$totalApplicants}}</span> <!--&nbsp;&nbsp;&nbsp;&nbsp;Rated: <span id="totalR">{{$rated}}</span> &nbsp;&nbsp;Not Yet Rated: <span id="totalNR">{{$notRated}}</span>--></h4>
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation">
                    <a href="#rating" aria-controls="rating" role="tab" data-toggle="tab"><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i> My RATINGS</a>
                </li>
                            <!--<li role="presentation">
                                <a href="#education" aria-controls="settings" role="tab" data-toggle="tab">EDUCATIONAL BACKGROUND</a>
                            </li>-->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="rating">
                                <br>
                                <div class="col-md-3">
                                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                    <select class="form-control select2" id="apps" name="apps">
                                        <option value="0">Select Applicant</option>
                                        @foreach($applicants as $applicant)
                                        <option value="{{$applicant->ref_num}}">{{$applicant->f_name}} {{$applicant->l_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped" id="apprtt">
                                            <thead>
                                                <tr>
                                                    <th class="myinfo">#</th>
                                                    <th class="myinfo">Name</th>
                                                    <th class="myinfo">Rating/Comments</th>
                                                </tr>
                                            </thead>
                                            <tbody id="whbdy">
                                                <?php $count = 0; ?>
                                                @foreach($applicants as $applicant)
                                                <tr id="samplebody">
                                                    <th>{{$count+=1}}</th>
                                                    <th>{{$applicant->f_name}} {{$applicant->l_name}}</th>
                                                    <th>{{$applicant->rated}}</th>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--JavaScript Libraries-->
        <script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
        <script type="text/javascript" data-pace-options='{ "ajax": true }' src="{{asset('js/pace.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/spin.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/ladda.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.rateyo.min.js')}}"></script>
        <script type="text/javascript">
            function validateRating(rate) {
                var range = /^(?:5(?:\.0)?|[1-4](?:\.[0-9])?|0?\.[1-9])$/;
                return range.test(rate);
            }
            $(function() {
                $(".view").tooltip();
                $(".select2").select2();
                $("#apps").on("change", function(e) {
                    var selectedApp = $("#apps").val();
                    var _token = $("#_token").val();
                    var formData = {"refnum" : selectedApp, "_token" : _token};
                    $.get("/panelapprating", formData, function(data,xhr,status) {
                        $("#apprtt > tbody").html("");
                        var trHTML = "";
                        if(data.length<=0) {
                            trHTML = '<tr><td>Not Yet Rated</td></tr>';
                        } else {
                            $.each(data, function (i, item) {
                                var cc = 1;
                                trHTML += '<tr><td><i class="fa fa-chevron-right"></i></td><td>' + item.type + '</td><td>' + item.rating + '</td></tr>';
                                cc+=1;
                            });
                        }
                        $("#whbdy").append(trHTML);
                    });
                });
            //set properties for rating stars
            var rated;
            $(".rateYo").rateYo({
                onInit: function(rating, rateYoInstance) {
                    /*var initial = $('.rateYo').rateYo("option", "rating");
                    if(initial>0) {
                        var getit = $(this).attr('id');
                        id = getit[getit.length - 1];
                        $("#rtval"+id).html(initial);
                        $("#rate"+id).rateYo("destroy");
                    }*/
                },
                onSet: function(rating, rateYoInstance) {

                    $('.rateYo').click(function(e) {
                        e.preventDefault();
                        rated = $(this).attr('id');

                        //ajax to save the rating to the database
                        var id = rated[rated.length - 1];
                        var name_ref = "name" + id;
                        var refnum_ref = "ref_num" + id;
                        var image_ref = "img" + id;
                        var rate_ref = "rate" + id;
                        var name = $("#"+name_ref).text();
                        var ref_num = $("#"+refnum_ref).text();
                        var image = $("#"+image_ref).text();
                        var token = $("#_token").val();
                        var uname = $("#uname").val();

                        //before displaying rating form, check if the candidate has been rated by this user.
                        var checkData = {'refnum' : ref_num, 'user' : uname, '_token': token};
                        $.post('/checkrate', checkData, function(data,xhr,status){
                            console.log("Data from server: " + data);
                            console.log(typeof data);
                            var dataType = typeof data;
                            if(data=="" || data=="0" || data==null || dataType=="object") {
                                swal({   
                                    title: "Interview",   
                                    text: "Rate " + name + " between 0 - 5",   
                                    type: "input",
                                    showCancelButton: true,   
                                    closeOnConfirm: false,   
                                    animation: "slide-from-top",   
                                    inputPlaceholder: "Range 0 - 5" ,
                                    imageUrl: "" + image,
                                    inputValue: rating
                                }, 
                                function(inputValue){   
                                    if (inputValue === false) {return false;} 
                                    if (inputValue === "") {     
                                        swal.showInputError("Rating must be within 0 - 5");     
                                        return false;
                                    } 
                                    if(!validateRating(inputValue)) {
                                        swal.showInputError("Rating must be within 0 - 5");     
                                        return false;   
                                    }
                                    if(false) {
                                        $("#"+rate_ref).rateYo("option", "rating", 0);
                                    }
                                    swal({   
                                        title: "Interview",   
                                        text: "You can only rate an applicant once and this cannot be reversed. Continue?",   
                                        type: "warning",   
                                        showCancelButton: true,   
                                        confirmButtonColor: "#DD6B55",   
                                        confirmButtonText: "Yes, Continue!",   
                                        closeOnConfirm: false 
                                    }, 
                                    function(){
                                        swal({
                                            title: "Interview - Please wait...",
                                            text: "<div class='cssload-wrap'><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div><div class='cssload-circle'></div></div>",
                                            type: "success",
                                            html: true,
                                            showCancelButton: false,
                                            closeOnConfirm: false
                                        });
                                        var formData = {
                                            '_token'    :   token,
                                            'ref_num'   :   ref_num,
                                            'rating'    :   parseFloat(inputValue),
                                            'name'      :   uname
                                        };
                                        $.post('/rate', formData, function(data,xhr,status) {
                                            if(data) {
                                                swal("Interview", "" + name + " has been successfully rated.", "success"); 
                                                window.location.href="/dashboard";
                                            } else {
                                                swal("Interview", "an error occured. Please try again.", "warning"); 
                                            }
                                        }); 
                                    });
                                });
                                //end ajax to save rating in database
                            } else {
                                swal("Interview", "You have already rated " + name, "error");
                            }
                        });

});
}
});
$(".rateYo").rateYo('option', 'starWidth', '25px');
            //$(".rateYo").rateYo('option', 'precision', 2);
            $(".rateYo").rateYo().on("rateyo.change", function(e, data) {
                hovered = $(this).attr('id');
                var ref = "rtval" + hovered[hovered.length - 1];
                $("#"+ref).html(data.rating);
            });

            $(".view").click(function(e) {
                e.preventDefault();
                var viewdoc = $(this).attr('id');
                var viewref = $(this).attr('user');
                var id = viewdoc[viewdoc.length - 1];
                var token = $("#view_token"+id).val()
                var docData = {'viewref':viewref, '_token':token}
                $.post('/documents', docData, function(data,xhr,status) {
                    var i = 0; 
                    for(i = 0; i < data.length; i++) {
                        window.open('localhost:8000/uploads/'+data[i].document, "document"+i);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</body>
</html>
