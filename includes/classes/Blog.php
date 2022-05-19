<?php
    class Blog {
        private $connect;

        public function __construct($connect){
            $this->connect = $connect;
        }

        public function getBlogTopic($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['topic'];
        }

        public function getBlogCoverImage($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['cover_image'];
        }

        public function getBlogBrand($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['brand'];
        }

        public function getBlogTitle($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['title'];
        }

        public function getBlogBody($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['body'];
        }

        public function getBlogDatePosted($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['date_posted'];
        }

        public function getBlogTimePosted($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['time_posted'];
        }

        public function getBlogHeadings($blogID){

            $query = "SELECT * FROM blogs WHERE id='$blogID'";
            $result = mysqli_query($this->connect, $query);

            $this->row = mysqli_fetch_array($result);

            return $this->row['headings'];
        }
    }

?>