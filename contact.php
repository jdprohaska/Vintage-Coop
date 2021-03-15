<?php
require_once(__DIR__ . "/inc/contactForm.class.php");

if(isset($_POST['submitButton'])) {
	$contactForm = new ContactForm();

	$contactForm->SetPropertiesFromArray($_POST);

	$isValid = $contactForm->ValidateDataProperties();

	if ($isValid) {
		$contactForm->SendContactEmail();
	}
}

?>

<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/structure.css">
  <link rel= "stylesheet" type = "text/css" href = "css/style.css">
  <link rel= "stylesheet" type = "text/css" href = "css/contact.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/nav.js"></script>
  <script src="js/footer.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <style> @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap');</style>

  <title>Vintage Cooperative at Prairie Trail - Contact</title>
</head>


  <body>
    <div class="wrapper">
      <div class = "header">
        <img src = "images/logo.png" alt = "Vintage Cooperative of Prairie Trail Logo">
        <div class = "nav">
        </div>
        <div class = "imageBackground">
          <h1>Contact Us</h1> <!--Image in background-->
        </div>
      </div>

    <div class = "formSection">
      <form method="post" action="">
        <div class="row">
					  <h1><?php echo $contactForm->mailMessage ?></h1>
				</div>
				<div class="row">
          <div class="column">
        <label for="firstName">*First Name:</label><br>
				<td class="error"><?php echo "$contactForm->firstNameError"; ?></td><br>
        <input type="text" id="firstName" name="firstName" required><br><br>
        </div>
        <div class="column">
        <label for="lastName">*Last Name:</label><br>
					<td class="error"><?php echo "$contactForm->lastNameError"; ?></td><br>
        <input type="text" id="lastName" name="lastName" required><br><br>
        </div>
        </div>
        <div class="row">
          <div class="column">
        <label for="email">*Email:</label><br>
					<td class="error"><?php echo "$contactForm->emailError"; ?></td><br>
        <input type="email" id="email" name="email" required><br><br>
            </div>
            <div class="column">
        <label for="phone">*Phone:</label><br>
					<td class="error"><?php echo "$contactForm->phoneError"; ?></td><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        </div>
          </div>
          <div class="row">
            <div class="column">
        <label for="address">*Address:</label><br>
					<td class="error"><?php echo "$contactForm->addressError"; ?></td><br>
        <input type="text" id="address" name="address" required><br><br>
        </div>
        <div class="column">

        <label for="cityStateZip">*City, State Zip:</label><br>
					<td class="error"><?php echo "$contactForm->cityStateZipError"; ?></td><br>
        <input type="text" id="cityStateZip" name="cityStateZip" required><br><br>
        </div>
            </div>
            <div class="row">
              <div class="column">
        <label for="floorPlans">Floor Plans:</label><br>
					<td class="error"><?php echo "$contactForm->floorPlansError"; ?></td><br>
        <select name="floorPlans" id="floorPlans">
          <option value="willow">Willow</option>
          <option value="redwood">Redwood</option>
          <option value="butternut">Butternut</option>
          <option value="chestnut">Chestnut</option>
          <option value="pine">Pine</option>
          <option value="hawthorne">Hawthorne</option>
          <option value="locust">Locust</option>
          <option value="hickory">Hickory</option>
          <option value="maple">Maple</option>
        </select><br><br>
        </div>
        <div class="column">
        <label for="moveTime">How soon are you looking to move?</label><br>
					<td class="error"><?php echo "$contactForm->moveTimeError"; ?></td><br>
        <input type="radio" id="3-6months" name="moveTime" value="3-6months">
        <label for="3-6months">3-6 months</label><br>
        <input type="radio" id="6-12months" name="moveTime" value="6-12months">
        <label for="6-12months">6-12 months</label><br>
        <input type="radio" id="12plusmonths" name="moveTime" value="12plusmonths">
        <label for="12plusmonths">12+ months</label><br><br>
        </div>

        <div class="column">
        <label>How did you hear about us?</label><br>
					<td class="error"><?php echo "$contactForm->hearAboutUsError"; ?></td><br>
        <input type="checkbox" id="mail" name="mail" value="Mail">
        <label for="mail">Mail</label><br>
        <input type="checkbox" id="socialMedia" name="socialMedia" value="Social Media">
        <label for="socialMedia">Social Media</label><br>
        <input type="checkbox" id="newspaper" name="newspaper" value="Newspaper">
        <label for="newspaper">Newspaper</label><br>
        <input type="checkbox" id="driveBy" name="driveBy" value="Drive By">
        <label for="driveBy">Drive By</label><br>
        <input type="checkbox" id="other" name="other" value="Other">
        <label for="other">Other</label><br><br>
        </div>
        </div>
        <div class="row">
          <div class="column">
        <h3>Schedule a Tour with us today!</h3><br><br>
        </div>
        </div>
        <div class="row">
          <div class="column">
        <label for="date">Select Date</label><br>
					<td class="error"><?php echo "$contactForm->dateError"; ?></td><br>
        <input type="date" id="date" name="date"><br><br>
        </div>
        <div class="column">
        <label>Preferred Time</label><br>
					<td class="error"><?php echo "$contactForm->preferredTimeError"; ?></td><br>
        <input type="checkbox" id="morning" name="morning" value="Morning">
        <label for="morning">Morning</label><br>
        <input type="checkbox" id="afternoon" name="afternoon" value="Afternoon">
        <label for="afternoon">Afternoon</label><br><br>
        </div>
        </div>
        <div class="row">
          <div class="column">

        <label for="commentOrQuestion">Leave a Comment or Question</label><br>
					<td class="error"><?php echo "$contactForm->messageError"; ?></td><br>
        <textarea name="commentOrQuestion" rows="8" cols="80"></textarea><br><br>
        </div>
      </div>

      <div class = "row">
        <div class = "column">
          <input type="reset" value="Reset">
        </div>


        <div class = "column">
          <input type="submit" id="submitButton" name = "submitButton" value="Submit">
        </div>
      </div>
      </form>
    </div>
<div class="row">
  <div class="column">
    <div class = "map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d190080.14554898307!2d-93.76424018946645!3d41.89280817944781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87ee8526be79e21d%3A0x9d2e4e82a6e05172!2sVintage%20Cooperative%20of%20Prairie%20Trail!5e0!3m2!1sen!2sus!4v1614984024881!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    </div>
    </div>

    <!--footer starts here-->
    <div class = "footer">
    </div>
  <!--footer ends here-->

    </div>


  </body>
</html>
