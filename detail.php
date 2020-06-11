<link rel="stylesheet" type="text/css" href="account/includes/detail.css">
<?php 
    session_start();
    if(!isset($_SESSION['uid']))
    {
        include('includes/header.inc.php');
    }
    else 
    {
    	include('account/includes/header.php');
    } 
include('includes/connection.php');
include('includes/function.php');
 ?>
 <?php 
 	if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>=1)))
		{
			$id=$_GET['id'];
		}
		else
		{
			header('Location: index.php');
			exit();
		}
	$query = "SELECT * FROM data_image WHERE id={$id}";
	$result = mysqli_query($conn,$query);
    kt_query($result,$query);
    while($photo=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    	?>
    
<div id="content_a">
	<div id="mainContainer_a">
		<div id="leftColumn_a">
			<div id="mainBox">
				<div id="photoDetails">
					<div id="photoInfo">
						<h1><?php echo $photo['title']; ?></h1>
						<div class="stats">
							<p class="views">
								<p class="view_a">Lượt xem:</p>
								<p class="number"><?php echo $photo['view']; ?></p>
							 </p>
							<p class="comments">
								<p class="comment_a">Lượt bình luận:</p> 
								<p class="numbers"><?php echo $photo['view']; ?></p>
							</p>
						</div>
						<div class="source">
							<p class="source_a">
								<p class="nguon">Nguồn:</p>
								<p class="text">Sưu tầm</p>
							</p>
						</div>
					</div>
					
					<div id="uploader">
		
					</div>
					<div class="clear"></div>
					<div class="like_share">
						<p class="textt">Thích ảnh này?</p>
						<div class="fbLike">
							<div class="fbLikeButton">
							<a class="button_like">Like</a>
						</div>	
						</div>
						
						<div class="navButtons">
							<a class="prev" href="#">Ảnh trước</a>
							<a class="next" href="#">Ảnh sau</a>
						</div>
						<div class="clear"></div>
					</div> <!-- END like_share -->
					<div id="photoImg">
						<img src="<?php echo $photo['image'];?>">
					</div>
				</div><!-- END photoDetails --> 
			</div> <!-- END mainBox -->
		</div> <!-- END leftColumn_a -->	
		<div id="rightColumn_a">
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhaivl.com%2F&tabs=timeline&width=300&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=289290491908061" width="310" height="500" ; style="border:none;overflow:hidden;margin-top:20px; scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> 
		</div>
	</div>	<!-- END mainContaier_a -->
<?php  	
	}	

  ?>
</div> <!-- END content_a -->



 <?php 
include('includes/footer.inc.php');
  ?>