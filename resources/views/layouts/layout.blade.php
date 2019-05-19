<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=yes">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
    $(document).ready(function(){
    	$("#target").hide();
		$("#mostrar").on( "click", function() {
			$('#target').toggle("swing"); //muestro mediante id
		 });
		$(".container-fluid").on( "click", function() {
			$('#target').hide("linear"); //oculto mediante id
		});
	});
	</script>
	<style>
.s-sidebar__nav {
   position: fixed;
   top: 0;
   left: -15em;
   overflow: hidden;
   transition: all .3s ease-in;
   width: 15em;
   height: 100%;
   background: #243e56;
   color: rgba(255, 255, 255, 0.7);
}

.s-sidebar__nav:hover,
.s-sidebar__nav:focus,
.s-sidebar__trigger:focus + .s-sidebar__nav,
.s-sidebar__trigger:hover + .s-sidebar__nav {
   left: 0;
}

.s-sidebar__nav ul {
   position: absolute;
   top: 4em;
   left: 0;
   margin: 0;
   padding: 0;
   width: 15em;
}

.s-sidebar__nav ul li {
   width: 100%;
}

.s-sidebar__nav-link {
   position: relative;
   display: inline-block;
   width: 100%;
   height: 4em;
}

.s-sidebar__nav-link em {
   position: absolute;
   top: 50%;
   left: 4em;
   transform: translateY(-50%);
}

.s-sidebar__nav-link:hover {
   background: #4d6276;
}

.s-sidebar__nav-link > i {
   position: absolute;
   top: 0;
   left: 0;
   display: inline-block;
   width: 4em;
   height: 4em;
}

.s-sidebar__nav-link > i::before {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
}

/* Mobile First */
@media (min-width: 42em) {
   .s-layout__content {
      margin-left: 4em;
   }
   
   /* Sidebar */
   .s-sidebar__trigger {
      width: 4em;
   }
   
   .s-sidebar__nav {
      width: 4em;
      left: 0;
   }
   
   .s-sidebar__nav:hover,
   .s-sidebar__nav:focus,
   .s-sidebar__trigger:hover + .s-sidebar__nav,
   .s-sidebar__trigger:focus + .s-sidebar__nav {
      width: 15em;
   }
}

@media (min-width: 68em) {
   .s-layout__content {
      margin-left: 15em;
   }
   
   /* Sidebar */
   .s-sidebar__trigger {
      display: none
   }
   
   .s-sidebar__nav {
      width: 15em;
   }
   
   .s-sidebar__nav ul {
      top: 1.3em;
   }
}
.s-sidebar__nav-link{
	color: #FFFFFF;
}
.s-sidebar__nav-link:hover{
	color: white;
}

	</style>

</head>
<body>
	<!--
        <a href="#" id="mostrar" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-menu-hamburger"></span> Menu-hamburger
        </a>
    -->

<!--
<div id="target">
	<div class="s-sidebar__nav">
     <ul>
        <li>
           <a class="s-sidebar__nav-link" href="#0">
              <i class="fa fa-home"></i><em>Home</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link" href="#0">
             <i class="fa fa-user"></i><em>My Profile</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link" href="#0">
              <i class="fa fa-camera"></i><em>Camera</em>
           </a>
        </li>
     </ul>
  </div>
</div>
-->

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CECIM 2019</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Principal</a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!--
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Registro</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Iniciar</a></li>
    -->
    </ul>
  </div>
</nav>

	<div class="container-fluid" style="margin-top: 100px">
 		@yield('content')
	</div>
	<style type="text/css">
	.table {
		border-top: 2px solid #ccc;
 
	}
</style>
</body>
</html>