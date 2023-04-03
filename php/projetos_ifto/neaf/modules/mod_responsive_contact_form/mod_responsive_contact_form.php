<?php
/**
 * @package Module Responsive Contact Form for Joomla! 3.x
 * @version 3.0: mod_responsive_contact_form.php Novembar,2013
 * @author Joomla Drive Team
 * @copyright (C) 2013- Joomla Drive
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined('_JEXEC') or die;

$document = JFactory::getDocument();

$document->addScriptDeclaration('jQuery.noConflict();');

// Javascript
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
$document->addScript(JURI::base(true) . '/modules/mod_responsive_contact_form/js/jqBootstrapValidation.min.js');

$document->addScriptDeclaration('jQuery(function () { jQuery("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );');
	
// Stylesheet
$document->addStylesheet(JURI::base(true).'/modules/mod_responsive_contact_form/css/style.css');

require_once('modules/mod_responsive_contact_form/formkey_class.php');
require_once('modules/mod_responsive_contact_form/recaptchalib.php');

$formKey = new formKey();

if($_SERVER['REQUEST_METHOD'] == 'post')
{
	// Validate the form key
	if(!isset($_POST['form_key']) || !$formKey->validate())
	{
		// Form key is invalid, show an error
		$error = "Something went wrong. Please try again."; // kill program and return error message
	}
}

if(isset($_POST['sbutton']))
{
	$captcha_req = $params->get('captcha_req');
	if( $captcha_req == 1 )
	{
		$private_key = $params->get('private_key');
		
		$resp = recaptcha_check_answer ($private_key,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly
			echo "<script>javascript:Recaptcha.reload();</script>"; // reload captcha
			$error = "Sorry, the verification code wasn't entered correctly. Try again."; // kill program and return error message
		}
		else{
		
			// Requesting form elements
			if(isset($_POST['email']))
				$email 			= $_POST['email'];
			
			$name 			= $_POST['name'];
			
			if(isset($_POST['phone']))
				$phone 			= $_POST['phone'];
			if(isset($_POST['type']))
				$type 			= $_POST['type'];
			if(isset($_POST['message']))
				$message 		= $_POST['message'];
			
			// Requesting Configuration elements
			$admin_email 	= $params->get('admin_email');
			$cc_email 		= $params->get('cc_email');
			$bcc_email 		= $params->get('bcc_email');
			$success_notify	= $params->get('success_notify');
			$failure_notify	= $params->get('failure_notify');
			$ffield_name	= $params->get('ffield_name');
			$sfield_name	= $params->get('sfield_name');
			$tfield_name	= $params->get('tfield_name');
			$fofield_name	= $params->get('fofield_name');
			$fifield_name	= $params->get('fifield_name');
			
			// Building Mail Content
			$formcontent = "\n".$ffield_name.": $name";
			if(isset($email)){
				$formcontent .= "\n\n".$sfield_name.": $email";
			}
			if(isset($phone)){
				$formcontent .= "\n\n".$tfield_name.": $phone";
			}
			if(isset($type)){
				$formcontent .= "\n\n".$fofield_name.": $type";
			}
			if(isset($message)){
				$formcontent .= "\n\n".$fifield_name.": $message";
			}
			
			// Enter a subject, only you will see this so make it useful
			$subject = $name." Contacted through ".$_SERVER['HTTP_HOST'];
			if(isset($type)){
				$subject .= " for $type";
			}
			if(isset($_POST['email']))
				$sender = array($email, $name);	
			else
				$sender = $name;
			
			// Mail Configuration
			$mail = JFactory::getMailer();
			$mail->setSender($sender);
			$mail->addRecipient($admin_email);
			if(isset($cc_email))
				$mail->addCC($cc_email);
			if(isset($bcc_email))
				$mail->addBCC($bcc_email);
			$mail->setSubject($subject);
			$mail->Encoding = 'base64';	
			$mail->setBody($formcontent);
			$status = $mail->Send();
		}
	}
	else
	{
		// Requesting form elements
		if(isset($_POST['email']))
			$email 			= $_POST['email'];
		
		$name 			= $_POST['name'];
		
		if(isset($_POST['phone']))
			$phone 			= $_POST['phone'];
		if(isset($_POST['type']))
			$type 			= $_POST['type'];
		if(isset($_POST['message']))
			$message 		= $_POST['message'];
		
		// Requesting Configuration elements
		$admin_email 	= $params->get('admin_email');
		$cc_email 		= $params->get('cc_email');
		$bcc_email 		= $params->get('bcc_email');
		$success_notify	= $params->get('success_notify');
		$failure_notify	= $params->get('failure_notify');
		$ffield_name	= $params->get('ffield_name');
		$sfield_name	= $params->get('sfield_name');
		$tfield_name	= $params->get('tfield_name');
		$fofield_name	= $params->get('fofield_name');
		$fifield_name	= $params->get('fifield_name');
		
		// Building Mail Content
		$formcontent = "\n".$ffield_name.": $name";
		if(isset($email)){
			$formcontent .= "\n\n".$sfield_name.": $email";
		}
		if(isset($phone)){
			$formcontent .= "\n\n".$tfield_name.": $phone";
		}
		if(isset($type)){
			$formcontent .= "\n\n".$fofield_name.": $type";
		}
		if(isset($message)){
			$formcontent .= "\n\n".$fifield_name.": $message";
		}
		
		// Enter a subject, only you will see this so make it useful
		$subject = $name." Contacted through ".$_SERVER['HTTP_HOST'];
		if(isset($type)){
			$subject .= " for $type";
		}
		if(isset($_POST['email']))
			$sender = array($email, $name);	
		else
			$sender = $name;
		
		// Mail Configuration
		$mail = JFactory::getMailer();
		$mail->setSender($sender);
		$mail->addRecipient($admin_email);
		if(isset($cc_email))
			$mail->addCC($cc_email);
		if(isset($bcc_email))
			$mail->addBCC($bcc_email);
		$mail->setSubject($subject);
		$mail->Encoding = 'base64';	
		$mail->setBody($formcontent);
		$status = $mail->Send();	
	}
}
?>
<section id="contact">
	<script type="text/javascript">
		 var RecaptchaOptions = {
			theme : "<?php echo $params->get('captcha_theme');?>"
		 };
	 </script>
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST" class="form-horizontal" id="contact-form" novalidate>
	  <?php $formKey->outputKey(); ?>
	  <fieldset>
		<!-- Alert Box-->
		<?php if( isset ($status)) {?>
		<div class="alert <?php if ( $status !== true ) { ?> alert-error <?php } else{ ?> alert-success <?php } ?>">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong><?php if ( $status !== true ) { echo $failure_notify; } else { echo $success_notify; }?></strong> <br/> <?php if ( $status !== true ) { echo $status; }?>
		</div>
		<?php } ?>
		
		<?php if( isset ($error)) {?>
		<div class="alert alert-error">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong> <?=$error; ?></strong>
		</div>
		<?php } ?>
		
		<!-- Name Field -->
		  <div class="control-group">
			<label class="control-label" for="inputName"><?php echo $params->get('ffield_name'); ?></label>
			<div class="controls">
			  <input class="input-80" name="name" type="text" id="inputName" placeholder="<?php echo $params->get('ffield_name'); ?>" required>
			  <p class="help-block"></p>
			</div>
		  </div>
		 
		 <!-- E-mail Field -->
		  <?php if($params->get('email_publish')) {?>			  
		  <div class="control-group">
			<label class="control-label" for="inputEmail"><?php echo $params->get('sfield_name'); ?></label>
			<div class="controls">
			  <input class="input-80" name="email" type="email" id="inputEmail" placeholder="<?php echo $params->get('sfield_name'); ?>" <?php echo $params->get('email_req'); ?>>
			  <p class="help-block"></p>
			</div>
		  </div>
		  <?php }
				if($params->get('phone_publish'))
				{
		  ?>
		  
		  <!-- Phone Field -->
		  <div class="control-group">
			<label class="control-label" for="inputPhone"><?php echo $params->get('tfield_name'); ?></label>
			<div class="controls">
			  <input class="input-80" name="phone" type="text" id="inputPhone" placeholder="<?php echo $params->get('tfield_name'); ?>" <?php echo $params->get('phone_req'); ?>>
			  <p class="help-block"></p>
			</div>
		  </div>
		  <?php
				}
				if($params->get('subject_publish'))
				{
		  ?>
		 
		 <!-- Subject Field -->
		  <div class="control-group">
			<label class="control-label" for="selectSubject"><?php echo $params->get('fofield_name'); ?></label>
			<div class="controls">
				<?php if( $params->get('subject_type') == 1){ ?>
				<select class="input-80" id="selectSubject" name="type">
				  <option value="question">Question</option>
				  <option value="support">Comments</option>
				  <option value="misc">Other</option>
				</select>
				<?php
					}
					else
					{
				?>
						<input class="input-80" name="type" type="text" id="selectSubject" placeholder="<?php echo $params->get('fofield_name'); ?>" required>
						<p class="help-block"></p>
				<?php
					}
				?>
			</div>
		  </div>
		  <?php
				}
				if($params->get('message_publish'))
				{
		  ?>
		 
		 <!-- Message Field -->
		  <div class="control-group">
			<label class="control-label" for="inputMessage"><?php echo $params->get('fifield_name'); ?></label>
			<div class="controls">
			  <textarea class="input-80" name="message" rows="12" id="inputMessage" placeholder="Please include as much detail as possible." minlength="<?php echo $params->get('msg_minlength'); ?>" required></textarea>
			  <p class="help-block"></p>
			</div>
		  </div>
		  <?php
				}
				if( $params->get('captcha_req')==1 )
				{
		  ?>
		 
		 <!-- Captcha Field -->
		  <div class="control-group">
			<label class="control-label" for="recaptcha">Are you human?</label>
			<div class="controls" id="recaptcha">
				<p>
					<?php
					  $publickey = $params->get('public_key'); // Add your own public key here
					  echo recaptcha_get_html($publickey);
					?>
				</p>
			</div>
		  </div> 
		  <?php
				}				
				if($params->get('admin_email'))
				{
		  ?>
		 
		 <!-- Submit Button -->
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" name="sbutton" value="Send" class="btn <?php echo $params->get('button_color');?>"><?php echo $params->get('bs_name');?></button>
			</div>
		  </div>
		  <?php
				}
				else
				{
		  ?>
					<p style="font-type:bold">Please Enter Admin E-Mail address in the backend.</p>
		  <?php
				}
		  ?>
		</fieldset>
	</form>
</section>