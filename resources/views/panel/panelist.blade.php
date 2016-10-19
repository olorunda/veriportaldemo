<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Interview - Panel Members</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/twitter.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pace.green.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/ladda.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

    <!--JavaScript Libraries-->
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" data-pace-options='{ "ajax": true }' src="{{asset('js/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/spin.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ladda.min.js')}}"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Roboto';
            height: 100vh;
            margin: 0;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script type="text/javascript">
            $(function(){
                $("#msg-pane").hide();
                $("#skillTable").hide();
            });
        </script>
    </head>
    <!--<div id="data">
            
</div>-->
<body class="ash">
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
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/dashboard">Interview</a></li>
                    <li><a href="/rate2">Rating Table</a></li>
                    <li class="active"><a href="/panelists">Panelists</a></li>
                    <li><a href="/comments">Comments</a></li>
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

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item active" id="addmem"><i class="fa fa-plus"></i> Add Panel Member</a>
                <a href="#" class="list-group-item" id="sendmsg"><i class="fa fa-users"></i> Panel Members</a>
                <a href="#" class="list-group-item" data-toggle="modal" data-target="#addskill"><i class="fa fa-plus"></i> Add Skill/Quality</a>
                <a href="" class="list-group-item" id="showskills"><i class="fa fa-eye"></i> View Skills</a>
                <a href="#" class="list-group-item" id="reload"><i class="fa fa-refresh"></i> Reload Data</a>
                <a  class="list-group-item" href="{{ url('/logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="fa fa-unlock"></i> Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </div>
        <div class="col-md-9" id="addmem-pane">
            <form method="post" action="/panelists">
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="uname" class="control-label">Name*</label>
                    <input class="form-control col-sm-6 input-lg" type="text" name="uname" id="uname" required="required" autofocus="autofocus">
                </div>
                <br><br><br>
                <div class="form-group">
                    <label for="email" class="control-label">E-Mail*</label>
                    <input class="form-control col-sm-6 input-lg" type="email" name="email" id="email" required="required">
                </div>
                <br><br><br>
                <button class="btn btn-success" id="send" name="send" type="submit"><i class="fa fa-plus-circle"></i> Add Member</button>
            </form>
            @if(isset($status))
            @if($status['status'])
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Panel member successfully created.
                <p>A confirmation mail has been sent to {{$email}}</p>
            </div>
            @else
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> Panel member was not created! Please try again.
            </div>
            @endif
            @endif
        </div>
        <?php
        $total = count($panelmembers);
        $index = 0;
        ?>
        @if($total==0)
        <p class="lead">No Panel Member Yet.</p>
        @else
        <div class="table-responsive col-md-9" id="msg-pane">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($panelmembers as $member)
                    <tr>
                        <th>{{$index+=1}}</th>
                        <th>{{$member->name}}</th>
                        <th>{{$member->email}}</th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cogs"></i> Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#" data-toggle="modal" data-target="#edit{{$index}}" id="edit{{$index}}"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" id="delete{{$index}}" onclick="deletemember({{$index}});"><i class="fa fa-trash-o"></i> Delete</a></li>
                                </ul>
                            </div>
                        </th>
                    </tr>
                    <div class="modal fade" id="edit{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit - {{$member->name}}</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="_token" id="_edittoken{{$index}}" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="edituname" class="control-label">Name</label>
                                    <input class="form-control col-sm-6 input-lg" type="text" name="edituname" id="edituname{{$index}}" required="required" value="{{$member->name}}" autofocus="autofocus">
                                </div>
                                <br><br><br>
                                <div class="form-group">
                                    <label for="editemail" class="control-label">E-Mail</label>
                                    <input class="form-control col-sm-6 input-lg" type="email" name="editemail" id="editemail{{$index}}" required="required" value="{{$member->email}}">
                                </div>
                                <br><br><br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary" id="edit{{$index}}" onclick="edit({{$index}});"><i class="fa fa-floppy-o"></i>  Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endif
<?php $totalSkills = count($skills); $index=0; ?>
@if($totalSkills==0)
<p class="lead">No Skills Added Yet</p>
@else
<div class="table-responsive col-md-9" id="skillTable">
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Skill/Qualification</th>
                <th>Grade</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <th>{{$index+=1}}</th>
                <th>{{$skill->skill}}</th>
                <th>{{$skill->grade}}</th>
                <th>
                    <!-- Single button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cogs"></i> Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#editSkill{{$index}}"><i class="fa fa-edit"></i> Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="deleteSkill{{$index}}" onclick="deleteSkill({{$index}});"><i class="fa fa-trash-o"></i> Delete</a></li>
                        </ul>
                    </div>
                </th>
            </tr>

            <!-- mODAL tO eDIT sKILL/qUALIFICATION -->
            <div class="modal fade" id="editSkill{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit - {{$skill->skill}}</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="_token" id="_editskilltoken{{$index}}" value="{{csrf_token()}}">
                        <input type="hidden" name="oldskill" id="oldskill{{$index}}" value="{{$skill->skill}}">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <input class="form-control col-sm-6 input-lg" type="text" name="editskillskill" id="editskillskill{{$index}}" required="required" value="{{$skill->skill}}" autofocus="autofocus">  
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-certificate"></i>
                                </div>
                                <select id="gradeedit{{$index}}" name="grade">
                                    @for($i=1; $i<=10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#gradeedit{{$index}}').multiselect({
                                            enableFiltering: true,
                                            buttonWidth: '100%'
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id="edit{{$index}}" onclick="editSkills({{$index}});"><i class="fa fa-floppy-o"></i>  Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--/ mODAL tO eDIT sKILL/qUALIFICATION -->
    @endforeach
</tbody>
</table>
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="addskill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Quality/Skill</h4>
        </div>
        <div class="modal-body">
            <form>
                <input type="hidden" name="addToken" id="addToken" value="{{csrf_token()}}">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-graduation-cap"></i> Skill
                        </div>
                        <input type="text" class="form-control" name="skill" id="skill" placeholder="Skill/Quality" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-certificate"></i> Grade
                        </div>
                        <select id="grade" name="grade">
                            @for($i=1; $i<=10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#grade').multiselect({
                                    enableFiltering: true,
                                    buttonWidth: '100%'
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" value='true' id='nojs_login' name='nojs_login'>
                    <button type="submit" class="btn btn-primary btn-block btn-login" id="addSkill">
                        Add Skill
                        <i class="fa fa-plus-circle"></i>
                    </button>
                </div>
    </form>
</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>
<div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;font-weight:bold;color:black;"><img src="{{asset('img/demo_wait.gif')}}" width="64" height="64"><br>Please wait...</div>
<div style="display: block;position: absolute;"></div>
</div>
<br><br><br><br>
</div>
</body>
</html>
