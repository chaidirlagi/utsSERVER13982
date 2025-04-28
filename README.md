Sistem Manajemen Inventori
Ikhtisar Proyek
Saya telah membuat sistem manajemen inventori berbasis Laravel sebagai bagian dari tugas UTS. Sistem ini memiliki fitur dashboard untuk melihat ringkasan stok, serta pengelolaan item, kategori, dan pemasok. Untuk mendukung pengembangan, saya menggunakan Docker agar aplikasi dan basis data MySQL dapat dijalankan dengan lebih mudah.
Langkah-Langkah Pengerjaan Proyek
Berikut adalah tahapan yang saya lakukan dalam mengerjakan proyek ini:

Inisialisasi Proyek LaravelSaya memulai dengan membuat proyek Laravel baru menggunakan perintah composer create-project laravel/laravel inventory-system. Setelah itu, saya mengatur struktur proyek dan konfigurasi awal pada file .env.

Pengaturan Basis DataSaya membuat file migrasi untuk tabel admins, categories, suppliers, dan items sesuai dengan ERD yang diberikan. Saya juga menentukan relasi antar tabel pada model Laravel untuk mempermudah pengelolaan data.

Pembuatan Controller dan RouteSaya membuat controller untuk Dashboard, Item, Category, dan Supplier, serta mengatur route pada file routes/web.php untuk mendukung operasi CRUD.

Pembuatan Tampilan (View)Saya membuat template Blade untuk dashboard serta halaman CRUD untuk item, kategori, dan pemasok, sehingga pengguna dapat dengan mudah mengelola data.

Pengaturan DockerSaya membuat file docker-compose.yml untuk menjalankan aplikasi dan basis data MySQL. Saya juga membuat file Dockerfile untuk membangun container aplikasi PHP. Variabel lingkungan saya sesuaikan agar sesuai dengan pengaturan di file .env.

PengujianSaya menjalankan migrasi dengan perintah docker-compose exec app php artisan migrate, lalu menguji semua fitur dengan mengakses aplikasi di http://localhost:8000. Saya memastikan semua fungsi berjalan dengan baik.


Cara Menjalankan Proyek
Berikut adalah langkah-langkah untuk menjalankan proyek ini:

Kloning RepositoryKlon repository ini ke komputer Anda dengan perintah:  
git clone <URL_REPOSITORY_ANDA>


Pastikan Docker TerinstalPastikan Docker dan Docker Compose sudah terinstal di komputer Anda.

Konfigurasi File .envSalin file .env.example menjadi .env, lalu sesuaikan konfigurasinya. Pastikan DB_HOST diatur ke mysql.

Jalankan ContainerJalankan perintah berikut untuk membangun dan menjalankan container:  
docker-compose up -d --build


Jalankan Migrasi atau Impor Basis DataSaya telah menyertakan file SQL hasil ekspor dari basis data saya, yaitu uts_inventory.sql, di dalam repository ini. Anda dapat mengimpornya ke MySQL dengan perintah:  
docker-compose exec mysql mysql -u root uts_inventory < uts_inventory.sql

Alternatifnya, Anda juga dapat menjalankan migrasi untuk membuat tabel dari awal:  
docker-compose exec app php artisan migrate


Akses AplikasiBuka browser dan akses aplikasi di:  
http://localhost:8000



Fitur Proyek
Proyek ini memiliki beberapa fitur utama, yaitu:  

Dashboard yang menampilkan ringkasan stok, peringatan stok rendah, serta laporan per kategori dan pemasok.  
Fitur CRUD (Create dan Read) untuk item, kategori, dan pemasok.  
Aplikasi yang sudah di-dockerize dengan MySQL sebagai basis data.

Catatan Tambahan

Untuk menambahkan data awal, Anda dapat menjalankan seeder dengan perintah:  docker-compose exec app php artisan db:seed


Saya menyarankan untuk mengatur kata sandi basis data di .env dan docker-compose.yml demi keamanan yang lebih baik.
File uts_inventory.sql yang saya sertakan berisi struktur tabel beserta data yang telah saya gunakan untuk pengujian, sehingga Anda dapat langsung mengimpornya jika tidak ingin menjalankan migrasi dan seeder.

