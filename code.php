<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM becas WHERE idreg='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Estudiante eliminado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Estudiante no eliminado";
        header("Location: listaAlum.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $matricula = mysqli_real_escape_string($con, $_POST['matricula']);
    $nom = strtoupper(mysqli_real_escape_string($con, $_POST['nombre']));
    $aepe = strtoupper(mysqli_real_escape_string($con, $_POST['p_ape']));
    $sape = strtoupper(mysqli_real_escape_string($con, $_POST['s_ape']));
    $nomcom = $aepe ." " . $sape . " " . $nom;
    $curp = strtoupper(mysqli_real_escape_string($con, $_POST['curp']));
    $status = strtoupper(mysqli_real_escape_string($con, $_POST['status']));
    $semestre = mysqli_real_escape_string($con, $_POST['semestre']);
    $grupo = strtoupper(mysqli_real_escape_string($con, $_POST['grupo']));
    $correo = mysqli_real_escape_string($con, $_POST['correo']);
    $sexo = strtoupper(mysqli_real_escape_string($con, $_POST['sexo']));
    $fechanac = mysqli_real_escape_string($con, $_POST['fechanac']);
    $lugarnac = strtoupper(mysqli_real_escape_string($con, $_POST['lugarnac']));
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $nomtutor = strtoupper(mysqli_real_escape_string($con, $_POST['nomtutor']));
    $teltutor = mysqli_real_escape_string($con, $_POST['teltutor']);
    $localidad = strtoupper(mysqli_real_escape_string($con, $_POST['localidad']));
    $calle = strtoupper(mysqli_real_escape_string($con, $_POST['calle']));
    $num = mysqli_real_escape_string($con, $_POST['num']);
    $colonia = strtoupper(mysqli_real_escape_string($con, $_POST['colonia']));
    $minicipio = strtoupper(mysqli_real_escape_string($con, $_POST['minicipio']));
    $codigopostal = mysqli_real_escape_string($con, $_POST['codigopostal']);

    if (empty($num)) {
        $num = "S/N";
    }

    $query = "UPDATE becas SET `matricula`='$matricula',`p_ape`='$aepe',`s_ape`='$sape',`nombre`='$nom',`nomcom`='$nomcom',
    `curp`='$curp',`status`='$status',`semestre`='$semestre',`grupo`='$grupo',`correo`='$correo',`sexo`='$sexo',
    `fechanac`='$fechanac',`lugarnac`='$lugarnac',`telefono`='$telefono',`nomtutor`='$nomtutor',`teltutor`='$teltutor',
    `localidad`='$localidad',`calle`='$calle',`num`='$num',`colonia`='$colonia',`municipio`='$minicipio',
    `codigopostal`='$codigopostal'  
    
    WHERE idreg='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Estudiante actualizado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Estudiante no actualizado";
        header("Location: listaAlum.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $nom = strtoupper(mysqli_real_escape_string($con, $_POST['nombre']));
    $aepe = strtoupper(mysqli_real_escape_string($con, $_POST['p_ape']));
    $sape = strtoupper(mysqli_real_escape_string($con, $_POST['m_ape']));
    $sexo = strtoupper(mysqli_real_escape_string($con, $_POST['sexo']));
    $edad = strtoupper(mysqli_real_escape_string($con, $_POST['edad']));
    $padre = strtoupper(mysqli_real_escape_string($con, $_POST['padre']));

    $query = "INSERT INTO `alumnos`(`Nombre`, `ApellidoP`, `ApellidoM`, `sexo`, `Edad`, `idpadre`) 
    VALUES ('$nom', '$aepe','$sape','$sexo', '$edad','$padre')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Estudiante creado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Estudiante no creado";
        header("Location: register.php");
        exit(0);
    }
}

if (isset($_POST['save_father'])) {

    $nomp = strtoupper(mysqli_real_escape_string($con, $_POST['nombre_p']));
    $aepep = strtoupper(mysqli_real_escape_string($con, $_POST['p_ape_p']));
    $sapep = strtoupper(mysqli_real_escape_string($con, $_POST['m_ape_p']));
    $direccionp = strtoupper(mysqli_real_escape_string($con, $_POST['direccion_p']));
    $telefonop = strtoupper(mysqli_real_escape_string($con, $_POST['´telefono_p']));

    $query = "INSERT INTO `padres`( `Nombre`, `ApellidoP`, `ApellidoM`, `Direccion`, `Telefono`) 
    VALUES ('$nomp','$aepep','$sapep','$direccionp','$telefonop')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Padre creado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Padre no creado";
        header("Location: registpadres.php");
        exit(0);
    }

}

?>