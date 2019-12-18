<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web Development Masterclass - Udemy - Final Project">
    <meta name="author" content="Paulino Valdelomar">

    <title>La Taza Perfecta - Contáctenos</title>

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
    
        <script type="text/javascript">
        $(document).ready(function () {

            $("#contact").click(function () {

                fname = $('#fname').val();
                email = $('#email').val();
                message = $('#message').val();

                $.ajax({
                    type: "POST",
                    url: "sendmsg.php",
                    data: "fname=" + fname + "&email=" + email + "&message=" + message,
                    success: function (html) {
                        if (html == 'true') {

                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>¡Mensaje enviado!</strong> \ \
                                                 </div>');

                        } else if (html == 'fname_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>El nombre</strong> no debe exceder los 50 caracteres. \ \
                                                 </div>');
                        
                        } else if (html == 'fname_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>El nombre</strong> debe exceder los 2 caracteres. \ \
                                                 </div>');
                                                 
                        } else if (html == 'email_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>El email</strong> no debe exceder los 50 caracteres. \ \
                                                 </div>');
                        
                        } else if (html == 'email_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>El email</strong> debe exceder los 2 caracteres. \ \
                                                 </div>');
                                                 
                        } else if (html == 'eformat') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>El correo</strong> no tiene formato correcto. \ \
                                                 </div>');
                                                 
                        } else if (html == 'message_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>El mensaje</strong> no debe exceder los 100 caracteres. \ \
                                                 </div>');
                        
                        } else if (html == 'message_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>El mensaje</strong> m debe exceder los 2 caracteres. \ \
                                                 </div>');


                        } else {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> procesando la solicitud. Intente de nuevo. \ \
                                                 </div>');
                        }
                    },
                    beforeSend: function () {
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
    <div class="address-bar">Barrio Pinto | Montes de Oca, SJ 11051 | 506.7215.6149</div>

    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Contáctenos</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.1150359016156!2d-84.05151998621017!3d9.924376592903032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e39a883e06a7%3A0xe46bedeb6337571!2sCalle%2063%2C%20Barrio%20Pinto%2C%20San%20Jos%C3%A9%2C%20San%20Pedro!5e0!3m2!1ses-419!2scr!4v1576684362797!5m2!1ses-419!2scr" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-4">
                    <p>Teléfono:
                        <strong>506.7215.6149</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:info@latazaperfecta.com">info@latazaperfecta.com</a></strong>
                    </p>
                    <p>Address:
                        <strong>Barrio Pinto, San Pedro,
                            <br> Montes de Oca, SJ 11051</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Contáctenos</strong>
                    </h2>
                    <hr>
                    <div id="add_err2"></div>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Nombre</label>
                                <input type="text" id="fname" name="fname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Correo Electrónico</label>
                                <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Mensaje</label>
                                <textarea class="form-control" id="message" name="message" maxlength="100" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">                           
                                <button type="submit"  id="contact" class="btn btn-default">Enviar</button>
                            </div>
                        </div>
                    </form>
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
