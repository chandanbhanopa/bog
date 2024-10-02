<?php
function checkDuplicateEmail($table, $email, $conn) {
  if($email) {
    $sql = "SELECT count(*) as total FROM $table WHERE email = '$email'";
    try {
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        if($data['total'] > 0) {
          return true;
        } else {
          return false;
        }
        
    } catch (Exception $e) {
        return false;
    }
  }
}

function getTotal($conn, $table) {
    $data['total'] = 0;
    $sql = "SELECT count(*) as total FROM $table";
    try {
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();

    } catch(Exception $e) {
        $data['total'] = 0 ;
    }
   return $data['total'];
}

// job_application
// contacts
// email_subscription

function getAllJobs($conn) {
    $sql = "SELECT * FROM job_application";
    try {
        return $conn->query($sql);
    } catch(Exception $e) {
        return false;
    }
}


function getAllSubscribers($conn) {
    $sql = "SELECT * FROM email_subscription";
    try {
        return $conn->query($sql);
    } catch(Exception $e) {
        return false;
    }
}

function getAllContacts($conn) {
    $sql = "SELECT * FROM contacts";
    try {
        return $conn->query($sql);
    } catch(Exception $e) {
        return false;
    }
}