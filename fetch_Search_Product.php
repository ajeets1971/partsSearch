<?php
	$con=mysqli_connect("localhost","root","","test_13");
	if($_REQUEST['text']!="")
	{
		$text=$_REQUEST['text'];
		$len=strlen($text);
		$sql="select * from product";
		$r=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($r))
		{
			if(stristr($text, substr($row['Product_Name'], 0,$len)))
			{
				$auto_com[]=$row;
			}
		}
		echo json_encode($auto_com);
	}
	
