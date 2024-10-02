<?php 
error_reporting(E_ALL);
ini_set('dislpay_errors', 1);
$status = "";
$message = "";
require 'includes/config.php';
require 'includes/functions.php';
$table = "job_application";

if(isset($_POST)) {
  if(isset($_POST['apply_for_job'])) {
      $uploads_dir = __DIR__.'/uploads';
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $quanification = $_POST['quanification'];
      $designation = $_POST['designation'];
      $error = false;
      if($name == "" || $email == "" || $mobile == "" || $quanification == "" || $designation == "") {
        $error = true;
        $message = "<div class='alert alert-danger'>Please fill all information.</div>";
      }

      $isEmailDuplicate = checkDuplicateEmail($table, $email, $conn);
      if($isEmailDuplicate) {
        $error = true;
        $message = "<div class='alert alert-danger'>This email already in use. Please use other email</div>";
      }

  }
  if (isset($_FILES['resume'])) {
    if (!$_FILES['resume']['error']) {
        $fileName = $_FILES['resume']['name'];
        $tmp_name = $_FILES["resume"]["tmp_name"];
        $fileName = basename($_FILES["resume"]["name"]);
        $fileName  = str_replace(' ', '_', $fileName);
        
        $result = move_uploaded_file($tmp_name, "$uploads_dir/$fileName");
        if($result && !$error) {
          $sql = "INSERT INTO $table (full_name, email, mobile, qualification, applied_post, file_name)
                VALUES ('$name', '$email', '$mobile', '$quanification', '$designation', '$fileName')";
            if ($conn->query($sql) === TRUE) {
                $message = "<div class='alert alert-success'>Your request submitted successfully. Our team will reach you shortly</div>";
            } else {
                $message = "<div class='alert alert-danger'>Please try again. Something went wrong.</div>";
            }
        }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include "includes/page_title.php";?>
   </head>
   <body>
      <div class="wrap">
         <?php include "includes/header.php";?>
      </div>
      <?php include "includes/nav.php";?>
      <!-- END nav -->
      <section class="hero-wrap hero-wrap-2" style="background-image: url('images/jobbanner.webp');" data-stellar-background-ratio="0.5">
         <div class="overlay"></div>
         <div class="container">
            <div class="row no-gutters slider-text align-items-end">
               <div class="col-md-9 ftco-animate pb-5">
                  <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us <i class="ion-ios-arrow-forward"></i></span></p>
                  <h1 class="mb-0 bread">Career At BOG</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="ftco-section bg-light">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="wrapper">
                     <div class="row no-gutters" >
                        <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch" >
                           <div class="contact-wrap w-100 p-md-5 p-4" x-data="getData()">
                              <h2>Job Application Form</h2>
                                <?php if($message) { echo $message ; } ?>
                              <div class="form-message-success bg-lime-200" class="mb-4">
                                 <span class="text-base font-medium"></span>
                              </div>
                              <form method="POST" action="<?=$_SERVER['PHP_SELF']?>"  id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data" >
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="name" x-text="fullNameLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="name" id="fullname" placeholder="Name" x-model="formData.fullName" x-model.lazy="formData.fullName" required="">
                                          <span class="error_fullname"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="email" x-text="emailLabel"></label>
                                          <input type="email" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="email" id="email" placeholder="Email" required="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="mobile" x-text="mobileLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="mobile" id="mobile" placeholder="mobile number" required="" pattern="\d*" maxlength="10">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="quanification" x-text="qualificationLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="quanification" id="quanification" placeholder="Quanification" required="" >
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="designation" x-text="designationLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="designation" id="designation" placeholder="Designation" required="">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="label" for="resume" x-text="resumeLabel"></label>
                                          <input type="file" name="resume" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" id="resume" cols="30" rows="4" placeholder="Message" accept=".docx,.pdf" required="" />
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <button type="submit" id="submit" name="apply_for_job" value="apply" class="btn btn-primary" x-text="buttonLabel">
                                          </button>

                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-5 d-flex">
							             <img src="images/job.webp" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- <div id="map" class="map"></div> -->
      <?php include "includes/footer.php";?>  
      <script type="text/javascript">
         function getData() {
             return {
                 formData : {
                     fullName:"",
                     email:"",
                     subject:"",
                     message:""
                 },
                 disableButton:false,
                 status: false,
                 loading:false,
                 isError: false,
                 buttonLabel:"Apply",
                 fullNameLabel:"Full Name",
                 emailLabel:"Email Address",
                 mobileLabel:"Mobile Number",
                 resumeLabel :"Upload Your Resume",
                 qualificationLabel : "Highest Quanification",
                 designationLabel:'Apply for the post',
                 isEmail(email){
                     var re = /\S+@\S+\.\+S/;
                     return re.test(email);
                 },
                 validateField(){
                  
                 }
             }
         }
      </script>
   </body>
</html>