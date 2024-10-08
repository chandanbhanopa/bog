<section class="ftco-section ftco-no-pb ftco-no-pt bg-secondary">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-7 d-flex align-items-center">
                    <h2 class="mb-3 mb-sm-0" style="color: black; font-size: 22px">
                        Sign Up for Your Free 1st Accounting Consultation
                    </h2>
                </div>
                <div class="col-md-5 d-flex align-items-center" x-data="subscriptionForm()">
                    <form action="#" class="subscribe-form"  @submit.prevent="submitData">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" x-model="formData.email" placeholder="Enter email address" />
                            <input type="submit" value="Subscribe" class="submit px-3" x-text="buttonLabel" x-model="buttonLabel"/>
                        </div>
                        <span x-bind:class="isError ? 'text-red-600 font-bold' : 'text-green-600 font-bold' " x-text="message" x-model="isError" ></span>
                    </form>
                </div>
            </div>
        </div>
</section>
<footer class="footer">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="row">
                    <div class="col-md-4 mb-md-0 mb-4">
                        <h2 class="footer-heading">About us</h2>
                        <p>
                        At BOG, we specialize in delivering comprehensive accounting solutions and trading services tailored to meet the diverse needs of businesses across industries.
                        </p>
                        <ul class="ftco-footer-social p-0">
                            <li class="ftco-animate">
                                <a href="https://www.facebook.com/profile.php?id=61565422674185" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"><span
                                        class="fa fa-twitter"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="https://x.com/BogTrading" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><span
                                        class="fa fa-facebook"></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-10">
                                <div class="row">
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">Services</h2>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="market-analysis.php" class="py-1 d-block">Market Analysis</a>
                                            </li>
                                            <li>
                                                <a href="accounting-adviser.php" class="py-1 d-block">Accounting Advisor</a>
                                            </li>
                                            <li>
                                                <a href="general-consultancy.php" class="py-1 d-block">General Consultancy</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">Discover</h2>
                                        <ul class="list-unstyled">
                                            <li><a href="about.php" class="py-1 d-block">About us</a></li>
                                            <li>
                                                <a href="contact.php" class="py-1 d-block">Contract us</a>
                                            </li>
                                            <li>
                                                <a href="#" class="py-1 d-block">Terms &amp; Conditions</a>
                                            </li>
                                            <li><a href="#" class="py-1 d-block">Policies</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">Resources</h2>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="py-1 d-block">Security</a></li>
                                            <li><a href="#" class="py-1 d-block">Global</a></li>
                                            <li><a href="#" class="py-1 d-block">Charts</a></li>
                                            <li><a href="#" class="py-1 d-block">Privacy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-md-5">
                    <div class="col-md-12">
                        <p class="copyright">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved !<a href="#" target="_blank">BOG Group</a>
                        </p>
                    </div>
                </div>
            </div>
           <!--  <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5" x-data="enquiryForm()">
                <h2 class="footer-heading">Free consultation</h2>
               
                <form action="#" class="form-consultation" @submit.prevent="sendEnquiry" >
                    <div class="form-group">
                        <input type="text" x-bind:class="isNameEmpty ? 'border-red-600' : 'border-green-600' " class="form-control" placeholder="Your Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" />
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="3" class="form-control"
                            placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control submit px-3" x-text="enquiryBtnLabel" x-model="enquiryBtnLabel">
                        </button>
                    </div>
                </form>
            </div> -->
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

<script type="text/javascript">
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    function subscriptionForm() {
        return {
            formData: {
                email:""
            },
            message:"",
            buttonLabel:"Subscribe",
            isError : true,
            submitData() {
                this.buttonLabel = "Sending...";
                if(this.formData.email == ""){
                    this.isError = true;
                    this.buttonLabel = "Subscribe";
                    this.message = "Enter your email address";
                    return;
                } else {
                    this.formData.type = "subscription",
                    this.formData.csrf_token = csrfToken,
                    this.message = '';
                    fetch('/Api/index.php',{
                        method:'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body:JSON.stringify(this.formData)
                    })
                    .then((res)=> {
                        return res.json();
                    })
                    .then((res)=> {
                        this.message = res.message;
                        this.buttonLabel = "Subscribe";
                        this.isError = !res.status;
                        this.formData.email = "";
                        return;
                    })
                    .catch((error)=>{
                        console.log(error);
                        this.isError = true;
                        this.buttonLabel = "Subscribe";
                        this.message="Something went wrong. Please try again";

                    })
                }
                
            }
        }
    }
</script>
