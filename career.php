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
                              <form method="POST" action="<?=$_SERVER['PHP_SELF']?>" id="contactForm" name="contactForm" class="contactForm">
                                 <input type="hidden" name="request_type" value="contact" />
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="name" x-text="fullNameLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="name" id="fullname" placeholder="Name" >
                                          <span class="error_fullname"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="label" for="email" x-text="emailLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="email" id="email" placeholder="Email">
                                          <li x-show="formData.email.length > 0" class="flex items-center py-1">
                                             <div 
                                                :class="{'bg-green-200 text-green-700': isEmail(formData.email),
                                                'bg-red-200 text-red-700': !isEmail(formData.email)}"
                                                class=" rounded-full p-1 fill-current ">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" 
                                                   stroke="currentColor">
                                                   <path
                                                      x-show="isEmail(formData.email)"
                                                      stroke-linecap="round" stroke-linejoin="round" 
                                                      stroke-width="2" d="M5 13l4 4L19 7" />
                                                   <path
                                                      x-show="!isEmail(formData.email)"
                                                      stroke-linecap="round" stroke-linejoin="round" 
                                                      stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                             </div>
                                             <span
                                                :class="{'text-green-700': isEmail(formData.email), 
                                                'text-red-700': !isEmail(formData.email)}"
                                                class="font-medium text-sm ml-3"
                                                x-text="isEmail(formData.email) ? 
                                                'Email is valid' : 'Email is not valid!' "></span>
                                          </li>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="label" for="subject" x-text="subjectLabel"></label>
                                          <input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="subject" id="subject" placeholder="Subject">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="label" for="#" x-text="messageLabel"></label>
                                          <textarea name="message" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <button type="submit" id="submit" name="send_message" class="btn btn-primary" x-text="buttonLabel">
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
         function getData() {
             return {
                 formData : {
                     fullName:"",
                     email:"",
                     subject:"",
                     message:""
                 },
                 status: false,
                 loading:false,
                 isError: false,
                 buttonLabel:"Apply",
                 fullNameLabel:"Full Name",
                 emailLabel:"Email Address",
                 subjectLabel:"Your Subject",
                 messageLabel:"Your Message",
                 isEmail(email){
                     var re = /\S+@\S+\.\+S/;
                     return re.test(email);
                 }
             }
         }
      </script>
   </body>
</html>