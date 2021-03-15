<?php
	class ContactForm {
		//Initialize variables
		var $firstName = "";
		var $lastName = "";
		var $email = "";
    var $phone = "";
    var $address = "";
    var $cityStateZip = "";
    var $floorPlans = "";
    var $moveTime = "";
    var $hearAboutUs = "";
    var $date = "";
    var $preferredTime = "";
		var $message = "";

		var $firstNameError = "";
		var $lastNameError = "";
		var $emailError = "";
    var $phoneError = "";
    var $addressError = "";
    var $cityStateZipError = "";
    var $floorPlansError = "";
    var $moveTimeError = "";
    var $hearAboutUsError = "";
    var $dateError = "";
    var $preferredTimeError = "";
		var $messageError = "";

		function SetPropertiesFromArray($dataToSet) {

			//Get form data
			$this->firstName = $dataToSet['firstName'];
			$this->lastName = $dataToSet['lastName'];
			$this->email = $dataToSet['email'];
      $this->phone = $dataToSet['phone'];
      $this->address = $dataToSet['address'];
      $this->cityStateZip = $dataToSet['cityStateZip'];
      $this->floorPlans = $dataToSet['floorPlans'];
      $this->moveTime = $dataToSet['moveTime'];
      $this->hearAboutUs = $dataToSet['hearAboutUs'];
      $this->date = $dataToSet['date'];
      $this->preferredTime = $dataToSet['preferredTime'];
			$this->message = $dataToSet['message'];

			//Santize form data

			$this->firstName = filter_var($this->firstName, FILTER_SANITIZE_STRING);
			$this->lastName = filter_var($this->lastName, FILTER_SANITIZE_STRING);
			$this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
      $this->phone = filter_var($this->phone, FILTER_SANITIZE_NUMBER_INT);
      $this->address = filter_var($this->address, FILTER_SANITIZE_STRING);
      $this->cityStateZip = filter_var($this->cityStateZip, FILTER_SANITIZE_STRING);
      $this->floorPlans = filter_var($this->floorPlans, FILTER_SANITIZE_STRING);
      $this->moveTime = filter_var($this->moveTime, FILTER_SANITIZE_STRING);
      $this->hearAboutUs = filter_var($this->hearAboutUs, FILTER_SANITIZE_STRING);
      $this->date = filter_var($this->date, FILTER_SANITIZE_STRING);
      $this->preferredTime = filter_var($this->preferredTime, FILTER_SANITIZE_STRING);
      $this->message = filter_var($this->message, FILTER_SANITIZE_STRING);
		}

		function ValidateDataProperties() {
			//Validate form data

			$isValid = true;

			if($this->firstName == "") {
				$this->firstNameError = "Please enter a valid First Name";
				$isValid = false;
			}

			if($this->lastName == "") {
				$this->lastNameError = "Please enter a valid Last Name";
				$isValid = false;
			}

			if($this->email == "" || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$this->emailError = "Please enter a valid Email";
				$isValid = false;
			}

      if($this->phone == "") {
        $this->phoneError = "Please enter a valid Phone Number";
        $isValid = false;
      }

      if($this->address == "") {
        $this->addressError = "Please enter a valid Address";
        $isValid = false;
      }

      if($this->cityStateZip == "") {
        $this->cityStateZipError = "Please enter a valid City, State Zip";
        $isValid = false;
      }

      if($this->date == "") {
				$date = "";
			}

      if($this->preferredTime == "") {
				$preferredTime = "";
			}

			if($this->message == "") {
				$message = "";
			}

			return $isValid;
		}

		function SendContactEmail() {

			$isValid = $this->ValidateDataProperties();

			//Mailer function
			$toEmail = "contact@vintagecooperative.ericamanning.com";
			$subject = "Vintage Cooperative of Prairie Trail Contact Form";
			$headers = "From: contact@vintagecooperative.ericamanning.com";
			$emailMessage = "Someone filled out the contact form! Name: $this->firstName $this->lastName\nEmail: $this->email\nPhone: $this->phone\nAddress: $this->address \nCity State Zip: $this->cityStateZip\n Floor Plans: $this->floorPlans\n How soon are you looking to move: $this->moveTime\n How did you hear about us: $this->hearAboutUs\nDate for Tour: $this->date\nPreferred Time: $this->preferredTime\nMessage: $this->message";
			$emailMessage = wordwrap($emailMessage,70);

			if($isValid) {
				if(!mail($toEmail, $subject, $emailMessage, $headers)) {
					$this->mailMessage = "There was an issue. Please try again.";
				} else {
					$this->mailMessage = "Message sent successfully!";
				}
			}

			//return $mailMessage;
		}

	}
?>
