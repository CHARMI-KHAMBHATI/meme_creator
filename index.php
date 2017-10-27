<?php 
        global $row_count;
        include("includes/connection.php");
        $query = "SELECT p.id,p.title,p.body,p.create_date,u.username,c.category,u.id as user_id
                 FROM `posts` AS p, `users` AS u,`categories` AS c 
                 WHERE p.user_id = u.id AND p.cate_id = c.id
                 ORDER BY `create_date` DESC";
        if($result = mysqli_query($conn,$query))
        {
        $row_count = mysqli_num_rows($result);
        }
?>
<?php
    function getLike($post_id)
    {
        include("includes/connection.php");
        $like_query = "SELECT * FROM `notifications` WHERE `post_id`='$post_id' AND `notifier_id`= '".$_SESSION['uid']."' AND `notification_type`='L' ";
        $like_result = mysqli_query($conn,$like_query);
        $like_row_count = mysqli_num_rows($like_result);
        if($like_row_count>0)
            return 1;
        else
            return 0;
    }
 ?>
<?php include('includes/header.php'); ?>
    <!-- Page Content -->
    <img src="header-banner.jpg" style="width: 100%">
    <style type="text/css">
        .username
        {
            text-decoration: none;
            text-align: center;
            font-size: 20px;
        }
         .image
         {
            width: 500px;
            height: 500px;
            display:inline-block;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            
         }
         .tabcontent
         {
            
            width: 400px;
            height: 100%;
            display:inline-block;
            white-space:nowrap;
          
         }
    </style>
    <div>
                <?php if($row_count) : ?>
                <?php while($row = mysqli_fetch_array($result)) : ?>
                <div class="card-header"><h1 class="mt-4"><a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h1></div>
                <div class="card-block" style="padding-bottom: 0px;">
                <!-- Author -->
                <p class="lead card-title">
                    by <a href="users.php?id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a>
                </p>
                <hr>
                <!-- Date/Time -->
                <p>Posted on <?php echo date("F j,Y,g:i a",strtotime($row['create_date']));?></p>
                <hr>
                <!-- Preview Image 
                <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">-->
                <!-- Post Content -->
                <p class="lead"><?php echo $row['body']; ?></p>
                <p>
                <?php if(isset($_SESSION['uid'])) : ?>
                <div class="row">
                    <div class="col">
                      <span><i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                        <a tabindex="0" data-toggle="popover" data-trigger="hover" data-content="" href="<?php echo $row['user_id'].','.$row['id']; ?>" class="like"><?php if(getLike($row['id'])) : ?>Unlike <?php else : ?>Like <?php endif; ?></a></span>
                    </div>
                    <div class="col">
                      <span><i class="fa fa-comment-o fa-2x" aria-hidden="true"></i><a href="post.php?id=<?php echo $row['id']; ?>"> Comment </a></span>
                    </div>
                    <?php if($_SESSION['uid'] == $row['user_id']) : ?>
                    <div class="col">
                      <span><i class="fa fa-comment-o fa-2x" aria-hidden="true"></i><a href="editpost.php?id=<?php echo $post_id;?>"> Edit </a></span>
                    </div>
                    <div class="col">
                        <span><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></i><a href="#" class="delete_post" >Delete </a></span>
                    </div>
                    <?php else: ?>
                        <div class="col"></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?> 
                </p>
                </div>
                <?php endwhile; ?>
                    <div class="card-footer text-muted"></div>
                </div>
                <?php endif; ?>
                </div>
                </div>

<center>				
<div id="Caption" class="tabcontent" >
	<?php
	$sql= "select * from created_meme natural join users";
	$result=mysqli_query($conn, $sql);
	
	while($row=mysqli_fetch_array($result))
	{ ?>
        
		<center><div class="username"> <br> <h2>Uploaded By: <?php echo $row['username'];
        
		?>
		</h2>
    </div>
</center>
    <img src="<?php echo $row['image_location']?>" class="image" >
	<?php
	}
?>
</div>
  </center>     
<?php include('includes/footer.php');?>