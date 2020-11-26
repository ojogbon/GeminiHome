<?php

/**
 *  this is the controller method for inserting all Testimonial
 * into the database (table name = 	Testimonial).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $Testimonial
 * @param $key
 * @param $TestimonialTitle
 * @param $TestimonialDescription
 * @param $TestimonialImage
 * @param $staff_id 
 * @param $category_id
 * @param $price
 ***/

function insertTestimonial($Testimonial,$key, $TestimonialTitle,$TestimonialDescription,$TestimonialImage,$staff_id,$occupation){

    if ($key == "1234567opiuyt") {

        if (isEmpty([$TestimonialTitle,$TestimonialDescription,$TestimonialImage,$staff_id,$occupation])){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{
                $uploaded = uploadImage ($TestimonialImage,"./loadedImage/");
              if ( $uploaded[0] !== "TRUE" ){
                        echo $uploaded;
              }else{
                  $added = addslashes($TestimonialDescription);
                    if($Testimonial->saveTestimonial("  `testimonial_tbl`(`id`, `staff_id`,
                     `name`, `occupation`, `content`, `image`, `path`, `date`, `status`, `delete`)",
                        "VALUES (null,'$staff_id','$TestimonialTitle','$occupation','$added','$uploaded[1]','$uploaded[2]'
                        ,now(),'0','0')")){
    
                            echo "<div class='alert alert-success'><b> Congratulations!</b>  Testimonial registered successfully</div>";
                    }else{
    
                           echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened! </b>   Please try again</div>";
                    }
              }
              
         
        }
    }
}





/**
 *  this function handles the 
 *  edit of a product details
 * 
 *  @param $product
 *  @param $key
 *  @param $productTitle
 *  @param $productDescription
 *  @param $productImage
 *  @param $category_id
 *  @param $product_id
 * 
*/

function updateProductDtails ($product,$key,$productTitle,$productDescription, $productImage,$category_id ,$product_id,$price){


    if(!empty($key) && $key === "1234567opiuyt" ){

        if(isEmpty([$product,$productTitle,$productImage,$productDescription, $product_id,$category_id,$price])){
            echo "<div class='alert alert-danger'><b>Feilds can't be empty! </b>   Please fill up and try again</div>";
        }else{
            $uploaded = uploadImage ($foodImage,"./loadedImage/");
            if ( $uploaded[0] !== "TRUE" || $extra[0] !== "TRUE"){
                      echo $uploaded;
            }else{
                $added = addslashes($productDescription);
                $sql = "update product set title = '$foodTitle', description = '$added' ,image = '$uploaded[1]' ,path = '$uploaded[2]',category_id = '$category_id',price='$price' where id = '$product_id' ";

                 if ( $product->UpdateFood($sql) == ""){
                    echo "<div class='alert alert-success'><b> Congratulations! </b>  Product details successfully  </div>";
                 }else{
                    echo "<div class='alert alert-danger'><b>Something Happened ! </b>   Please try again</div>";
                 }

            }
        }


    }

}