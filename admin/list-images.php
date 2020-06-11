<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('../includes/connection.php');  ?>
<div style="width: 1200px; float: left; margin: 60px 0px 0px 20px; ">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách ảnh</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Mã</th>
					<th>Tiêu đề</th>
					<th>Ảnh</th>
					<th>Link</th>
					<th>Thứ tự</th>
					<th>Like</th>
					<th>View</th>
					<th>Edit</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query="SELECT * FROM data_image ORDER BY ordernum DESC";
					$result = mysqli_query($conn,$query);
					while($image=mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						?>
						<tr>
							<td><?php echo $image['id']; ?></td>
							<td><?php echo $image['title']; ?></td>
							<td><img width="80px" src="../<?php echo $image['image']; ?>"></td>
							<td><?php echo $image['link']; ?></td>
							<td><?php echo $image['ordernum']; ?></td>
							<td><?php echo $image['likes']; ?></td>
							<td><?php echo $image['view']; ?></td>
							<td align="center"><a href="edit-image.php?id=<?php echo $image['id']; ?>"><img width="16px" src="../images/icon_edit.png"></a></td>
							<td align="center"><a href="delete-image.php?id=<?php echo $image['id']; ?>"onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"><img width="16px" src="../images/icon_delete.png"></a></td>
						</tr>
						<?php
					}
				 ?>
				<tr></tr>
			</tbody>
		</table>
	</div>

</div>


<?php include('includes/footer.php'); ?>