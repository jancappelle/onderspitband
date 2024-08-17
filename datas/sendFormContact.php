		<?php
				$nom = strip_tags($_POST['nom']);
				$telephone = strip_tags($_POST['telephone']);
				$mail = strip_tags($_POST['mail']);
				$message = strip_tags($_POST['message']);
				$checkRobot = strip_tags($_POST['checkRobot']);
				$newsletter = strip_tags($_POST['newsletter']);

				// text to send
				$texte = "Hi there,<br /><br />";
				$texte = $texte . "Mail van < yoursitename >.<br />";
				$texte = $texte . "Antwoordvelden :<br />";
				$texte = $texte . "Naam : $nom<br />";
				$texte = $texte . "Telefoon : $telephone<br />";
				$texte = $texte . "E-mail :  $mail<br /><br />";
				$texte = $texte . "Boodschap : $message<br /><br />";
				$texte = $texte . "This is an automatic message, do not reply to it.";

				$texte = stripslashes($texte);

				// Recipient and subject of the message
				$destinataire = "hallo@hetonderspit.be"; // input your email here
				$objet = "Boodschap van op de onderspitsite"; // input your domain name here

				// Headers
	      $headers = array(
	                      'Content-type' => 'text/html',
	                      'From' => 'hallo@hetonderspit.be', // input your email from here
	                      'X-Mailer' => 'PHP/' . phpversion()
	                  );

				// Send the message then return data to current page with ajax
				if ($checkRobot == 7) {
					$conf = ini_set('mail', 'mail.gmail.com'); // update yours informations here
					$sending_ok = mail($destinataire, $objet, $texte, $headers);
					if ($sending_ok) {
							echo "<p class=\"hardLight\">Merci voor je bericht!<br /><br />We proberen snel te antwoorden.</p>";
						}
					else {
							echo "<p class=\"hardLight\">Tiens, het lukt precies niet om te versturen ...</p>";
						}

				} else {
					echo "<p class=\"hardLight\">Je hebt blijkbaar de antirobotvraag niet goed beantwoord...</p>";
				}
