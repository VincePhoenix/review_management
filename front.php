 <?php 
            // ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
            $all_review=mysqli_query($mysqli,"SELECT * FROM tbl_review WHERE status='1' ORDER BY id DESC LIMIT 3");
                             while($data_review=mysqli_fetch_assoc($all_review)){  ?>
                <div class="item mb-2 d-flex">
                  <div class="border-0 p-3 background-white ">
                      <div class="d-flex">
                      <img src="img/user-icon-review.png" class="img-fluid mb-2 radius-img-border m-0" width="45" height="45">
                       <div class="ps-2">
                            <a class="text-decoration-none" href="#">
                                <h6 class="mb-0"> 
                                    <?php 
                                    if($data_review['generated']==1){ 
                                        echo $data_review['username']; 
                                        }else{ 
                                           $reviewer_id=$data_review['user_id'];
                                           $reviewer=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT full_name FROM user_reg WHERE id='$reviewer_id'"));
                                           echo $reviewer['full_name'];
                                        } 
                                       ?>
                                </h6>
                                <!-- <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div> -->
                            </a>
                              <span class="star-rating">
                                 <?php  if($data_review['stars'] > 0){
                                        for ($i=0; $i < $data_review['stars']; $i++) { 
                                         echo '<span class=" active">★</span>';
                                  } } ?>                           
                            </span>
                            </div>
                      </div>
                    <blockquote class="blockquote">
                      <h5 class="web-color mb-2"><?php echo ucfirst(substr($data_review['title'], 0,25)).'...';?></h5>
                      <p class="d-sm-none d-lg-block"><?php echo substr($data_review['comment'], 0,100).'...'; ?></p>
                    </blockquote>
                  </div>
                </div>
             <?php }  ?>  
