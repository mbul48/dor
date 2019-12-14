<?php
error_reporting(0);
output_clean("________        ________ 
___  __ \______ ___  __ \
__  / / /_  __ \__  /_/ /
_  /_/ / / /_/ /_  _, _/ 
/_____/  \____/ /_/ |_|  
                         ");
output_clean(" Dor Telkomsel CLI Version");
output_clean(" v.1.7");
output_clean(" © fznxn - 2019");
output_clean("_______________________________ _ _ _ _ _ _");
output_clean("");

//Check Updates
echo "Checking Update\n";
sleep(1);
$new_ver = trim(file_get_contents('https://raw.githubusercontent.com/mbul48/dor/master/.version'));
$this_ver = trim(file_get_contents('.version'));
if($new_ver > $this_ver){
	echo "\033[01;32;1m[i] Update Available!!\033[0m\n";
	$changelog = file_get_contents("https://raw.githubusercontent.com/mbul48/dor/master/.changelog");
	echo "[i] Changelog : \n".$changelog;
	sleep(3);
	echo "\n\n[i] Do you Want to Update to v".$new_ver."?? Type \033[01;32;1m'yes'\033[0m to Continue : ";
	$updatehandle = fopen("php://stdin", "rb");
	$ln = fgets($updatehandle);
	if (trim($ln) == 'yes'){
		echo "[i] Updating Now...\n[i] Press Enter to Start...";
		fgetc(STDIN);
		system('git reset --hard');
		system('git pull origin master');
		echo "[i] Update Complete!! Please Restart to see Changes!!";
		echo "\n[i] Press Enter to Continue...";
		fgetc(STDIN);
		exit;
	}
} else {
	echo "[i] You're Already on the Latest Version!! Cheers!\n\n";
	}

sleep(1);
output_clean(" List Dor :
 1. OMG | 5GB | Rp10k | 30D
 2. FLASH 4G | 50GB | Rp50k | 7D
 3. Maxstream | 30GB | Rp30k | 30D
 4. GigaMax | 6GB | Rp25k | 30D
 5. Maxstream | 10GB | Rp10k | 30D");

output_clean("_______________________________");

sleep(1);
echo "PILIH PAKET : ";
$paket = trim(fgets(STDIN));
if ($paket > 5){
 echo "Paket tidak ditemukan\n";
 exit();
}

//get otp
sleep(1);
echo "\nNOMOR \t: ";
$nomor = trim(fgets(STDIN));

$res = file_get_contents("http://1000perhari.000webhostapp.com/api.php?nope=$nomor&reqotp");
if (empty($nomor)){
    echo 'Nomor tidak boleh kosong.';
    } else {
    echo "Mengirim OTP...\n";
    sleep(2);
    if (strpos($res,"dikirim")) {
    echo "Berhasil mengirim OTP";
    }else {
    echo "Gagal mengirim OTP\n";
    exit();
    }
    echo "\n";
    }
    
//dor
sleep(1);
echo "\nOTP \t: ";
$otepe = trim(fgets(STDIN));
$result = file_get_contents("http://1000perhari.000webhostapp.com/api.php?nope=$nomor&otp=$otepe&beli&mbul=$paket");
if (strpos($result,"diproses")){
    echo "Terima kasih, permintaan anda sedang diproses. Silahkan tunggu SMS selanjutnya.\n";
    sleep(2);
    echo "\nPLEASE DONATE ME\n";
}else {
    echo $result;
    sleep(2);
    echo "\nPLEASE DONATE ME\n";
}

function output_clean($pesan) {
echo $pesan, PHP_EOL;
}
?>
