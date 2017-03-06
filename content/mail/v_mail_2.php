<?php
$to = "muhsyafi@icloud.com";
$subject = "Subject Test";
			$message = '<img src="http://css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>Test</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>Test</td></tr>";
			$message .= "<tr><td><strong>Type of Change:</strong> </td><td>Test</td></tr>";
			$message .= "<tr><td><strong>Urgency:</strong> </td><td>Test</td></tr>";
			$message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>Test</td></tr>";
			$message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>Isinya ada di sini</td></tr>";
			$message .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['newText']) . "</td></tr>";
			$message .= "</table>";
			$headers  = "From:cust@i2icustom.com";
$suk=mail($to, $subject, $message, "Content-type: text/html; charset=iso-8859-1");
if ($suk) {
	echo('Sukses');
}else{
	echo('Gagal');
}
?>