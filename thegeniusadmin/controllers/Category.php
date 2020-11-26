<?php



/**
 *  this is the controller method for inserting all Category
 * into the database (table name = 	category).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $category
 * @param $key
 * @param $categoryTitle
 * @param $staff_id 
 ***/

function insertCategory($category,$key,$categoryTitle,$staff_id){

    if ($key == "1234567opiuyt") {

        if (isEmpty([$categoryTitle,$staff_id])){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{
               
                    if($category->saveCategory("`category`(`id`, `staff_id`, `title`, `date`, `status`, `deleted`)",
                        "VALUES (null,'$staff_id','$categoryTitle',now(),'0','0')")){
    
                            echo "<div class='alert alert-success'><b> Congratulations!</b>  category registered successfully</div>";
                    }else{
    
                           echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened! </b>   Please try again</div>";
                    }
              
         
        }
    }
}



/**
 *  this function handles the 
 *  edit of a food details
 * 
 *  @param $category
 *  @param $key
 *  @param $categoryTitle
 *  @param $category_id
 * 
*/

function updateCategoryDtails ($category,$key,$categoryTitle,$category_id){

    if(!empty($key) && $key === "1234567opiuyt" ){

        if(isEmpty([$menu,$menuTitle,$menu_id])){
            echo "<div class='alert alert-danger'><b>Feilds can't be empty! </b>   Please fill up and try again</div>";
        }else{        
                $sql = "update category set title = '$categoryTitle' where id = '$category_id' ";

                 if ( $category->UpdateCategory($sql) == ""){
                    echo "<div class='alert alert-success'><b> Congratulations! </b>  Category details successfully  </div>";
                 }else{
                    echo "<div class='alert alert-danger'><b>Something Happened ! </b>   Please try again</div>";
                 }

        }

    }

}