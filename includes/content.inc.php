<div id="content">   
                <div id="mainContainer">
                    <div id="leftColumn">
                        <div id="mainbox">
                            <h3>Ảnh chế mới</h3>
                            <div class="photoList">
                                <?php 
                                    include('includes/connection.php');
                                    include('includes/function.php');
                                    $query="SELECT * FROM data_image ORDER BY view DESC";
                                    $result=mysqli_query($conn,$query);
                                    kt_query($result,$query);
                                    while($photo=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                    {
                                 ?>
                                <div class="photoListItem" data-id="1">
                                    <div class="photo 1" >
                                        <a href="detail.php?id=<?php echo $photo['id'];  ?>"><img src="<?php echo $photo['image']; ?>"></a>
                                    </div>
                                    <div class="info 1" >
                                        <h2><?php echo $photo['title']; ?></h2>
                                        <div class="stats">
                                            <div class="ViewComment">
                                                <span class="views" title="views"></span>   
                                                    <span id="quantity"><?php 
                                                       echo $photo['view'];
                                                     ?></span>
                                                    

                                                
                                                <span class="comments" title="comments"></span>
                                            </div>
                                            <div class="likeWrapper">
                                               
                                            </div>
                                        </div>
                                        
                                    </div> <!-- END info -->
                                    <div class="clear"></div>
                                </div>
                                <?php 
                                    }
                                 ?>
                            </div>
                        </div>
                    </div><!-- END leftColumn -->
                    <div id="rightColumn">
                        

                    </div>
                </div> <!-- END mainContainer -->
                            
            <!-- phần đăng nhập -->
            <?php 
            include('includes/login.inc.php');
            ?>
            <!-- phần đăng kí -->
            <?php 
            include('includes/signup.inc.php');    
            ?>         

             </div><!-- END content -->