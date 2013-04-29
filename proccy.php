<?php
        session_start();
        include("config.php");
        include("interface/config.php");
        if(!$dbh = mysql_connect($hawkConfig["dbHost"], $hawkConfig["dbUser"], $hawkConfig["dbPass"])) {
                die("ERROR: " . mysql_error());
        }
        $emailpass = $_POST["user"];
        $udi = mysql_query("SELECT {$SQLConfig['UIDfield']} FROM {$SQLConfig['userToID']} WHERE
                {$SQLConfig['primField']} = '{$emailpass}';", $dbh) or die(mysql_error());
        $dui = (mysql_fetch_assoc($udi));
        $uid = $dui[$SQLConfig['UIDfield']];
        $res = mysql_query("SELECT {$SQLConfig['hashField']} FROM {$SQLConfig['IDtoHash']} WHERE {$SQLConfig['IDUfield']} = {$uid};", $dbh);
        $row = mysql_fetch_assoc($res);
        $data = $row[$SQLConfig['hashField']];
        $main = unserialize($data);

        if(HashPassword($_POST["pass"], $main[$SQLConfig['blobSalt']], $main[$SQLConfig['blobMeth']]) == $main[$SQLConfig['blobHash']]){
                $userGDI = mysql_query("SELECT {$SQLConfig['UIDtoGID']} FROM {$SQLConfig['userToID']} WHERE {$SQLConfig['UIDfield']} = {$uid};");
                $userGID = mysql_fetch_assoc($userGDI);
                var_dump($userGID);
                if(in_array($userGID[$SQLConfig['UIDtoGID']], $SQLConfig['aGroups'])){
                        $_SESSION["loggedIn"] = true;
                        header("Location: interface/index.php");
                }else{
                        header("Location: index.php?return=true");
                }
        }else{
                header("Location: index.php?return=true");
        }
       
        function HashPassword($password, $salt, $hashType){
       
        $encryptedPassword = Encrypt($hashType, Encrypt($hashType, $password) . $salt);
        return $encryptedPassword;
        
        }
 
        function Encrypt($hashType, $data){
       
        switch ($hashType)
                {
                        case 'sha256':
                                return hash('sha256', $data);
                        case 'sha1':
                                return sha1($data);
                        default:
                                throw new Exception("Unknown Hash Type");
                }
       
        }
?>