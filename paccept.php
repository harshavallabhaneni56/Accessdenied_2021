<?php
    include('functions.php');
    session_start(); 
   
    
    $id = "0";

    $query = "select * from `enter` where `enter`.`id` = '$id'; ";

    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
           
            $email = $row['email'];
            $projectname = $row['projectname'];
            $abstract = $row['abstract'];
            $share = $row['share'];
            $amount = $row['amount'];
            $goals = $row['goals'];

            $query = "INSERT INTO `enterhr` ( `email`, `projectname`, `abstract`, `share`, `amount`, `goals`,`id`) VALUES (  '$email', '$projectname', '$abstract', '$share', '$amount', '$goals','0' )";

            
        }
       
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="projecthead.php">Back to DashBoard</a>
