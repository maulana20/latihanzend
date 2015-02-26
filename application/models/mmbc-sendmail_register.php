<?php 
//set_include_path( dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'ZendFramework-1.11.11/library/' );
require_once 'Zend/Mail.php';
require_once 'Zend/Mime.php';
require_once 'Zend/Mime/Part.php';
require_once 'Zend/Mail/Transport/Smtp.php';

try {
	//setting smtp jika gmail = smtp.gmail.com//
	$configMail = array(
						'auth' => 'login',
						'username' => 'maulana.saputra20@yahoo.com',
						'password' => '11091082',
						'ssl' => 'ssl',
						'port' => 465
						);
	$mailTransport = new Zend_Mail_Transport_Smtp('smtp.mail.yahoo.com', $configMail);
	Zend_Mail::setDefaultTransport($mailTransport);
	
	//attachfile type = gif, jpg, docx, xlsx, dll//
	$attachFile = new Zend_Mime_Part(file_get_contents('example.docx'));
	$attachFile->type = 'docx';
	$attachFile->disposition = Zend_Mime::DISPOSITION_INLINE;
	$attachFile->encoding = Zend_Mime::ENCODING_BASE64;
	$attachFile->filename = 'example.docx';
	
	//register username, password//
	$user = '';
	$pass = '12345';

	//send email//
	$mail = new Zend_Mail();
	$mail->setBodyHtml('<font style="font-size:16px;">Salam Sukses<br />
		Terimakasih kepercayaan Ibu/Bapak mendaftar dan menggunakan System Reservasi “MMBC Airline”</font>. untuk booking dan issued semua tiket pesawat secara real time, Hemat waktu dan Biaya . Bisa transaksi 24 jam
		<br />
		<br />
		<br />
		<br />
		<b>Keuntungan:</b>
		<br />
		1. Bisa melihat jumlah seat yang tersedia<br />
		2. Bisa Booking dan issued 24 jam<br />
		3. Harga dijamin lebih murah, Khusus Lion dan Sriwijaya
		<br />
		<br />
		<br />
		<font style="font-size:20px; font-weight:bold;">Kami berikan Akses Gratis sebagai MITRA (MAM)</font><br /> 
		<br />  
		<font style="font-size:22px; font-weight:bold;"><a href="http://login.klikmbc.co.id/" target="_blank">http://login.klikmbc.co.id/</a></font>
		<br />
		<font style="font-size:20px;">UserName dan Password akan dikirimkan setelah disetujui/approve<br />  
		<br /></font>
		<font style="font-size:16px;">
		<a href="http://klikmbc.biz/booking.pdf" target="_blank">*Panduan Booking</a><br />
		<a href="http://klikmbc.co.id/Panduan-Issued-Ticket.pdf" target="_blank">*Panduan Issued</a><br />
		<a href="http://klikmbc.co.id/index.php?option=com_content&amp;view=article&amp;id=70" target="_blank">*Panduan Top Up Otomatis</a><br /></font>
		<br />
		<br />
		<font style="font-size:24px;">Untuk mendapatkan </font><font style=" font-size:24px; background-color:#FF0; font-weight:bold;">Komisi dan Akses semua airline</font> <font style=" font-size:24px;">silakan tingkatkan akses Anda menjadi </font><font style="font-size:24px; background-color:#3FC;">Agen PT.MMBC Tour&Travel </font><br />
		<br />
		<font style="font-size:20px; font-weight:bold;"> Biaya registrasi sebagai  agen PT.MMBC Tour&Travel Rp 3.750.000</font><br />
		<font style=" font-size:24px; font-weight:bold;">Special Promo: Untuk Anda yang mentransfer hari ini dapat </font><font style=" font-size:24px; background-color:#FF0; font-weight:bold;"> DISCOUNT 50%, Hanya bayar Rp 1.875.000</font><br />
		<br />
		<font style=" font-size:24px; background-color:#FF0; font-weight:bold;">Atau bisa di Cicil dengan bunga 0% sampai 36 bulan</font><br />
		DP: 25% = 937.500<br />
		Cicilan di debet dari saldo Anda setiap bulan<br />
		12 Bulan : Rp 234.375/bln<br />
		24 Bulan : Rp 117.188/bln<br />
		36 Bulan : Rp   78.125/bln<br />
		<br />
		Pembayaran Bisa ditransfer ke:<br />
		<font style="font-size:16px;">
		Bank OCBCNISP<br />
		Pemilik rekening: Medussa Multi / Medussa Multi Business Center Tour&Travel. PT<br />
		Kode Bank: 028<br />
		Cabang: Serang<br />
		No Rekening: 	Silakan akses http://login.klikmbc.co.id menggunakan user id dan password di atas.<br /> 
		Lihat di menu Administrasi-My Profile : 1305 2706 0000 XXXX<br />
		(Setiap Agen/Mitra/Cabang Memiliki Virtual Account OCBC yang berbeda-beda)</font><br />
		<br />
		Untuk melihat Transferan Anda berhasil silakan cek di menu Report-User Cash Flow<br />
		<br />
		Konfirmasi, pembayaran biaya registrasi via email :...........................................atau SMS:................................dengan format sbb: Agen Code/login ID/ Upgrade Agen<br />
		<br />
		Untuk Konsultasi / Training silakan Hubungi saya:<br />
		<br />
		<br />
		Nama	: Idris<br />
		HP:<br />
		YM: mmbc_online	<br />
		Email: <a href="mailto:onlinemmbc@gmail.com" target="_blank">onlinemmbc@gmail.com</a><br />
		<br />
		<br />
		<br />
		<br />
		<img src="https://lh6.googleusercontent.com/tKifTSnY0OAIFzojQGzN0alx61NNskUQv8bgcWNcjMSXe0h33kijgjywAGcpqPCAWLj5W_aJWexJMo8Lj4C6Heh48FI9NEjJ6ralUmduaW7GkAUyX24"/><br />
		<font style="font-size:16px;">Bapak Zulkarnaini<br />
		Direktur PT.MMBC Tour & Travel<br />
		HP:  081218517837 , 0816705750<br />
		YM: <a href="mailto:direksi.mmbc@ymail.com" target="_blank">direksi.mmbc@ymail.com</a><br />
		BBM: 24E8A60C<br />
		FB:<a href="http://www.facebook.com/MMBC.Airline" target="_blank">http://www.facebook.com/MMBC.Airline</a><br />
		E-mail:  <a href="mailto:direksi.mmbc@ymail.com" target="_blank">direksi.mmbc@ymail.com</a> ,  <a href="mailto:direksi.mmbc@gmail.com" target="_blank">direksi.mmbc@gmail.com</a><br />
		Website <a href="http://www.klikmbc.co.id" target="_blank"> http://www.klikmbc.co.id</a><br /></font>
		<br />
		<br />
		<br />')
		->setFrom('maulana.saputra20@yahoo.com', 'From Sender')
		->addTo('maulanasaputra11091082@gmail.com', 'To Receiver')
		//->addCc('example@gmail.com', 'Cc Receiver')
		//->addBcc('example@ymail.com', 'Bcc Receiver')
		->setSubject('Register')
		//->addAttachment($attachFile)
		->send();
} catch (Zend_Exception $e) {
	echo "Caught exception: " . get_class($e) . "\n";
	echo "Message: " . $e->getMessage() . "\n";
}
