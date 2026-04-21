   <?php

    $post_id = $_GET['id'];
    $post = getBlog($post_id, $con);
    if (empty($post)) {
        header("location:index.php?page=post");
        exit();
    }
    ?>
    
   <!-- Main Content-->
   <main class="mb-4">
       <div class="container px-4 px-lg-5">
           <div class="row gx-4 gx-lg-5 justify-content-center">
               <div class="col-md-10 col-lg-8 col-xl-7">
                   <div class="my-5">
                       <form id="contactForm" action="index.php?page=edit-blog-controllers" method="post" enctype="multipart/form-data">
                           <div class="form-floating mb-2">
                               <input class="form-control" id="title" name="title" type="text" value="<?= $post['title']  ?>" placeholder="Enter your title ..." />
                               <label for="title">Title</label>
                           </div>
                           <input class="form-control" id="id" name="id" type="hidden" value="<?= $post_id ?>" placeholder="Enter your title ..." />
                           <?php if (!empty($post['image'])):  ?>
                               <div class="mb-2">
                                   <label for="content"> Current Image </label> <br>
                                   <img src="<?= $post["image"] ?>" class=" w-50 " alt="">
                               </div>
                           <?php endif; ?>
                           <div class="form-floating mb-2">

                               <label for="content"> Choose Image </label> <br>
                               <input class="form-control" id="image" name="image" type="file" placeholder="Enter your image ..." />
                           </div>
                           <div class="form-floating mb-2">
                               <input class="form-control" id="content" name="content" type="text" value="<?= $post['title']  ?>" placeholder="Enter your content ..." />
                               <label for="content">Content </label> <br>
                           </div>
                           <div>
                               <!-- Submit Button-->
                               <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Edit Blog </button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </main>