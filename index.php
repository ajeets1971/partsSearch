<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<title></title>
	<script type="text/javascript">
		$(document).ready(function(){
			var typingTimer;
			var doneTypingInterval=1000;
			$("#search_text").keyup(function(){
				var text=$("#search_text").val();
				if(text.length>=3)
				{
					doneTyping();
				}
				if(text=="")
				{
					$("#hint").empty();  
				}
			});
			function doneTyping()
			{
				var rec="";
				if($("#search_text").val()!="")
				{
					$.ajax({
			        	type: "POST",
			        	url: "fetch_Search_Product.php",             
			           	data: 'text='+ $("#search_text").val(),
			        	success: function(response){
			        		var data = jQuery.parseJSON(response);
			        		var len=data.length;
			        		rec = "<table border=1><tr><td>Product Name</td><td>Image</td><td>Color</td><td>Size</td><td>Weight</td><td>Manufacturer</td><td>Price</td></tr>";
			        		for(var i=0;i<len;i++)
			        		{
			        			rec += "<tr><td>" + data[i].Product_Name + "</td><td><img src=" + data[i].Image + " height=50 width=50></td><td>"+data[i].Color+"</td><td>"+data[i].Size+"</td><td>"+data[i].Weight+"</td><td>"+data[i].Manufacturer+"</td><td>"+data[i].Price+"</td></tr>";
			        		}
			        		rec +="</table>";
			        		  $("#hint").html(rec);           
			        	}
					});
				}
			}						
		});
	</script>
</head>
<body>
<div>
Product Name : <input type="text" name="search_text" id="search_text">
</div>
<br>
<br>
<div id="hint">

</div>
</body>
</html>