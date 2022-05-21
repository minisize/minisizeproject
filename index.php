<!-- Default Header Paste-->
<?php
    include("includes/main-header.php");
    include("includes/classes/Homepage.php");

    $Home_funct = new Home_functions($connect);
?>

<!--Add hero header in here-->

</header>

<!-- Enter Main Content Here-->

<main class="">
    <div class="container ">
        <div class="row w-100">
            <div class="col-3 " > Picture of Hand blablabla </div>
            <div class="col-9 ">
                <h1 class="text-center text-capitalize"> MiniSize </h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
        </div>
    </div>
    <div class="container p-3">
        <h3 class="row"> BEST SELLERS </h3>

        <div class="overflow-scroll row w-auto p-3 best-sellers-container">

            <!-- PHP CODE FOR LISTING -->
            <?php $Home_funct->GenerateList($connect);

            // //Limit the items to display
            // $Item_Display_Limit=0;

            // //Gets data from minisize_db
            // if ($result -> num_rows > 0){

            //     while (($row = $result -> fetch_assoc()) && ($Item_Display_Limit <= 5)){

            //         //set $jsonobj to the value of input of the array "images" from $row;
            //         $jsonobj = $row["images"];
            //         //set $obj to the value of a php object converted from the string of $jsonobj
            //         $obj = json_decode($jsonobj);
            //         // Set $img to the value of image1 from images by php object $obj
            //         $img = $obj->images->image1;

            //         //Creation of HTML
            //         echo "
            //         <div class='col w-auto'>
            //             <div class='thumbnail'>
            //                 <img src='" .$img. "' class='img-fluid display-item-dimension'>
            //             </div>
            //             <div class='description'>
            //                 <p><strong>" .$row["name"] . "</strong></p> 
            //             </div>
            //         </div>";

            //         $Item_Display_Limit += 1;
            //     }
            // } else {
            //     echo "0 results";
            //   }
            // ?>
        </div>
        
    </div>


    <div class="main_content container p-3">
        <div class="row row-cols-2">
            <img class="col" src="<?php $Home_funct->Generate_Random_img($connect,6) ?>">
            <div class="col container1_subcontent">
                <h5> Meet our Bundles! </h5>
                <p>Meet our bundle! We provide small set of skincare products for one time use for our customers.</p>
                <button> View all </button>
            </div>
        </div>
        <div class="row row-cols-2">
            <div class="col container2_subcontent">
                <h5>Full-size products!</h5>
                <p>Full Sized products are available too! make sure to get a subscription in order to get discounts for the produts!</p>
                <button> View all </button>
            </div>
            <img class="col-5" src="<?php $Home_funct->Generate_Random_img($connect,0) ?>">
        </div>
    </div>
    <div class="container p-3">
        <h4 class="row"> Find the right products for your skin type! </h4>
        <div class="row">
            <div class="col">
                <button class="w-75 p-3"> 
                    <h2> Oily </h2>
                </button>
            </div>
            <div class="col">
                <button class="w-75 p-3"> 
                    <h2> Dry </h2>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="w-75 p-3"> 
                    <h2> Sensitive </h2>
                </button>
            </div>
            <div class="col">
                <button class="w-75 p-3"> 
                    <h2> Combination </h2>
                </button>
            </div>
        </div>
        

    </div>
</main>

<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
?>
