<?php

$user_id = isset($_SESSION['user']) && $_SESSION['user']['id'];
$posts = getBlogs($user_id, $con);
?>

<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="d-flex justify-content-between mb-2">

                <h2> All Blogs</h2>
                <a href="index.php?page=create-blog" class="btn btn-success rounded "> Create Blog</a>
            </div>
            <?php if (!empty($posts)): ?>
                <div class="col-12">
                    <table class="table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $post): ?>
                                <tr>
                                    <th scope='row'><?= $post["id"] ?></th>
                                    <td>
                                        <img src="<?= $post["image"] ?>" class=" w-25" alt="">
                                    </td>
                                    <td><?= $post["title"] ?></td>
                                    <td>
                                        <?= $post["content"] ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href='index.php?id=<?= $post["id"] ?>&page=edit-blog' class='btn btn-warning m-2 w-50'>Edit</a>
                                        <a href='index.php?id=<?= $post["id"] ?>&page=delete-blog-controllers' class='btn btn-danger m-2 w-50'>Delete</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                </div>
        </div>
</article>