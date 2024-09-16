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
                              <h3 class="mb-4">Fill the application form and we will catch you within 24 hours</h3>
                              <div id="form-message-warning" class="mb-4"></div>
                              <div class="form-message-success" class="mb-4">
                                 Your message was sent, thank you!
                              </div>
                              <form method="POST" action="<?=$_SERVER['PHP_SELF']?>"  id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data" @submit.prevent>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="name" x-text="fullNameLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="name" id="fullname" placeholder="Name" x-model="formData.fullName" x-model.lazy="formData.fullName" x-on:blur="validateField()" >
                                          <span class="error_fullname" x-show="formData.fullName.length  < 1">Enter your full name</span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="email" x-text="emailLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="email" id="email" placeholder="Email">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="mobile" x-text="mobileLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="mobile" id="mobile" placeholder="mobile number">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="quanification" x-text="qualificationLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="quanification" id="quanification" placeholder="Quanification">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="label" for="resume" x-text="resumeLabel"></label>
                                          <input type="file" name="resume" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" id="resume" cols="30" rows="4" placeholder="Message" />
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <button type="submit" id="submit" name="apply_for_job" value="apply" class="btn btn-primary" x-text="buttonLabel" x-bind="disableButton">
                                             <div class="submitting"></div>
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
      <section class="ftco-section ftco-no-pb ftco-no-pt bg-secondary">
         <div class="container py-5">
            <div class="row">
               <div class="col-md-7 d-flex align-items-center">
                  <h2 class="mb-3 mb-sm-0" style="color:black; font-size: 22px;">Sign Up for Your Free 1st Accounting Consultation</h2>
               </div>
               <div class="col-md-5 d-flex align-items-center">
                  <form action="#" class="subscribe-form">
                     <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Enter email address">
                        <input type="submit" value="Subscribe" class="submit px-3">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <?php include "includes/footer.php";?>  
      <script type="text/javascript">
         function postApi() {
           
         }
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