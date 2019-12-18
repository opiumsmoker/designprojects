!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web Development Masterclass - Udemy - Final Project">
    <meta name="author" content="Paulino Valdelomar">

    <title>La Taza Perfecta - Registro</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
    <!-- Script -->
    <script type="text/javascript">
                $(document).ready(function(){
            
               $("#login").click(function(){
                
                    email=$("#email").val();
                    password=$("#password").val();
                     $.ajax({
                        type: "POST",
                        url: "pcheck.php",
                        data: "email="+email+"&password="+password,
                        success: function(html){
                          if(html=='true')
                          {
                              
                              $("#add_err2").html('<div class="alert alert-success"> \
                                                    <strong>Autenticado</strong> \ \
                                                </div>');

                            window.location.href = "blog.php";
                          
                          } else if (html=='false') {
                                $("#add_err2").html('<div class="alert alert-danger"> \
                                                    <strong>Autenticación</strong> fallida. \ \
                                                </div>');
                                
                          
                          } else {
                                $("#add_err2").html('<div class="alert alert-danger"> \
                                                    <strong>Error</strong> procesando la solicitud. Intente de nuevo. \ \
                                                </div>');
                          }
                        },
                        beforeSend:function()
                        {
                            $("#add_err2").html("cargando...");
                        }
                    });
                     return false;
                });
});
    </script>

</head>

<body>

    <div class="brand">La Taza Perfecta</div>
    <div class="address-bar">Barrio Pinto | Montes de Oca, SJ 11051 | 506.7215.6134</div>

    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">

                    <div class="alert alert-danger"><strong>Debes estar logueado para ver el blog.</strong>  
                    </div>

                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Ingreso</strong>
                    </h2>
                    <div id="add_err2"></div>
                    <hr>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Correo Electrónico</label>
                                <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-4">
                                <label>Contraseña</label>
                                <input type="password" id="password" name="password" maxlength="10" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" id="login" class="btn btn-default">Entrar</button>
                            </div>
                        </div>
                    </form>
                    <a href="register.php"><button type="submit" class="btn btn-default">¿No eres miembro? Regístrate acá</button></a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; La Taza Perfecta 2019</p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
