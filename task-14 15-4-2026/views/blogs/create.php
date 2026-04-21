
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="my-5">
                     
                        <form id="contactForm" action="index.php?page=blog-controllers" method="post" enctype="multipart/form-data">
                            <div class="form-floating">
                                <input class="form-control" id="title" name="title" type="text" placeholder="Enter your title ..." />
                                <label for="title">Title</label>
                            </div>

                            <div class="form-floating">

                                <input class="form-control" id="image" name="image" type="file" placeholder="Enter your image ..." />
                                <label for="content">Image </label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="content" name="content" type="text" placeholder="Enter your content ..." />
                                <label for="content">Content </label> <br>
                            </div>
                            <div>
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Create </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
