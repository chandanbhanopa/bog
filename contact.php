<?php 
error_reporting(E_ALL);
ini_set('dislpay_errors', 1);
$status = "";
$message = "";
require 'includes/config.php';
$table = "contacts";

if(isset($_POST)) {
  if(isset($_POST['send_message'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $contact_number = $_POST['contact_number'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $error = false;
      if($name == "" || $email == "" || $contact_number == "" || $subject == "" || $message == "") {
        $error = true;
        $message = "<div class='alert alert-danger'>Please fill all information.</div>";
      }

       if(!$error) {
          $sql = "INSERT INTO $table (full_name, email, contact_number, subject, message)
                VALUES ('$name', '$email', '$contact_number', '$subject', '$message')";
            if ($conn->query($sql) === TRUE) {
                $message = "<div class='alert alert-success'>Your request submitted successfully. Our team will reach you shortly</div>";
            } else {
                $message = "<div class='alert alert-danger'>Please try again. Something went wrong.</div>";
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
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Contact Us</h1>
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
										<h3 class="mb-4">Get in touch</h3>
										<div id="form-message-warning" class="mb-4"></div> 
											 <?php if($message) { echo $message ; } ?>
											<form method="POST" action="<?=$_SERVER['PHP_SELF']?>" id="contactForm" name="contactForm" class="contactForm">
												<input type="hidden" name="request_type" value="contact" />
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="label" for="name" x-text="fullNameLabel"></label>
															<input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="name" id="fullname" placeholder="Name" required="" >
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
															<label class="label" for="contact_number" x-text="mobileLabel"></label>
															<input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="contact_number" id="contact_number" placeholder="Contact Number" required="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="label" for="subject" x-text="subjectLabel"></label>
															<input type="text" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" name="subject" id="subject" placeholder="Subject" required="">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="label" for="#" x-text="messageLabel"></label>
															<textarea name="message" class="form-control focus:bg-white focus:border-gray-600 focus:outline-none" id="message" cols="30" rows="4" placeholder="Message" required=""></textarea>
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
								<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
									<div class="info-wrap bg-primary w-100 p-md-5 p-4">
										<h3>Let's get in touch</h3>
										<p class="mb-4">We're open for any suggestion or just to have a chat</p>
							        	<div class="dbox w-100 d-flex align-items-start">
							        		<div class="icon d-flex align-items-center justify-content-center">
							        			<span class="fa fa-map-marker"></span>
							        		</div>
							        		<div class="text pl-3">
								            	<p>
								            		<span>Branch Office:</span> 
								            		<br/>
								            	BOG Trading, 317,3rd Floor Brilliant Titanium Vijay Nagar, Indore-452001</p>
								         	</div>
								         	<div class="text pl-3">
								            	<p><span>Rgnl Offcie:</span> 
								            	<br/>
								            	49-50, united compound, Lasudia Meri Dewas Naka, Indore 452010
								            	</p>
								         	</div>
							            </div>
							        	<div class="dbox w-100 d-flex align-items-center">
							        		<div class="icon d-flex align-items-center justify-content-center">
							        			<span class="fa fa-phone"></span>
							        		</div>
							        		<div class="text pl-3">
								            <p><span>Phone:</span> 
								            	<br/>
								            	<a href="tel://9752629888">(+91)97526-29888</a>
								            	<a href="tel://9301030931">(+91)93010-30931</a>

								            </p>
								          </div>
							           </div>
						        		<div class="dbox w-100 d-flex align-items-center">
							        		<div class="icon d-flex align-items-center justify-content-center">
							        			<span class="fa fa-paper-plane"></span>
							        		</div>
							        		<div class="text pl-3">
								            	<p><span>Email:</span>
								            	<a href="mailto:info@yoursite.com">admin@bogtrading.com</a>
								            	<br/>
								            	<a href="mailto:info@yoursite.com">accounts@bogtrading.com</a>
								            </p>
								          	</div>
						          		</div>
							        	<div class="dbox w-100 d-flex align-items-center">
							        		<div class="icon d-flex align-items-center justify-content-center">
							        			<span class="fa fa-globe"></span>
							        		</div>
							        		<div class="text pl-3">
								            	<p><span>Website</span>
													<a href="https://bogtrading.com/">https://bogtrading.com/</a>
												</p>
								          </div>
							          	</div>
				          			</div>
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
					message:"",

				},
				status: false,
				loading:false,
				isError: false,
				buttonLabel:"Send Your Message",
				fullNameLabel:"Full Name",
				emailLabel:"Email Address",
				subjectLabel:"Your Subject",
				messageLabel:"Your Message",
				mobileLabel:"Mobile Number",
				isEmail(email){
					var re = /\S+@\S+\.\+S/;
					return re.test(email);
				}
			}
		}
		// $(document).ready(function(){
		// 	$("#submit").click(function(e){
		// 		e.preventDefault();
		// 		let fullname = cleanData($("#fullname").val());
		// 		let email = cleanData($("#email").val());
		// 		let subject = cleanData($("#subject").val());
		// 		let message = cleanData($("#message").val());
		// 		if(fullname == "") {
		// 			alert("Enter your full name");	
		// 			return;
		// 		}

		// 	});

		// 	let cleanData = function(data){
		// 		return data.trim();
		// 	}
		// });

	</script>
  </body>
</html>