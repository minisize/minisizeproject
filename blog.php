    <?php
        include("includes/main-header.php");

        if(isset($_GET['id'])){
            $blogID = $_GET['id'];
        }
    ?>

    </header>

    <br><br>
    <div class="container l-25">
        <p>Posted <?php echo $blog_obj->getBlogDatePosted($blogID);?> • <?php echo $blog_obj->getBlogTimePosted($blogID);?></p>
        <h2 class="text-darkgreen fw-bold"><?php echo $blog_obj->getBlogTitle($blogID);?></h2>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4 mb-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#" >Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                <?php echo $blog_obj->getBlogBrand($blogID);?></li>
                <li class="breadcrumb-item active" aria-current="page">
                <?php echo $blog_obj->getBlogTitle($blogID);?></li>
            </ol>
        </nav>

    </div>

    <img src="<?php echo $blog_obj->getBlogCoverImage($blogID);?>" alt="Blog Cover Image" class="blog-cover float-left mb-5">

    <div class="container blog-body">
        <div class="container">
            <button id="share-btn" type="button" onclick="" data-bs-toggle="modal" data-bs-target="#" class="text-dark text-decoration-none material-icons">share</button>
            <button id="share-btn" type="button" onclick="" data-bs-toggle="modal" data-bs-target="#" class="btn text-dark text-decoration-none material-icons">facebook</button>
            <button id="share-btn" type="button" onclick="" data-bs-toggle="modal" data-bs-target="#" class="btn text-dark text-decoration-none material-icons">messenger</button>
        </div>
        <?php echo $blog_obj->getBlogBody($blogID);?>
        <!-- <div class="container">
                
        </div> -->
        <?php echo $blog_obj->getBlogHeadings($blogID);?>
        <div class="headings">
            <a href="#head" style="display: block !important; margin-top: .5rem; padding-left: 2rem;">Introduction</a>
            <a href="#def" style="display: block !important; margin-top: .5rem; padding-left: 2rem;">Definition</a>
            <a href="#cause" style="display: block !important; margin-top: .5rem; padding-left: 2rem;">Causes</a>
            <a href="#ing" style="display: block !important; margin-top: .5rem; padding-left: 2rem;">Ingredients</a>
            <a href="#rec" style="display: block !important; margin-top: .5rem; padding-left: 2rem;">Recommended Products</a>
        </div>
    </div>


    <?php
        include("includes/main-footer.php");
    ?>