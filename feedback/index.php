<?php
include "Components/header.php";
include "Config/User.php";

if (isset($_POST['submit'])){
    $user = new User();
    $user->set_name($_POST['name']);
    $user->set_email($_POST['email']);
    $user->set_feedback($_POST['feedback']);

    // Property After Validate
    $name = $user->get_name();
    $email = $user->get_email();
    $feedback = $user->get_feedback();

    // Returned Error
    $nameMessage = $user->get_name_err();
    $emailMessage = $user->get_email_err();
    $feedbackMessage = $user->get_feedback_err()
    ;

    if (
            empty($nameMessage) &&
            empty($emailMessage) &&
            empty($feedbackMessage)
    )
    {
        $query = "INSERT INTO `users`(`name`, `email`, `feedback`) VALUES ('$name', '$email','$feedback')";
        if (mysqli_query($connection , $query)){
            $SuccessMessage = "Added Successfully";
            mysqli_close($connection);
        }
    }


}
?>

<main>
  <div class="container d-flex flex-column align-items-center">
    <img src="/php-crash/feedback/img/logo.png" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Traversy Media</p>
      <h3 style="color:green;">
          <?php
            echo !empty($SuccessMessage) ? $SuccessMessage : null;
          ?>
      </h3>
    <form action="<?php htmlspecialchars("index.php"); ?>" class="mt-4 w-75" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
          <div style="color: red;">
              <?php
                    echo !empty($nameMessage) ? $nameMessage : null;
              ?>
          </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
          <div style="color: red;" >
              <?php echo !empty($emailMessage) ? $emailMessage : null; ?>
          </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control" id="body" name="feedback" placeholder="Enter your feedback"></textarea>
          <div style="color: red;">
              <?php echo !empty($feedbackMessage) ? $feedbackMessage : null; ?>
          </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
    </div>
</main>
<?php
include "Components/footer.php";
?>
