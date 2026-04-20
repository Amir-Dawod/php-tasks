<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                    <form id="contactForm" action="index.php?page=login_controllers" method="post">

                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..." />
                            <label for="email">Email address</label>
                            <!-- <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                             <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div> -->
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password" name="password" type="password" placeholder="Enter your phone number..." />
                            <label for="phone">Password Number</label>
                            <!-- <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div> -->
                        </div>

                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>