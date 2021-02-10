<?php
include('Conexion.php');
session_start();
if(isset($_POST['txtEmail'])){
    $Correo = $_POST['txtEmail'];
    $Nombre = $_POST['txtNombre'];
    $Contraseña = $_POST['txtPassword'];
    $Vcontraseña = $_POST['txtVpassword'];
    $Contraseña_h = md5($Contraseña);
    $Direccion = $_POST['txtDireccion'];
    $Colonia = $_POST['txtColonia'];
    $Codigo_postal = $_POST['txtCodPostal'];
    $Ciudad = $_POST['txtCiudad'];
    $Estado = $_POST['selEstados'];
    $id_h = md5($Correo);     
    if($_POST['txtTipoCuenta']==1){
        $TipoCuenta="Personal";
        $Num_telefono = $_POST['txtTelefono'];
        $Ap_Pat = $_POST['txtApellidoP'];
        $Ap_Mat = $_POST['txtApellidoM'];
        $Fecha_nacimiento = $_POST['dateFechaNac'];        
        $sql2= "SELECT * FROM registro_usuario";
		$query2=mysqli_query($conn,$sql2);
		$datos=mysqli_fetch_array($query2);
        if ($datos['Correo']== $Correo) {
            $_SESSION['error']="El correo ya existe, intente con uno diferente.";
            header('Location:../welcome/signup_personal.php');
        } else if ($datos['Telefono']== $Num_telefono) {
            $_SESSION['error']="El número de teléfono ya existe, intente con uno diferente.";
            header('Location:../welcome/signup_personal.php');
        }else{
            $sql= "INSERT INTO registro_usuario(Num_telefono,Correo,Nombre,Ap_pat,Ap_mat,Contraseña,Fecha_nacimiento,Direccion,Colonia,Codigo_postal,Ciudad,Estado,Tipo_Cuenta,id_h) 
            VALUES ('$Num_telefono','$Correo','$Nombre','$Ap_Pat','$Ap_Mat','$Contraseña_h','$Fecha_nacimiento','$Direccion','$Colonia','$Codigo_postal','$Ciudad','$Estado','$TipoCuenta','$id_h')";    
            if ($conn->query($sql)===TRUE) {
                header("Location:../banking_services/bank_account.php?id_h=$id_h");
            }else{
                $_SESSION['error']="Ha ocurrido un error al registrar su cuenta, intentelo de nuevo.";
                header('Location:../welcome/signup_personal.php');
            }
        }
    }else{
        $TipoCuenta="Empresarial";
        $RFC = $_POST['txtRFC'];
        $MSI = $_POST['selMSI'];
        if ($MSI==TRUE) {
            $MSIR = '1';
        }else {
            $MSIR = '0';
        }
        $VentasMensuales = $_POST['selVentas'];
        $sql2= "SELECT * FROM registro_usuario";
		$query2=mysqli_query($conn,$sql2);
		$datos=mysqli_fetch_array($query2);
        if ($datos['Correo']== $Correo) {
            $_SESSION['error']="El correo ya existe, intente con uno diferente.";
            header('Location:../welcome/signup_business.php');
        } else if ($datos['RFC']== $RFC) {
            $_SESSION['error']="El número de RFC y existe, intente con uno diferente.";
            header('Location:../welcome/signup_business.php');
        }elseif ($datos['Nombre']== $Nombre) {
            $_SESSION['error']="El nombre de la empresa ya se encuentra registrado, intente con uno diferente.";
            header('Location:../welcome/signup_business.php');
        }else{
            $sql= "INSERT INTO registro_usuario(Correo,Nombre,Contraseña,Direccion,Colonia,Codigo_postal,Ciudad,Estado,Tipo_Cuenta,id_h,Ventas_Mensuales,MSI,RFC) 
            VALUES ('$Correo','$Nombre','$Contraseña_h','$Direccion','$Colonia','$Codigo_postal','$Ciudad','$Estado','$TipoCuenta','$id_h','$VentasMensuales','$MSIR','$RFC')";    
            if ($conn->query($sql)===TRUE) {
                header("Location:../signin.php");
            }else{
                $_SESSION['error']="Ha ocurrido un error al registrar su cuenta, intentelo de nuevo.";
                header('Location:../welcome/signup_business.php');
            }
        }
    }
    
}
?>