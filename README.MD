# Facebook Comment Random Quote
Program sederhana untuk menampilkan quote random di comment fb

## Syarat Penginstallan
- PHP 5+, recomended PHP 7+
- Apache web server
- Database Mysql
## Cara Install
- Clone repository ini, root document web server anda harus tertuju pada folder hasil clone repositori ini.
- Ubah data pada file src/config.php sesuai dengan yang anda butuhkan, terutama nama database, username, dan password sesuai server database di server anda.
- Pastikan, database dengan nama yang benar sudah ada di server database anda, sesuai yang anda masukan pada src/config.php
- Import quote.sql pada database anda
- jika konfigurasi sudah benar, anda bisa buka domain-anda.com/quote/create, anda bisa membuat quote, isikan judul, isi, dan url gambar yang ditampilkan
- Untuk membuat quote banyak dengan lebih cepat, buka domain-anda.com/quote/batch-create, anda bisa menambah banyak quote dalam format JSON.
- Untuk mencoba, paste kan url domain-anda.com/nama (nama bebas, nama akan ditampilkan di quote hasil generate) pada comment facebook.

### Aplikasi ini masih belum sepenuhnya ditest, kalau ada yang error / gak sesuai, hubungi developernya, hahahaha .. :D