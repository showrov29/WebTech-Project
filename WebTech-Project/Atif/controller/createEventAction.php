<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('../view/templete/header.php')  ?> 
<?php 
	function test($data)	
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }	


    if($_SERVER['REQUEST_METHOD']==="POST")
		{
			$Event_date= test($_POST['edate']);
            $Event_time=test($_POST['etime']);
			$Location= test($_POST['location']);
			
			

			if(empty($Event_date) || empty($Event_time) || empty($Location))
			{
				echo "Fill up the form properly";
				echo "<br><br>";
				?>
				<p><b>Event Creation Failed</b></p>
				<?php
			}
			else
			{
                $event=array("EventDate"=>$Event_date,"EvenTime"=>$Event_time, "Location"=>$Location,);

		$handle = fopen("../Data/event.json","r");

		/*if(filesize("../model/user.json")==0)
		{
			//
		}

		else
		*/
			$fr = fread($handle, filesize("../Data/event.json"));
		
		$arr1=json_decode($fr);
		$fc=fclose($handle);
		$handle= fopen("../Data/event.json","w");

		if($arr1 === NULL)
		{
			$event=array($event);
			$event=json_encode($event);
			$fw=fwrite($handle, $event);
            echo"<h3>Event Created Successfylly</h3>";
		}
		else
		{
			$arr1[]= $event;
			$event=json_encode($arr1);
			$fw=fwrite($handle, $event);
            echo"<h3>Event Created Successfylly</h3>";
		}
		$fc=fclose($handle);

                
				echo "Event Date: " . $Event_date;
				echo "<br><br>";
                echo " Event Time : " . $Event_time;
				echo "<br><br>";

				echo "Event Location: " . $Location;
				echo "<br><br>";
				
			}

			// if($_POST['password'] != NULL)
			// {
			// echo"Registration Successful";
			// }
			// else
			// {
			// 	echo "Password can't be empty.";
			// }
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}

		
	?>
	<a href="../view/createEvent.php">Go Back</a>
    <?php include('../view/templete/footer.php') ?> 
</body>
</html>




