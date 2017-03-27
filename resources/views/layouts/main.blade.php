<!DOCTYPE html>
<html>
    
    <head>
        <title>@yield('title')</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
      <link href="vendors/jquery-ui.css" rel="stylesheet" media="screen">
      <link href="vendors/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
      <div class="navbar navbar-fixed-top">
         <div class="navbar-inner">
             <div class="container-fluid">
                 <a class="btn btn-navbar" href="#" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                 </a>
                 <a class="brand" href="#"><img src="images/logo.jpg" alt="" style="height:43px;"></a>
                 <div class="nav-collapse collapse">
                     <ul class="nav pull-right">
                         <li class="dropdown">
                              <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
                                 {{ Auth::user()->user}}
                                 <i class="caret"></i>
                             </a>
                             <ul class="dropdown-menu">
                                 <li>
                                    <a tabindex="-1" href="javascript:void(0)">Profile</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a tabindex="-1" href="logout">Logout</a>
                                 </li>
                             </ul>
                         </li>
                     </ul>
                 </div>
                 <!--/.nav-collapse -->
             </div>
         </div>
      </div>

        <div class="container-fluid">
            <div class="row-fluid">
               <div class="span3" id="sidebar">
                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                     <li>
                        <a href="landing"><i class="icon-chevron-right"></i> Projects</a>
                     </li>
                     <li>
                        <a href="users"><i class="icon-chevron-right"></i> Users</a>
                     </li>
                       <li>
                        <a href="persons"><i class="icon-chevron-right"></i> Persons</a>
                     </li>
                        <li>
                        <a href="sites"><i class="icon-chevron-right"></i> Sites</a>
                     </li>
                        <li>
                        <a href="equip"><i class="icon-chevron-right"></i> Equipment</a>
                     </li>
                       <li>
                        <a href="emails"><i class="icon-chevron-right"></i> Notifications</a>
                     </li>
                  </ul>
               </div>


@yield('content')

            </div>
            <hr>
            <footer>
                <p>&copy; E&M Communications Inc. 2016</p>
            </footer>
        </div>
        <!--/.fluid-container-->

        <script src="vendors/jquery-1.12.0.min.js"></script>
        <script src="vendors/jquery-ui.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/jszip.min.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/vfs_fonts.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/buttons.print.min.js"></script>

        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>

    </body>

</html>
@yield('script')
