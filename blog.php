    <?php
    include("includes/main-header.php");

    if (isset($_GET['id'])) {
        $blogID = $_GET['id'];
    }
    ?>

    </header>

    <br><br>
    <div class="container l-25">
        <p>Posted <?php echo $blog_obj->getBlogDatePosted($blogID); ?> • <?php echo $blog_obj->getBlogTimePosted($blogID); ?></p>
        <h2 class="text-darkgreen fw-bold"><?php echo $blog_obj->getBlogTitle($blogID); ?></h2>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4 mb-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $blog_obj->getBlogBrand($blogID); ?></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $blog_obj->getBlogTitle($blogID); ?></li>
            </ol>
        </nav>

    </div>

    <img src="<?php echo $blog_obj->getBlogCoverImage($blogID); ?>" alt="Blog Cover Image" class="blog-cover float-left mb-5">

    <div class="container blog-body">
        <div class="container">
            <button id="share-btn" type="button" onclick="" data-bs-toggle="modal" data-bs-target="#" class="text-dark text-decoration-none material-icons">share</button>
            <button id="share-btn" type="button" onclick="" data-bs-toggle="modal" data-bs-target="#" class="btn text-dark text-decoration-none material-icons">facebook</button>
            <button id="share-btn" type="button" onclick="" data-bs-toggle="modal" data-bs-target="#" class="btn text-dark text-decoration-none material-icons">messenger</button>
        </div>
        <?php echo $blog_obj->getBlogBody($blogID); ?>
        <?php echo $blog_obj->getBlogHeadings($blogID); ?>
    </div>

    <?php
    include("includes/main-footer.php");
    ?>