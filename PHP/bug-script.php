<?php
if (isset($_POST['submit'])) {
	$new_message = array(
		"nama" => $_POST['nama'],
		"email" => $_POST['email'],
		"NoTelephone" => $_POST['NoTelephone'],
		"komentar" => $_POST['komentar'],
		"submit" => $_POST['submit']
	);

	if (filesize("./json/ContactUs.json") == 0) {
		$first_record = array($new_message);
		$data_to_save = $first_record;
	} else {
		$old_records = json_decode(file_get_contents("./json/ContactUs.json"));
		array_push($old_records, $new_message);
		$data_to_save = $old_records;
	}

	if (!file_put_contents("./json/ContactUs.json", json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX)) {
		$error = "Error storing message, please try again";
	} else {
		$success =  "Message is stored successfully";
	}
}
