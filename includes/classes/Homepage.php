<?php

class Home_functions
{
    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function GenerateList($connect)
    {
        $sql = "SELECT *, AVG(ave_rating) as ave_rating FROM `products` ORDER BY ave_rating DESC";
        $result = $connect->query($sql);

        //Limit the items to display
        $Item_Display_Limit = 0;
        //Gets data from minisize_db
        if ($result->num_rows > 0) {

            while (($row = $result->fetch_assoc()) && ($Item_Display_Limit <= 5)) {

                $id = $row['id'];

                //set $jsonobj to the value of input of the array "images" from $row;
                $jsonobj = $row["images"];
                //set $obj to the value of a php object converted from the string of $jsonobj
                $obj = json_decode($jsonobj);
                // Set $img to the value of image1 from images by php object $obj
                $img = $obj->images->image1;

                //Creation of HTML
                echo "
                            <div class='col px-2 py-1 position-relative display-item-container product-display'>
                                <div class='thumbnail'>
                                    <img src='" . $img . "' class='display-item-dimension'>
                                </div>
                                <div class='description'>
                                    <p><strong>" . $row["name"] . "</strong></p> 
                                </div>
                                <div class='overlay-product'></div>
                                <a href='product-item.php?id=$id' class='product-view btn btn-outline-primary fw-bold px-5'>View</a>
                            </div>";

                $Item_Display_Limit += 1;
            }
        } else {
            echo "0 results";
        }
    }

    public function Generate_Random_img($connect, $Category)
    {
        if ($Category = 6) {
            $sql =  "SELECT * FROM `products` WHERE category_id = 6 ORDER BY rand()";
        } else {
            $sql =  "SELECT * FROM `products` ORDER BY rand()";
        }
        
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            //set $jsonobj to the value of input of the array "images" from $row;
            $jsonobj = $row["images"];
            //set $obj to the value of a php object converted from the string of $jsonobj
            $obj = json_decode($jsonobj);
            // Set $img to the value of image1 from images by php object $obj
            $img = $obj->images->image1;

            echo "$img";
        } else {
            echo "Error";
        }
    }
}
