<?php

include __DIR__ ."/../controller/UsersController.php";

$UsersController = new UsersController();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch($_GET["ValidationCRUD"]){
        case 'Register_Adm':
            if(!(empty($_POST['name']) || empty($_POST["password"]))){

                $Register_New_Adm = $UsersController->registerAdm($_POST["name"],$_POST["password"]);
            
                if($Register_New_Adm){
                    header("Location: ../../pages/Admin/index.php");
                }
                else{
                    header("Location: ../../pages/Admin/Register/Admin/index.php?erro=true");
                }
            }
            else{
                header("Location: ../../pages/Admin/Register/Admin/index.php?erro=true");
            }
            break;



         case 'Edit_Adm':
            if(!(empty($_POST['name']) || empty($_POST["password"]))){

                $Edit_Adm = $UsersController->UpdateAdmin($_POST["AdmId"],$_POST["name"],$_POST["password"]);
                
                if($Edit_Adm){
                    header("Location: ../../pages/Admin/index.php");
                }
                else{
                    header("Location: ../../pages/Admin/Register/Reservations/index.php?idAdm=".$_POST['AdmId']);
                }
            }
            else{
                header("Location: ../../pages/Admin/Register/Reservations/index.php?idAdm=".$_POST['AdmId']);
            }
            break;


            case 'Delete_Adm':

                $Delete_Adm = $UsersController->DeleteAdmin($_POST["idAdm"]);
                if($Delete_Adm){
                    header("Location: ../../pages/Admin/index.php");
                }
                else{
                    header("Location: ../../pages/Admin/index.php?erro=True");
                }



                break;








                case 'Register_User':
                    if(!( empty($_POST['name']) || empty($_POST["password"]) || empty($_POST["telefone"])    || empty($_POST["cpf"]) || empty($_POST["email"])  )){
        
                        $Register_New_User = $UsersController->registerUser($_POST["name"],$_POST["password"],$_POST["telefone"], $_POST["cpf"], $_POST["email"]);
                    
                        if($Register_New_User){
                            header("Location: ../../pages/Admin/index.php");
                        }
                        else{
                            header("Location: ../../pages/Admin/Register/User/index.php?erro=true");
                        }
                    }
                    else{
                        header("Location: ../../pages/Admin/Register/User/index.php?erro=true");
                    }
                    break;
        
        
        
                 case 'Edit_User':
                    if(!( empty($_POST['name']) || empty($_POST["password"]) || empty($_POST["telefone"])    || empty($_POST["cpf"]) || empty($_POST["email"])  )){
        
                        $Edit_User = $UsersController->UpdateUser($_POST["UserId"],$_POST["name"],$_POST["password"],$_POST["telefone"], $_POST["cpf"], $_POST["email"]);
                        
                        if($Edit_User){
                            header("Location: ../../pages/Admin/index.php");
                        }
                        else{
                            header("Location: ../../pages/Admin/Register/Reservations/index.php?idUser=".$_POST['UserId']);
                        }
                    }
                    else{
                        header("Location: ../../pages/Admin/Register/Reservations/index.php?idUser=".$_POST['UserId']);
                    }
                    break;
        
        
                    case 'Delete_User':
        
                        $Delete_User = $UsersController->DeleteUser($_POST["idUser"]);
                        if($Delete_User){
                            header("Location: ../../pages/Admin/index.php");
                        }
                        else{
                            header("Location: ../../pages/Admin/index.php?erro=True");
                        }
        
        
        
                        break;





















                        case 'Register_Location':
                            if(!( empty($_POST['name']) || empty($_POST["enderecoEspaco"]) || empty($_POST["tipo"])    || empty($_POST["descricaoEspaco"]) || empty($_POST["lotacaoMax"]) || empty($_FILES["Imagem"]['name']) )){

                                $nomedoarquivo = uniqid();
                                move_uploaded_file($_FILES["Imagem"]["tmp_name"],"../../imgs_local_db/".$nomedoarquivo);

                                $Register_New_Location = $UsersController->registerLocation($_POST["name"],$_POST["enderecoEspaco"],$_POST["tipo"], $_POST["descricaoEspaco"], $_POST["lotacaoMax"], $nomedoarquivo);
                            
                                if($Register_New_Location){
                                    header("Location: ../../pages/Admin/index.php");
                                }
                                else{
                                    header("Location: ../../pages/Admin/Register/Locations/index.php?erro=true_2");
                                }
                            }
                            else{
                                header("Location: ../../pages/Admin/Register/Locations/index.php?erro=true_1");
                            }
                            break;
                
                
                
                         case 'Edit_Location':
                            if(!( empty($_POST['name']) || empty($_POST["enderecoEspaco"]) || empty($_POST["tipo"])    || empty($_POST["descricaoEspaco"]) || empty($_POST["lotacaoMax"]) || empty($_POST["imagem_local"]) )){

                                move_uploaded_file($_FILES["Imagem"]["tmp_name"],"../../imgs_local_db/".$_POST["imagem_local"]);

                                $Edit_Location = $UsersController->UpdateLocation($_POST['LocationId'],$_POST["name"],$_POST["enderecoEspaco"],$_POST["tipo"], $_POST["descricaoEspaco"], $_POST["lotacaoMax"], $_POST["imagem_local"]);
                                
                                if($Edit_Location){
                                    header("Location: ../../pages/Admin/index.php");
                                }
                                else{
                                    header("Location: ../../pages/Admin/Register/Reservations/index.php?idLocation=".$_POST['LocationId']);
                                }
                            }
                            else{
                                header("Location: ../../pages/Admin/Register/Reservations/index.php?idLocation=".$_POST['LocationId']);
                            }
                            break;
                
                
                            case 'Delete_Location':

                                $getLocationById = $UsersController->getLocationById($_POST['idLocation']);
                                $img_local = $getLocationById['imagem_local'];

                                if (file_exists("../../imgs_local_db/".$img_local)) { 
                                    unlink("../../imgs_local_db/".$img_local);  
                                
                                }

                                $Delete_Location = $UsersController->DeleteLocation($_POST["idLocation"]);
                                if($Delete_Location){
                                    header("Location: ../../pages/Admin/index.php");
                                }
                                else{
                                    header("Location: ../../pages/Admin/index.php?erro=True");
                                }
                
                
                
                                break;































                        case 'Register_Reservation':
                            if(!( empty($_POST['User']) || empty($_POST["Espaco"]) || empty($_POST["Data"]))){

                                $GetIdUser = $UsersController->GetIdUser($_POST['User']);
                                $GetIdLocation = $UsersController->GetIdLocation($_POST['Espaco']);
                
                               if($GetIdUser || $GetIdLocation == true){

                                $Register_New_Reservation = $UsersController->registerReservations($GetIdLocation,$GetIdUser,$_POST["Data"]);
                            
                                if($Register_New_Reservation){
                                    header("Location: ../../pages/Admin/index.php");
                                }
                                else{
                                    header("Location: ../../pages/Admin/Register/Reservations/index.php?erro=true");
                                }

                               }

                               else{
                                header("Location: ../../pages/Admin/Register/Reservations/index.php?erro=Usuario/Local_não_encontrado");
                               }
                            }
                            else{
                                header("Location: ../../pages/Admin/Register/Reservations/index.php?erro=true");
                            }
                            break;
                
                
                
                         case 'Edit_Reservations':
                            if(!( empty($_POST['User']) || empty($_POST["Espaco"]) || empty($_POST["Data"]))){


                                $GetIdUser = $UsersController->GetIdUser($_POST['User']);
                                $GetIdLocation = $UsersController->GetIdLocation($_POST['Espaco']);
                
                               if(!($GetIdUser == '' || $GetIdLocation == '')){

                                $Edit_Reservation = $UsersController->UpdateReservations($_POST['ReservationId'],$GetIdLocation,$GetIdUser,$_POST["Data"]);
                            
                                if($Edit_Reservation){
                                    header("Location: ../../pages/Admin/index.php");
                                }
                                else{
                                    header("Location: ../../pages/Admin/Register/Reservations/index.php?idReservations=".$_POST['ReservationId']);
                                }

                               }

                               else{
                                header("Location: ../../pages/Admin/Register/Reservations/index.php?idReservations=".$_POST['ReservationId']);
                               }
                            }
                            else{
                                header("Location: ../../pages/Admin/Register/Reservations/index.php?idReservations=".$_POST['ReservationId']);
                            }
                            break;



                            case 'Delete_Reservations':
                
                                $Delete_Reservation = $UsersController->DeleteReservations($_POST["idReservations"]);
                                if($Delete_Reservation){
                                    header("Location: ../../pages/Admin/index.php");
                                }
                                else{
                                    header("Location: ../../pages/Admin/index.php?erro=True");
                                }
                
                
                
                                break;                                















                


        default:

        echo "nao achei";
          break;
    }
}