<?php

	///////////////////////////////////////////////////
	//      HawkEye Interface SQL Authentication     //
	//             by Michael and Matt               //
	///////////////////////////////////////////////////

	$SQLConfig = array(
					//Enter your MySQL database information
					"aGroups" => array(1), //Array of group IDs allowed through the login

					"userToID" => "forgecraft.xf_user", //Table containing E-Mail => UID transfers
					"primField" => "email", //Field within userToID containing user EMAIL
					"UIDfield" => "user_id", //Field within userToID containing user ID
					"UIDtoGID" => "is_moderator", //Field within userToID to check against aGroups when validating user
					"IDtoHash" => "forgecraft.xf_user_authenticate", //Table containing HASH.SALT.HASHTYPE via UID
					"IDUfield" => "user_id", //Field within IDToHash containing user ID
					"hashField" => "data", //Field within IDToHash containing BLOB of Hash.Salt.HashMethod
					"blobHash" => "hash", //Array KEY within hashField BLOB containing user HASH
					"blobSalt" => "salt", //Array KEY within hashField BLOB containing user SALT
					"blobMeth" => "hashFunc" //Array KEY within hashField BLOB containing HashMethod
					);
?>
