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
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
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
            <i class="icon-check-empty icon-stack-base"></i>
            <i class="icon-twitter"></i>
        </div>
        <!-- <?php echo $blog_obj->getBlogBody($blogID);?></li> -->
        <div class="container">
            <div class="blog-article-desc">
                    <p id="head">
                        <img height="300" alt="CeraVe Skincare Routine for Oily Skin" width="300" src="assets/images/others/blog-cerave-2.jpg" style="float: right; margin: 15px" />
                        If you have an oily skin type,
                        implementing a tailored daily skincare routine is one of the best ways
                        to help balance your complexion. The right skincare ingredients and
                        products can help minimise shine and other unwanted signs of an oily
                        complexion. Oily skin still needs hydration, but it's important to
                        choose non-comedogenic products that won't contribute to clogging your
                        pores. <br />
                        <br />
                        Read on to find out what causes an oily face, as well as how to know
                        if you have this skin type. Wondering can oily skin use Hyaluronic
                        Acid? We'll also cover the best ingredients for oily skin, before
                        detailing a step-by-step skincare routine.
                    </p><br>
                    <h2 id="def" class="text-darkgreen">What is oily skin?</h2><hr>
                    <p>
                        Oily skin vs dry skin has different skincare needs. Taking the time to
                        understand your skin type is the first step to implementing the skin
                        routine that will suit you best.
                    </p>
                    <p>
                        In terms of how to tell if you have oily or dry skin, looking for the
                        tell-tale signs of shine or dullness is one simple strategy. Other
                        signs of oily skin also include enlarged pores and blackheads. If
                        you're not sure whether your levels of oil are normal or excessive,
                        try patting your face with blotting papers. Normal skin should only
                        leave a small amount of oil on the skin from certain areas, while oily
                        skin will leave more oil from all over.
                    </p><br>
                    <h2 id="cause" class="text-darkgreen">What is an oily skin type caused by?</h2><hr>
                    <p>
                        <span
                            >Oily skin can be caused by environmental, lifestyle or internal
                        factors. Environmental and lifestyle factors include stress, warm
                        weather and over-cleansing your skin, prompting your sebaceous
                        glands to produce more oil. Internal causes of oily skin include
                        hormonal imbalances and genetics. No matter the cause of your oily
                        skin, a well targeted skincare routine can help manage this skin
                        concern.</span
                            >
                    </p><br>
                    <h2 id="ing" class="text-darkgreen"><span>What ingredients are good for oily skin?</span></h2><hr>
                    <p>
                        <span
                            >If you have this skin type, you've likely wondered does oily skin
                        need moisture or hydration? Oily skin is often thought of as the
                        opposite of dry skin/span
                        ><span
                            >, however there are some things that all skin types need. Very oily
                        skin types can occasionally skip moisturiser if needed, but
                        hydrating ingredients are an important part of your skincare regime
                        for every skin type.</span
                            >
                    </p>
                    <h4 class="text-darkgreen">Why does oily skin need hydration?</h4><hr>
                    <p>
                        <span
                            >Put simply, there's a difference between surface dryness and skin
                        dehydration. Oily skin is still vulnerable to the latter, where
                        there aren't enough water molecules bound to the skin's surface and
                        its outermost layers. If heavy moisturisers don't work well with
                        your oily skin, opt for a lightweight moisturiser or hydrating serum
                        featuring targeted ingredients as recommended below.</span
                            >
                    </p>
                    <p>
                        <span
                            ><img
                            alt=""
                            height="250"
                            width="250"
                            src="assets/images/others/blog-cerave-3.jpg"
                            style="float: left; margin: 0 15px 15px 0"
                            /><strong>Ceramides:</strong><br />
                        <br />
                        You can think of ceramides as the
                        building blocks of the skin's natural protective barrier. These
                        lipids (oils) help protect skin against dehydration and
                        environmental aggressors. CeraVe skincare is enriched with 3
                        essential ceramides to help strengthen the natural protective skin
                        barrier.<br />
                        <br />
                        <strong>Hyaluronic acid:</strong><br />
                        <br />
                        Hyaluronic acid is a water attracting sugar found naturally in the
                        skin and responsible for its volume and plumpness. Why is hyaluronic acid good for oily skin? This powerful ingredient acts like a sponge to
                        draw in 1,000 times its own weight in water, perfect for hydrating
                        all skin types.<br />
                        <br />
                        <strong>Salicylic acid:</strong><br />
                        <br />
                        This beta hydroxy acid has long been used to help unclog pores and
                        manage oily skin and skin prone to mild acne. Salicylic acid can be found in cleansers, serums, moisturisers and more.</span
                            >
                    </p><br><br>
                    <h2 id="rec" class="text-darkgreen">
                        <span>How to control oily skin with a CeraVe skincare regime?</span>
                    </h2 class="text-darkgreen"><hr><br>
                    <h4 class="text-darkgreen">Cleanser</h4><br>
                    <p>
                        Look for a gentle facial cleanser.
                        A foaming cleanser formula is ideal for removing excess oil, dirt, and
                        makeup from an oily complexion. Our CeraVe Foaming Cleanser is designed to act as an ideal cleanser for oily skin. This cleanser
                        features ceramides, hyaluronic acid and niacinamide to help strengthen
                        the skin barrier, attract hydration, and comfort the skin.<br />
                        <br />
                        Gently massage on a damp face before rinsing and gently patting dry.
                    </p>
                    <h4 class="text-darkgreen">Moisturiser</h4><br>
                    <p>
                        <img
                            height="300"
                            alt="CeraVe Day Moisturiser with SPF"
                            width="300"
                            src="assets/images/others/blog-cerave-4.jpg"
                            style="float: right; margin: 0 0 0 15px"
                            />Choosing a non-comedogenic face moisturiser formula with a lightweight texture is an important part of how to
                        reduce oil production on your face. In the morning, we recommend a
                        formula including sun protection like our CeraVe AM Facial Moisturising Lotion with SPF 15. This non-comedogenic moisturiser is suitable for all skin types,
                        including oily skin.<br />
                        <br />
                        In the PM, our CeraVe Facial Moisturising Lotion utilises hyaluronic acid and ceramides to help combat
                        trans-epidermal water loss (TEWL) overnight.<br />
                        <br />
                        Apply your moisturiser of choice over your face and neck as needed.
                    </p>
                    <h4 class="text-darkgreen">Eye Cream</h4><br>
                    <p>
                        The skin around your eyes tends to be thinner, and more vulnerable
                        than the rest of your complexion. That's why it's important for all
                        skin types to target the eye area with a dedicated hydrating eye
                        cream.<br />
                        <br />
                        Our CeraVe Eye Repair Cream 
                        is formulated with a Marine and Botanical Complex to help brighten the
                        eye area, visibly reducing dark circles and puffiness.<br />
                        <br />
                        Apply in small dots around the eye area and gently smooth until
                        absorbed.
                    </p>
                </div>
            </div>
        <div class="headings">
            <a href="#head">Introduction</a>
            <a href="#def">Definition</a>
            <a href="#cause">Causes</a>
            <a href="#ing">Ingredients</a>
            <a href="#rec">Recommended Products</a>
        </div>
    </div>


    <?php
        include("includes/main-footer.php");
    ?>