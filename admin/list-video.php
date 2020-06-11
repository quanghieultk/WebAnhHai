<?php 
	include("includes/header.php");
	include("includes/sidebar.php");
	include("../includes/connection.php");
 ?>
 <div style="float:left;width: 1200px;margin: 60px 0px 0px 20px;">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Danh sách video</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Mã</th>
					<th>Title</th>
					<th>Link</th>
					<th>Thứ tự</th>
					<th>Like</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query="SELECT * FROM data_video ORDER BY ordernum DESC";
					$result= mysqli_query($conn,$query) or die("Query {$query} \n <br/> MYSQL errors:".mysqli_error($conn));
					while ($video=mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						?>
					<tr>
					<td><?php echo $video['id']; ?></td>
					<td><?php echo $video['title']; ?></td>
					<td><?php echo $video['link'] ?></td>
					<td><?php echo $video['ordernum'] ?></td>
					<td><?php echo $video['likes']; ?></td>
					<td><?php echo $video['view']; ?></td>
					<td align="center"><a onclick="return confirm('Bạn có muốn sửa video này không');" href="edit-video.php?id=<?php echo  $video['id']; ?>"><img width="16px"  src="../images/icon_edit.png"></a></td>
					<td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa video không');" href="delete-video.php?id=<?php echo $video['id'];?>"><img width="16px" src="../images/icon_delete.png"></a></td>
					</tr>
					<?php 	 
					}
				 ?>
			</tbody>
		</table>

	</div> 	
	
 </div><