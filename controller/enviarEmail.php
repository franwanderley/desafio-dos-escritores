<?php
    //PHPMailer
    include_once('../phpmailer/PHPMailerAutoload.php');
    
    function enviarEmail($remetente,$assunto,$texto){
         //enviar email
          // instaciar mail
         $mail = new PHPMailer();
         $mail->IsSMTP();
         $mail->CharSet = "utf8";
         $mail->Mailer= 'smtp';
         $mail->Host = "smtp.gmail.com";//hospedagem
         $mail->SMTPAuth = true;
         $mail->Username = "seuemail";
         $mail->Password = "suasenha";
         $mail->SMTPsecure = "tls";//segurança
         $mail->Port = 587;
         $mail->FromName = "Suporte";
         $mail->From = "wanderley3101@gmail.com";
         $mail->AddAddress($remetente);//onde vai receber
         $mail->Subject = $assunto;
         $mail->Body = $texto;   
         if( ! $mail->send() )
            die("Algo deu errado!");
    }
?>

