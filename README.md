Website eZakat - Kelompok RD1 MK RPL 2021

Anggota:
Fernando Zhahirsyah (1908107010026),
Choirunisa Romadoni (1908107010030),
Muhammad Rifki Aufa (1908107010037),
Muhammad Saifullah Sani (1908107010062),
Jessika (1908107010074)

Tata cara mengakses website:
1. Clone terlebih dahulu repository ini ke local
2. Nyalakan mysql pada xxamp
3. Buat database dengan nama "test" pada mysql
4. Buka terminal pada folder repository yang sudah diclone ke local
5. Ketik perintah "php artisan migrate" pada terminal
6. Lalu ketik perintah "php artisan serve"
7. Buka alamat localhost yang dimunculkan oleh terminal

Cara membuat akun admin
1. Daftar akun seperti biasa
2. Buka phpmyadmin, lalu cari tabel users pada database test
3. Cari akun yang ingin dijadikan akun admin 
4. Lalu ubah field jenis pada tabel tersebut, yang tadinya "user" menjadi "admin"
5. Save isi tabel yang sudah diedit
6. Login menggunakan akun yang sudah diedit tadi
