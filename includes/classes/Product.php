<?php
    class Product {
        private $user_obj;
        private $connect;

        public function __construct($connect, $user){
            $this->connect = $connect;
            $this->user_obj = new User($connect, $user);
        }

        public function loadPage($productType){
            switch($productType){
                case "Hyaluronic Acid":
                    $tab = "By Key Ingredient";
                    break;
                case "Niacinamide":
                    $tab = "By Key Ingredient";
                    break;
                case "Vitamin E":
                    $tab = "By Key Ingredient";
                    break;
                case "Antioxidants":
                    $tab = "By Key Ingredient";
                    break;
                case "Salicylic Acid":
                    $tab = "By Key Ingredient";
                    break;
                case "Amino Acids":
                    $tab = "By Key Ingredient";
                    break;
                case "Butylene Glycol":
                    $tab = "By Key Ingredient";
                    break;
                case "Citric Acid":
                    $tab = "By Key Ingredient";
                    break;
                case "Glycerin":
                    $tab = "By Key Ingredient";
                    break;
                case "Hydration":
                    $tab = "By Concern";
                    break;
                case "Pore Solutions":
                    $tab = "By Concern";
                    break;
                case "Troubled Skin":
                    $tab = "By Concern";
                    break;
                case "Dullness & Uneven Skin Tone":
                    $tab = "By Concern";
                    break;
                case "Sensitive Skin":
                    $tab = "By Concern";
                    break;
                case "Age Prevention":
                    $tab = "By Concern";
                    break;
                case "Lifting & Firming":
                    $tab = "By Concern";
                    break;
                default:
                    break;
            }
        }
    }
?>