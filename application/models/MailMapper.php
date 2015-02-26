<?php

require_once 'Zend/Mail.php';
require_once 'Zend/Mime.php';
require_once 'Zend/Mime/Part.php';
require_once 'Zend/Mail/Transport/Smtp.php';

Class Application_Model_MailMapper 
{
	public function sendMailMessage($email)
	{
		try {
			$configMail = array(
								'auth' => 'login',
								'username' => 'maulana.saputra20@yahoo.com',
								'password' => '11091082',
								'ssl' => 'ssl',
								'port' => 465
								);
			$mailTransport = new Zend_Mail_Transport_Smtp('smtp.mail.yahoo.com', $configMail);
			Zend_Mail::setDefaultTransport($mailTransport);
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
				3. Harga dijamin lebih murah* <br />
				&nbsp;&nbsp;&nbsp;Lion Air lebih murah Rp 10.000 dari Website<br />
				&nbsp;&nbsp;&nbsp;Sriwijaya Air lebih murah Rp 11.000 dari Website 
				<br />
				<br />
				<br />
				<a href="http://klikmbc.biz/booking.pdf" target="_blank">*Panduan Booking</a><br />
				<a href="http://klikmbc.co.id/Panduan-Issued-Ticket.pdf" target="_blank">*Panduan Issued</a><br />
				<a href="http://klikmbc.co.id/index.php?option=com_content&amp;view=article&amp;id=70" target="_blank">*Panduan Top Up Otomatis</a><br />
				<br />
				<font style="font-size:20px; font-weight:bold;">Kami berikan Akses Gratis sebagai MITRA (MAM) : Tidak Ada Komisi, Sesuai Harga Tiket</font><br /> 
				<br />  
				<br />
				<b>Booking dan Issued silakan Gunakan salah satu User Name dibawah ini (Untuk Sementara)</b><br />
				User Name: C1 , C2 , C3 sampai C20 (Gunakan salah satu)<br />
				Password: 123<br />				
				<br />
				<a href="http://login.klikmbc.co.id/" target="_blank">http://login.klikmbc.co.id/</a><br />			
				<br />
				User Name Khusus Untuk Anda, akan Kami kirimkan Jika sudah ada Transaksi   atau Anda LANGSUNG Mendaftar sebagai <font style="background-color:#3FC;">Agen PT.MMBC Tour&Travel </font><br />
				<br />
				<font style="font-weight:bold;"> Biaya registrasi sebagai  agen PT.MMBC Tour&Travel Rp 3.750.000</font><br />
				<font style="font-weight:bold;">Special Promo: Untuk Anda yang mentransfer hari ini dapat </font><font style=" background-color:#FF0; font-weight:bold;"> DISCOUNT 50%, Hanya bayar Rp 1.875.000</font><br />
				<br />
				<font style="background-color:#FF0; font-weight:bold;">Atau bisa di Cicil dengan bunga 0% sampai 36 bulan</font><br />
				DP: 25% = 937.500<br />
				Cicilan di debet dari saldo Anda setiap bulan<br />
				12 Bulan : Rp 234.375/bln<br />
				24 Bulan : Rp 117.188/bln<br />
				36 Bulan : Rp   78.125/bln<br />
				<br />
				Pembayaran Bisa ditransfer ke:<br />
				<font style="">
				Bank OCBCNISP<br />
				Pemilik rekening: Medussa Multi / Medussa Multi Business Center Tour&Travel. PT<br />
				Kode Bank: 028<br />
				Cabang: Serang<br />
				No Rekening: 133.811.234.888<br /> 
				<br />
				<b>Cara Mendaftar Langsung Agen PT.MMBC Tour&Travel</b><br />
				=> Emailkan data-data lengkap Anda dan Bukti transfer ke:<a href="mailto:marketing@klikmbc.co.id" target="_blank"> marketing@klikmbc.co.id</a><br />
				<br />
				<b>Fasilitas AGEN PT.MMBC TOUR&TRAVEL</b><br />
				1. Diberikan Akses menggunakan System Reservasi MMBC Airline dan Mendapat Komisi<br />
				2. Berhak memasarkan semua Produk dan Layanan MMBC<br />
				&nbsp;- Tiket pesawat Domestik dan International<br />
				&nbsp;- Voucher Hotel<br />
				&nbsp;- Paket Tour<br />
				&nbsp;- UMROH dan Haji<br />
				&nbsp;- Pembayan Listrik dan Telp (PPOB)<br />
				&nbsp;- Penjualan Pulsa Elektrik<br />
				3. Layanan Training/Pelatihan Sampai Bisa<br />
				4. Layanan Transaksi dan Konsultasi 24 jam<br />
				5. Mengembangkan MGM (Member Get Member)<br />
				<font style="">Salam Sukses<br />
				<br />
				<img src="https://lh6.googleusercontent.com/tKifTSnY0OAIFzojQGzN0alx61NNskUQv8bgcWNcjMSXe0h33kijgjywAGcpqPCAWLj5W_aJWexJMo8Lj4C6Heh48FI9NEjJ6ralUmduaW7GkAUyX24"/><br />
				<font style="">Bapak Zulkarnaini<br />
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
			->setFrom('maulana.saputra20@yahoo.com', NULL)
			->addTo($email, NULL)
			->setSubject('Register Online')
			->send();			
		} catch (Zend_Exception $e) {
			echo "Caught Exception : " . get_class($e) . "\n"; 
			echo "Message : " . $e->getMessage() . "\n";
		}
	}
	
}

