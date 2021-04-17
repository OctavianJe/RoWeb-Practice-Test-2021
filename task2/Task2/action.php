<?php

include('database_connection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
        $query = "
		INSERT INTO items (title, text, category, image) VALUES ('".$_POST["title"]."', '".$_POST["text"]."','".$_POST["category"]."', '".$_POST["image"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM items WHERE id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
            $output['title'] = $row['title'];
            $output['text'] = $row['text'];
            $output['category'] = $row['category'];
            $output['image'] = $row['image'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
        $query = "
		UPDATE items 
		SET title = '".$_POST["title"]."',
		text = '".$_POST["text"]."',
		category = '".$_POST["category"]."', 
		image = '".$_POST["image"]."' 
		WHERE id = '".$_POST["hidden_id"]."'
		";

		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM items WHERE id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>