<p align="center">
  <a href="https://mwhp.me/">
    <img src="https://github.com/komenkx1/faxine-frontEnd/blob/main/public/img/icons/icon-128x128.png" alt="Logo" width=120 height=120>
  </a>

  <h3 align="center">Faxine API 💉</h3>

  <p align="center">
    API Documentations for Faxine application.
  </p>
</p>

## Table of contents

- [Table of contents](#table-of-contents)
- [Login](#login)
- [Get All lokasi](#get-all-lokasi)
- [Add lokasi](#add-lokasi)
- [Edit lokasi](#edit-lokasi)
- [Delete Lokasi vaksinasi](#delete-lokasi-vaksinasi)
- [Get All Berita](#get-all-berita)
- [Get Detail Berita](#get-detail-berita)
- [Add Berita](#add-berita)
- [Edit Berita](#edit-berita)
- [Delete Lokasi vaksinasi](#delete-lokasi-vaksinasi-1)

## Login

- ### URL

  /api/login

- ### Method

  POST

- ### Body

  - email : string
  - passowrd : string

- ### Response

```json
{
  "status": "success",
  "message": "Hi Andrian Cimen, welcome to home",
  "access_token": "xxxxxxxxxxx--token--xxxxxxxxxxxx",
  "token_type": "Bearer"
}
```

## Get All lokasi

Mendapatkan seluruh informasi lokasi

- ### URL

  /api/lokasi

- ### Method

  GET

- ### Response

```json
{
  "data": [
    {
      "id": 25,
      "nama_masyarakat": "Ayu Krisna Melati",
      "alamat": "Ayana Resort Bali Jimbaran",
      "status": "segera",
      "link_google_map": "https://goo.gl/maps/BanV1w2riDv1avLf8",
      "tanggal_mulai": "2022-07-04 10:01:00",
      "tanggal_berakhir": "2022-07-09 10:01:00",
      "kapasitas": 200
    },
    {
      "id": 24,
      "nama_masyarakat": "Desak Ayu Leony Julianita",
      "alamat": "Four Season Resort Jimbaran",
      "status": "segera",
      "link_google_map": "https://goo.gl/maps/7N9WSETTcnLN32TF8",
      "tanggal_mulai": "2022-06-29 09:59:00",
      "tanggal_berakhir": "2022-07-02 09:59:00",
      "kapasitas": 100
    },
    {
      "id": 23,
      "nama_masyarakat": "Mang Wahyu",
      "alamat": "RSBM Rumah Sakit Umum Daerah Bali Mandara (vaksin 2 & 3) 18++",
      "status": "segera",
      "link_google_map": "https://www.google.com/maps/dir/-8.6140921,115.2956116/RSBM+Rumah+Sakit+Umum+Daerah+Bali+Mandara/@-8.6603289,115.2339193,13z/am=t/data=!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2dd241bcaf4b1535:0x1846b970c9523919!2m2!1d115.2488658!2d-8.7039112",
      "tanggal_mulai": "2022-06-29 11:30:00",
      "tanggal_berakhir": "2022-06-29 13:00:00",
      "kapasitas": 100
    }
  ],
  "meta": {
    "total_data": 3,
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "links": [
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "https://mwhp.me/api/lokasi?page=1",
        "label": "1",
        "active": true
      },
      {
        "url": null,
        "label": "Next &raquo;",
        "active": false
      }
    ],
    "path": "https://mwhp.me/api/lokasi",
    "per_page": 5,
    "to": 3,
    "total": 3
  },
  "links": {
    "first": "https://mwhp.me/api/lokasi?page=1",
    "last": "https://mwhp.me/api/lokasi?page=1",
    "prev": null,
    "next": null
  }
}
```

## Add lokasi

Menambahkan lokasi vaksinasi

- ### URL

  /api/lokasi

- ### Method

  POST

- ### Body

  - nama_masyarakat: string,
  - alamat: string,
  - status: string,
  - link_google_map: string (url),
  - tanggal_mulai: date,
  - tanggal_berakhir: date,
  - kapasitas: numeric

- ### Response

```json
{
  "message": "Lokasi berhasil ditambahkan"
}
```

## Edit lokasi

Mengedit lokasi vaksinasi

- ## URL

  /api/lokasi/:lokasiId

- ## Method

  PUT

- ## Header

  Authorization : Bearer xxxxxxxxx-token-xxxxxxxxx

- ## Body

  - nama_masyarakat: string,
  - alamat: string,
  - status: string,
  - link_google_map: string (url),
  - tanggal_mulai: date,
  - tanggal_berakhir: date,
  - kapasitas: numeric

- ## Response

```json
{
  "message": "Data berhasil diupdate",
  "data": {
    "id": 35,
    "nama_masyarakat": "Andrian Cimen",
    "alamat": "Rumah Sakit Umum Daerah Kota Mataram",
    "status": "segera",
    "link_google_map": "https://goo.gl/maps/C3yY2hi2j2vYcysX9",
    "tanggal_mulai": "2022-07-04 10:01:00",
    "tanggal_berakhir": "2022-07-09 10:01:00",
    "kapasitas": 400,
    "created_at": "2022-06-30T12:43:33.000000Z",
    "updated_at": "2022-06-30T13:06:38.000000Z"
  }
}
```

## Delete Lokasi vaksinasi

Menghapus lokasi vaksinasi

- ## URL

  /api/lokasi/:lokasiId

- ## Method

  DELETE

- ## Header

  Authorization : Bearer xxxxxxxxx-token-xxxxxxxxx

- ## Response

```json
{
  "message": "Data berhasil dihapus"
}
```

## Get All Berita

Mendapatkan semua berita

- ### URL

  /api/berita

- ### Method

  GET

- ### Response

```json
{
  "data": [
    {
      "id": 43,
      "judul": "Eks Bos WHO Ungkap Penyebab yang Bikin Covid-19 RI Naik Lagi",
      "slug": "eks-bos-who-ungkap-penyebab-yang-bikin-covid-19-ri-naik-lagi",
      "content": "<p>Belakangan ini, Kasus harian COVID-19 RI terus merangkak bahkan mendekati 2.000 kasus. Ini menjadi penambahan tertinggi sejak kasus harian sempat turun hingga di bawah 1.000 di bulan April lalu.</p>\n<p>Berdasarkan data Satuan Tugas Penanganan Covid-19, seperti dikutip Jumat (24/5/2022), kasus harian tertinggi terjadi pada 22 Juni yakni sebanyak 1.985 kasus, yang menjadi penambahan tertinggi sejak April.</p>\n<p>Mantan Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara, Profesor Tjandra Yoga Aditama, memberi beberapa catatan soal kenaikan kasus COVID-19 yang dialami Indonesia dalam sepekan terakhir.&nbsp;\"Tinggi sekali, dan jelas perlu waspada,\" kata Eks Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara Tjandra Yoga Aditama.</p>\n<p><strong>Baca Juga :</strong> <a title=\"Update Covid-19 Indonesia: Kasus Positif Tambah 2.069 Orang\" href=\"https://faxine.live/Berita/update-covid-19-indonesia-kasus-positif-tambah-2069-orang\">Update Covid-19 Indonesia: Kasus Positif Tambah 2.069 Orang</a></p>\n<p>Belakangan ini, Kasus harian COVID-19 RI terus merangkak bahkan mendekati 2.000 kasus. Ini menjadi penambahan tertinggi sejak kasus harian sempat turun hingga di bawah 1.000 di bulan April lalu.</p>\n<p>Berdasarkan data Satuan Tugas Penanganan Covid-19, seperti dikutip Jumat (24/5/2022), kasus harian tertinggi terjadi pada 22 Juni yakni sebanyak 1.985 kasus, yang menjadi penambahan tertinggi sejak April.</p>\n<p>Mantan Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara, Profesor Tjandra Yoga Aditama, memberi beberapa catatan soal kenaikan kasus COVID-19 yang dialami Indonesia dalam sepekan terakhir. \"Tinggi sekali, dan jelas perlu waspada,\" kata Eks Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara Tjandra Yoga Aditamas.</p>\n<p>&nbsp;</p>\n<p><strong>Sumber :</strong> <a title=\"cnbcindonesia\" href=\"https://www.cnbcindonesia.com/\">cnbcindonesia</a></p>",
      "cover": "https://awsimages.detik.net.id/visual/2020/01/27/277f5c49-a5d7-49b0-81dd-aee4b5d862be_169.png?w=360&q=90",
      "tanggal_pembuatan": "2022-06-26T01:24:48.000000Z",
      "tanggal_pembaruan": "2022-06-28T03:08:26.000000Z",
      "user": {
        "id": 11,
        "name": "Andrian Cimen",
        "email": "andriancimen123@gmail.com",
        "email_verified_at": null,
        "no_hp": "082340123456",
        "created_at": "2022-06-13T14:32:02.000000Z",
        "updated_at": "2022-06-13T14:32:02.000000Z"
      }
    },
    {
      "id": 25,
      "judul": "Update Covid-19 Indonesia: Kasus Positif Tambah 2.069 Orang",
      "slug": "update-covid-19-indonesia-kasus-positif-tambah-2069-orang",
      "content": "<p>Satuan Tugas Penanganan&nbsp;<a href=\"https://www.suara.com/tag/covid-19\">Covid-19</a>&nbsp;mengumumkan kasus positif COVID-19 di Indonesia kembali bertambah sebanyak 2.069 orang pada Jumat (24/6/2022), sehingga total kasus positif Covid-19 mencapai 6.076.894 orang.</p>\n<p>Hari ini juga ada tambahan lima orang yang meninggal sehingga total menjadi 156.711 jiwa meninggal dunia.</p>\n<div><center>\n<div id=\"div-ad-oop\" class=\"\" data-ad-type=\"desktop_oop\"></div>\n</center></div>\n<p>Kemudian, ada tambahan 998 orang yang sembuh sehingga total menjadi 5.906.969 orang lainnya dinyatakan sembuh.</p>\n<p>Sementara kasus aktif atau orang yang masih dirawat naik 1.066 menjadi 13.214 orang, dengan jumlah suspek mencapai 4.436 orang.</p>\n<p>Angka tersebut didapatkan dari hasil pemeriksaan 76.993 spesimen dari 50.165 orang yang diperiksa hari ini, positivity rate hari ini mencapai 4,12 persen, di bawah standar aman WHO yakni 5 persen.</p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://cdn1-production-images-kly.akamaized.net/wyEUIst-bOf3sbmM-qN6bEp76IY=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/thumbnails/4056285/original/013957500_1655464643-semenit-berfaedah-covid-19-di-indonesia-akan-kembali-melonjak-883c8e.jpg\" alt=\"covid melonjak?\" width=\"640\" height=\"360\"></p>\n<p>Total spesimen yang sudah diperiksa sejak kasus pertama covid-19 hingga hari ini adalah 100.384.534 spesimen dari 66.262.363 orang.</p>\n<p>Tercatat sudah 34 provinsi dan 514 kabupaten/kota yang terinfeksi virus COVID-19.</p>\n<p>&nbsp;</p>",
      "cover": "https://media.suara.com/pictures/653x366/2022/05/31/48855-test-pcr-antigen-pandemi-covid-19.webp",
      "tanggal_pembuatan": "2022-06-23T13:29:23.000000Z",
      "tanggal_pembaruan": "2022-06-25T03:46:15.000000Z",
      "user": {
        "id": 11,
        "name": "Andrian Cimen",
        "email": "andriancimen123@gmail.com",
        "email_verified_at": null,
        "no_hp": "082340123456",
        "created_at": "2022-06-13T14:32:02.000000Z",
        "updated_at": "2022-06-13T14:32:02.000000Z"
      }
    }
  ],
  "meta": {
    "total_data": 2,
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "links": [
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "https://mwhp.me/api/berita?page=1",
        "label": "1",
        "active": true
      },
      {
        "url": null,
        "label": "Next &raquo;",
        "active": false
      }
    ],
    "path": "https://mwhp.me/api/berita",
    "per_page": 10,
    "to": 2,
    "total": 2
  },
  "links": {
    "first": "https://mwhp.me/api/berita?page=1",
    "last": "https://mwhp.me/api/berita?page=1",
    "prev": null,
    "next": null
  }
}
```

## Get Detail Berita

Mendapatkan detail Berita

- ### URL

  /api/berita/:slug

- ### Method

  GET

- ### Response

```json
{
  "data": {
    "id": 43,
    "judul": "Eks Bos WHO Ungkap Penyebab yang Bikin Covid-19 RI Naik Lagi",
    "slug": "eks-bos-who-ungkap-penyebab-yang-bikin-covid-19-ri-naik-lagi",
    "content": "<p>Belakangan ini, Kasus harian COVID-19 RI terus merangkak bahkan mendekati 2.000 kasus. Ini menjadi penambahan tertinggi sejak kasus harian sempat turun hingga di bawah 1.000 di bulan April lalu.</p>\n<p>Berdasarkan data Satuan Tugas Penanganan Covid-19, seperti dikutip Jumat (24/5/2022), kasus harian tertinggi terjadi pada 22 Juni yakni sebanyak 1.985 kasus, yang menjadi penambahan tertinggi sejak April.</p>\n<p>Mantan Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara, Profesor Tjandra Yoga Aditama, memberi beberapa catatan soal kenaikan kasus COVID-19 yang dialami Indonesia dalam sepekan terakhir.&nbsp;\"Tinggi sekali, dan jelas perlu waspada,\" kata Eks Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara Tjandra Yoga Aditama.</p>\n<p><strong>Baca Juga :</strong> <a title=\"Update Covid-19 Indonesia: Kasus Positif Tambah 2.069 Orang\" href=\"https://faxine.live/Berita/update-covid-19-indonesia-kasus-positif-tambah-2069-orang\">Update Covid-19 Indonesia: Kasus Positif Tambah 2.069 Orang</a></p>\n<p>Belakangan ini, Kasus harian COVID-19 RI terus merangkak bahkan mendekati 2.000 kasus. Ini menjadi penambahan tertinggi sejak kasus harian sempat turun hingga di bawah 1.000 di bulan April lalu.</p>\n<p>Berdasarkan data Satuan Tugas Penanganan Covid-19, seperti dikutip Jumat (24/5/2022), kasus harian tertinggi terjadi pada 22 Juni yakni sebanyak 1.985 kasus, yang menjadi penambahan tertinggi sejak April.</p>\n<p>Mantan Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara, Profesor Tjandra Yoga Aditama, memberi beberapa catatan soal kenaikan kasus COVID-19 yang dialami Indonesia dalam sepekan terakhir. \"Tinggi sekali, dan jelas perlu waspada,\" kata Eks Direktur Organisasi Kesehatan Dunia (WHO) Asia Tenggara Tjandra Yoga Aditamas.</p>\n<p>&nbsp;</p>\n<p><strong>Sumber :</strong> <a title=\"cnbcindonesia\" href=\"https://www.cnbcindonesia.com/\">cnbcindonesia</a></p>",
    "cover": "https://awsimages.detik.net.id/visual/2020/01/27/277f5c49-a5d7-49b0-81dd-aee4b5d862be_169.png?w=360&q=90",
    "tanggal_pembuatan": "2022-06-26T01:24:48.000000Z",
    "tanggal_pembaruan": "2022-06-28T03:08:26.000000Z",
    "user": {
      "id": 11,
      "name": "Andrian Cimen",
      "email": "andriancimen123@gmail.com",
      "email_verified_at": null,
      "no_hp": "082340123456",
      "created_at": "2022-06-13T14:32:02.000000Z",
      "updated_at": "2022-06-13T14:32:02.000000Z"
    }
  }
}
```

## Add Berita

Menambahkan Berita

- ### URL

  /api/berita

- ### Method

  POST

- ### Body

  - judul: string,
  - slug: string,
  - content: string,
  - cover: string (url),

- ### Response

```json
{
  "message": "Berita berhasil ditambahkan"
}
```

## Edit Berita

Mengedit Berita

- ## URL

  /api/lokasi/:slug

- ## Method

  PUT

- ## Header

  Authorization : Bearer xxxxxxxxx-token-xxxxxxxxx

- ## Body

  - judul: string,
  - slug: string,
  - content: string,

- ## Response

```json
{
  "message": "Data berhasil diupdate",
  "data": {
    "id": 35,
    "nama_masyarakat": "Andrian Cimen",
    "alamat": "Rumah Sakit Umum Daerah Kota Mataram",
    "status": "segera",
    "link_google_map": "https://goo.gl/maps/C3yY2hi2j2vYcysX9",
    "tanggal_mulai": "2022-07-04 10:01:00",
    "tanggal_berakhir": "2022-07-09 10:01:00",
    "kapasitas": 400,
    "created_at": "2022-06-30T12:43:33.000000Z",
    "updated_at": "2022-06-30T13:06:38.000000Z"
  }
}
```

## Delete Lokasi vaksinasi

Menghapus lokasi vaksinasi

- ## URL

  /api/lokasi/:lokasiId

- ## Method

  DELETE

- ## Header

  Authorization : Bearer xxxxxxxxx-token-xxxxxxxxx

- ## Response

```json
{
  "message": "Data berhasil dihapus"
}
```
