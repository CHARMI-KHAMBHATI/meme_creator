<?php
    include("includes/connection.php");
    
	
	$output=$_GET['image'];
    
	session_start();
$uid=$_SESSION['uid'];
	
		
		
		
		
		if (isset($_POST["preview"])){
			
			echo "here";
			
			$top=$_POST["top"];
			$mid=$_POST["mid"];
			$bottom=$_POST["bottom"];
		if(!empty($top)){
			$output=edit(0.1, $top, $output);
		}
			if(!empty($mid)){
			$output=edit(0.45, $mid, $output);}
			if(!empty($bottom)){
			$output=edit(0.8, $bottom, $output);}
			
			header( "Location:addtext.php?image=$output" );
		}
		
		else if (isset($_POST["save"])){
			
			$source=$output;
			$name=uniqid().".jpeg";
			$output="memes/".$name;
			$image= imagecreatefromjpeg($source);
			imagejpeg($image,$output);
			
			$sql="INSERT INTO created_meme(id,image_location) VALUES('$uid','$output')";
			$result=mysqli_query($conn, $sql);
			if($result)
			{

				header("location:users.php");
			
			}
			else echo "error with data".mysqli_error($conn);
			
			
		}
		else if (isset($_POST["share"])){
			
			
						$fb = new Facebook([
			  'app_id' => '{app-id}',
			  'app_secret' => '{app-secret}',
			  'default_graph_version' => 'v2.2',
			  ]);

			$data = [
			  'message' => 'My awesome photo upload example.',
			  'source' => $fb->fileToUpload($output),
			];

			try {
			  // Returns a `Facebook\FacebookResponse` object
			  $response = $fb->post('/me/photos', $data, '{access-token}');
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}

			$graphNode = $response->getGraphNode();

			echo 'Photo ID: ' . $graphNode['id'];
			
			header( "Location:addtext.php?image=$output" );
		}
		
		
		?>
		<img src="<?php echo $output;?>">
		<?php
		
	
		function edit($y, $text, $output){
			
		$source=$output;
		$font = 'font/impact.ttf';
		$font_size= 25;
		$fontsize= 40;
		$rotation=0;
		$output="temp/eg.jpeg";
		
		$margin = 10;
		$delta_y = 0;

		//$text="hola ayush ihey yolo hoa yushi holaayushi  hola ayushi  ";


		$image= imagecreatefromjpeg($source);
		$white= imagecolorallocate($image,255,255,255);


		$word = explode("\n", wordwrap ( $text, 6));

		//$dimensions = imagettfbbox($font_size*3, 0, $font, $text);
		list($img_width, $img_height,,) = getimagesize($source);

		foreach($word as $line) {
			 $dimensions = imagettfbbox($font_size, 0, $font, $line);
			$delta_y =  $delta_y + $font_size+ $margin;

			
			//center align//
			// find font-size for $txt_width = 80% of $img_width...
		/*$font_size = 1; 
		$txt_max_width =intval(0.5 * $img_width);    

		do {        
			$font_size++;
			$p = imagettfbbox($font_size, 0, $font, $line);
			$txt_width = $p[2] - $p[0];
			//$txt_height=$p[1]-$p[7]; // just in case you need it
			
			

		} while ($txt_width <= $txt_max_width);


		// now center the text
		$y = $img_height * $y; // baseline of text at 60% of $img_height
		$x = ($img_width - $txt_width)/2;


		imagettftext($image, $font_size, 0, $x, $y-$delta_y, $white, $font, $line);
			
			*/
$y = $img_height * $y;
$x = ($img_width - $font_size)/2-20;
			imagettftext($image, $font_size, 0, $x, $y + $delta_y, $white, $font, $line); // left align
			//$x = ($img_width - $txt_width)-5;
			//imagettftext($image, $font_size, 0, $x, $y + $delta_y, $white, $font, $line);// right align
		}

		imagejpeg($image,$output);
			
		return $output;
		}



		


       
    ?>

<?php
