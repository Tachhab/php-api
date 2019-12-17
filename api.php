<?php 

header("content-type:application/json");
$request = $_SERVER['REQUEST_METHOD'];
switch($request){
    case "GET" :
       getData();
        break;
    case "POST":
        echo "post";
         break;
    case "PUT":
        echo "PUT";
         break;
    case "DELETE":
        echo "DELETE";
         break;
    default:
        echo "No request found";
         break;
}

function getData(){
    include('db.php');
    $query = "SELECT * FROM 'users'";
    $result = mysqli_query($con,$query);
    $rows =mysqli_num_rows($result);
    if($rows>0){
        $rows= array();
        while($r=mysqli_fetch_assoc($result)){
            $rows["result"][]=$r;
            echo $r;
        }
        echo json_encode($rows);
    }else{
        echo '{"result":"No data found here."}';
    }
}

?>