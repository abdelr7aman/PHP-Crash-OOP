<?php
include "Components/header.php";
$query = "SELECT `name`, `email`, `feedback`, `date` FROM `users` WHERE 1";
$result = $connection->query($query);
$allData = $result->fetch_all(MYSQLI_ASSOC);

?>

<main>
  <div class="container d-flex flex-column align-items-start">
   
    <h2 class="align-self-center">Feedback</h2>
    <?php
        if ($result->num_rows > 0){

            foreach ($allData as $oneData) :


    ?>
        <div class="card my-3" >
         <div class="card-body">
             <?php
                echo $oneData['feedback']."<br> <br>";
             ?>
             <span>
                 <?php
                 echo "BY :" .$oneData['name'] ." | " . $oneData['date'];
                 ?>
             </span>
         </div>
       </div>
      <?php
            endforeach;

            }
      ?>

  </div>
</main>

<?php
include "Components/footer.php";
?>
