<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro de alumno</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-white">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                    <?php include('message.php'); ?>
                    <?php 
                                    $query = "SELECT * FROM padres";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registro de Estudiantes</h3></div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputFirstName" type="text" name="nombre" placeholder="Nombre Del alumno"/>
                                                <label for="inputFirstName">Nombre</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="p_ape" placeholder="Apellido Paterno" />
                                                        <label for="inputFirstName">Apellido Paterno</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="m_ape" placeholder="Apellido Materno" />
                                                        <label for="inputLastName">Apellido Materno</label>
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="number" name="edad" placeholder="Edad" />
                                                        <label for="inputFirstName">Edad</label>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row mb-3">
                                                    <div class="form-floating mb-3">
                                                        <select name="sexo" id="" class="form-control">
                                                            <option value="">Seleciona el sexo del alumno</option>
                                                            <option value="HOMBRE">HOMBRE</option>
                                                            <option value="MUJER">MUJER</option>
                                                            <option value="OTRO">OTRO</option>
                                                        </select>
                                                    </div>  
                                            </div>
                                            <div class="row mb-3">
                                                    <div class="form-floating mb-3">
                                                        <select name="padre" id="" class="form-control">
                                                            <option value="">Seleciona el padre</option>
                                                            <option value="<?=$student['id'];?>"><?=$student['Nombre'] ." ". $student['ApellidoP'] ." ".  $student['ApellidoM'];?></option>
                                                        </select>
                                                    </div>  
                                            </div>
                                            <?php
                                        }
                                    }?>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" name="save_student" class="btn btn-primary">Guardar Estudiante</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <br><br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="js/scripts.js"></script> -->
    </body>
</html>
