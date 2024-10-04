<?php 
include "../includes/config.php";

header("Content-Type: application/json"); // Set the response type to JSON

// Prevent the page from being embedded in an iframe (clickjacking protection)
header("X-Frame-Options: DENY");

// Enable XSS protection in some older browsers
header("X-XSS-Protection: 1; mode=block");

// Disable MIME-type sniffing
header("X-Content-Type-Options: nosniff");

// Ensure the content is treated as coming from the correct origin
header("Content-Security-Policy: default-src 'self';");

// Allow CORS (only if necessary, and limit the allowed origins)
//header("Access-Control-Allow-Origin: https://your-domain.com");

$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON, true);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $data = json_decode($inputJSON, true);
    $csrf_token = $data['csrf_token'] ?? '';

    if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF token']);
        exit;
    }
}

if($data['type'] == 'subscription') {
  createSubscription($data, $conn);
}

if($data['type'] == 'deleteContact') {
  deleteContact($data, $conn);
}

if($data['type'] == 'deleteJobApplication') {
  deleteJobApplication($data, $conn);
}
if($data['type'] == 'deleteSubscription') {
  deleteSubscription($data, $conn);
}



function createSubscription($data, $conn) {
  $table = "email_subscription";
  $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
  if($email) {
    #Check duplicate email id:
    $isNotFound = checkDuplicateEmail($table, $email, $conn);
    if($isNotFound) {
        $sql = "INSERT INTO $table (email, is_subscribed, is_deleted)
                VALUES ('$email', '1', '0')";
        if ($conn->query($sql) === TRUE) {
          echo json_encode(['status' => true, 'message' => 'You have successfuly subscribed for the news letters']);  
        } else {
          echo json_encode(['status' => false, 'message' => 'Please check your email id']); 
        }
    } else {
        echo json_encode(['status' => false, 'message' => 'This email already exist.']); 
    }
    $conn->close();
    } else {
      echo json_encode(['status' => false, 'message' => 'Please check your email id']); 
    }
}


function checkDuplicateEmail($table, $email, $conn) {
  if($email) {
    $sql = "SELECT count(*) as total FROM $table WHERE email = '$email'";
    try
    {
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        if($data['total'] > 0) {
          return false;
        } else {
          return true;
        }
        
    } catch (Exception $e) {
        return false;
    }
  }
}


function deleteContact($data, $conn) {
    $id = $data['contact_id'];
    $sql = "DELETE FROM contacts WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => true, 'message' => 'Removed']); 
    } else {
        echo json_encode(['status' => false, 'message' => 'Please try again']); 
    }
    exit;
}

function deleteJobApplication($data, $conn) {
    $id = $data['application_id'];
    $sql = "DELETE FROM job_application WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => true, 'message' => 'Removed']); 
    } else {
        echo json_encode(['status' => false, 'message' => 'Please try again']); 
    }
    exit;
}


function deleteSubscription($data, $conn) {
    $id = $data['subscription_id'];
    $sql = "DELETE FROM email_subscription WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => true, 'message' => 'Removed']); 
    } else {
        echo json_encode(['status' => false, 'message' => 'Please try again']); 
    }
    exit;
}


// job_application
// contacts
// email_subscription






// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';

// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = SMTP_HOST;                   //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'devuser245';                     //SMTP username
//     $mail->Password   = 'okri uycg qjng ajbn';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('info@bogtrading.com', 'BOG Trading');
//     $mail->addAddress('chandanbhanopa@yopmail.com', 'Chandan Bhanopa');     //Add a recipient
//     $mail->addReplyTo('info@bogtrading.com', 'Information');

//     //Attachments
//     //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }





