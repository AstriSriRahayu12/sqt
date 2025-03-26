Perangkat lunak dalam pengembangan ini menggunakan metode Agile

Agile adalah pendekatan pengembangan perangkat lunak yang bersifat iteratif, fleksibel, dan berfokus pada kolaborasi serta respons cepat terhadap perubahan. Namun, metode ini juga memiliki kelebihan dan kekurangan yang perlu dipertimbangkan sebelum digunakan.

✅ Kelebihan Agile
1. Fleksibel terhadap Perubahan
Agile memungkinkan perubahan di tengah pengembangan tanpa harus mengulang dari awal.

Cocok untuk proyek yang berkembang atau memiliki kebutuhan yang belum sepenuhnya jelas.

2. Time-to-Market Lebih Cepat
Perangkat lunak dikembangkan dalam iterasi pendek (sprint), sehingga fitur baru bisa dirilis lebih cepat.

Pelanggan bisa mulai menggunakan sebagian fitur tanpa harus menunggu keseluruhan proyek selesai.

3. Lebih Kolaboratif dan Transparan
Agile menekankan komunikasi tim melalui daily stand-up meetings dan sprint reviews.

Klien dan stakeholder bisa melihat progres proyek secara berkala dan memberikan feedback lebih awal.

4. Kualitas Perangkat Lunak Lebih Baik
Dengan adanya continuous testing, bug bisa ditemukan lebih cepat.

Praktik seperti Test-Driven Development (TDD) dan Continuous Integration (CI) meningkatkan kualitas kode.

5. Lebih Memotivasi Tim
Tim Agile memiliki otonomi dalam pengambilan keputusan.

Setiap anggota tim merasa lebih terlibat karena mereka berkontribusi pada iterasi kecil yang berdampak langsung.

❌ Kekurangan Agile
1. Kurang Cocok untuk Proyek yang Sangat Terstruktur
Jika proyek memiliki spesifikasi yang sangat jelas sejak awal dan jarang berubah (seperti sistem perbankan atau perangkat lunak pesawat), Agile bisa terasa kurang efisien.

Metode seperti Waterfall lebih cocok untuk proyek dengan persyaratan tetap.

2. Dokumentasi Kurang Formal
Agile lebih fokus pada pengembangan daripada dokumentasi.

Jika tim berubah di tengah jalan, bisa sulit bagi anggota baru untuk memahami proyek tanpa dokumentasi yang jelas.

3. Membutuhkan Tim yang Disiplin dan Berpengalaman
Jika tim tidak terbiasa dengan Agile, proyek bisa menjadi kacau karena tidak ada roadmap jangka panjang yang jelas.

Scrum Master yang kurang berpengalaman bisa menyebabkan backlog tidak terkelola dengan baik.

4. Sulit Diprediksi dalam Hal Waktu dan Biaya
Karena perubahan sering terjadi, sulit untuk menentukan batas waktu dan anggaran pasti di awal proyek.

Jika klien meminta banyak perubahan tanpa batasan, proyek bisa terus berkembang tanpa akhir (scope creep).

5. Memerlukan Keterlibatan Klien Secara Aktif
Klien harus selalu memberikan feedback di setiap iterasi.

Jika klien kurang terlibat, produk akhir bisa jadi tidak sesuai dengan ekspektasi.

SDD
1. sistem operasi tercantum pada dokumen ini menjelaskan android, tetapi keseluruhannya hanya mencakup website memang bisa di akses oleh android tetapi kurang menjelaskan andorid itu apa apakah mobile app atau hanya website, dan pada interface pun tidak dicantumkan tampilan android
2. DBMS menggunakan mysql yang seharusnya tercantum pada dokumen ini menggunakan oracle

SRS
1. Pengembangan perangkat lunak tidak mencantumkan timeline dari pengembangan yang menjadi patokan durasi dalam pengembangan
2. dokumen ini lebih menjelaskan apa saja isi dari perangkat lunak yang digunakan, tetapi kurang menjelaskan mengenai perangkat lunak ini yang bisa dipahami oleh orang awam atau user nantinya

Manual book
1. cukup baik dalam menjelaskan perangkat lunak dimulai dari interface user, pustakawan yang menjadi admin, dan juga pemilik
2. cukup baik menjelaskan bagaimana perangkat lunak berjalan dan digunakan

STP
1. tidak adanya dokumen ini, menjadikan perangkat lunak tidak bisa diuji fungsionalitas nya apakah sudah memenuhi kebutuhan pengguna, kesulitan dalam identifikasi masalah, dan analisa pengembangan untuk kedepannya

1. Kurangnya Dokumentasi Detail (Kekurangan Agile) vs. SDD & SRS yang Tidak Jelas
→ Kekurangan Agile: Dokumentasi kurang formal

Agile lebih berfokus pada pengembangan iteratif dan komunikasi langsung, sehingga dokumentasi sering kali tidak selengkap metode tradisional seperti Waterfall.

Hal ini terlihat dalam SDD, di mana sistem operasi hanya mencantumkan Android tanpa kejelasan apakah itu aplikasi mobile atau web. Begitu juga dalam SRS, yang tidak mencantumkan timeline pengembangan dengan jelas.

Jika menggunakan pendekatan Agile, perlu ada keseimbangan antara fleksibilitas dan dokumentasi yang cukup, misalnya dengan menambahkan User Story dan Product Backlog sebagai bentuk dokumentasi yang lebih ringan tetapi tetap informatif.

2. Fleksibilitas Agile Memungkinkan Perubahan Cepat (Kelebihan Agile) vs. Perubahan DBMS dari MySQL ke Oracle
→ Kelebihan Agile: Fleksibel terhadap perubahan

Agile memungkinkan perubahan spesifikasi di tengah pengembangan tanpa harus mengulang dari awal.

Hal ini relevan dengan perubahan DBMS dari MySQL ke Oracle, yang bisa diakomodasi lebih mudah jika menggunakan Agile dibandingkan metode Waterfall yang lebih kaku.

Dalam pendekatan Agile, perubahan seperti ini bisa dikelola melalui Backlog Grooming dan Sprint Review untuk memastikan tim selalu selaras dengan kebutuhan terbaru.

3. Kurangnya STP (Software Test Plan) vs. Pengujian Berkelanjutan dalam Agile (Kelebihan Agile)
→ Kelebihan Agile: Testing dilakukan sejak awal pengembangan

Dalam Agile, pengujian dilakukan secara berkelanjutan melalui metode Continuous Integration (CI) dan Test-Driven Development (TDD).

Tidak adanya STP berarti perangkat lunak sulit diuji secara sistematis, yang bisa menyebabkan bug baru ditemukan terlambat.

Jika menggunakan Agile, uji fungsionalitas bisa dilakukan setiap sprint dengan pendekatan seperti Automated Testing dan Unit Testing.

4. Manual Book yang Sudah Baik vs. Keterlibatan Pengguna dalam Agile (Kelebihan Agile)
→ Kelebihan Agile: Kolaborasi yang erat dengan pengguna

Manual Book sudah cukup baik dalam menjelaskan peran user, pustakawan, dan pemilik, yang menunjukkan adanya pemahaman tentang kebutuhan pengguna.

Dalam Agile, feedback pengguna sangat penting, sehingga pendekatan ini cocok jika tim terus melibatkan user dalam setiap iterasi untuk memastikan perangkat lunak mudah digunakan.
