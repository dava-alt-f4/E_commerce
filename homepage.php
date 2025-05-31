<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmeasMart</title>    
    <i class="fa-solid fa-magnifying-glass"></i>
</head>
<style>
* {
    margin: 0%;
    background-color: white;
    scroll-behavior: smooth;
    font-family: Arial, sans-serif;
}
header {
    padding: 10px 0 0 0;
    background-color:white;
    position: sticky;
    z-index: 1;
    top: 0%;
}
.kepala {
    justify-content: space-between;
    display: flex;
    position: sticky;
    align-items: center;
}
#promo {
    min-height: 60vh;
    padding: 10px;
}
#etalase {
    min-height: 100vh;
}
#support {
    min-height: 40vh;
}
#copyright {
    min-height: 7vh;
}
hr {
   margin-top: 12px;
   border: 0.5px solid rgba(0, 0, 0, 0.1);
}
body {
    background-color:rgba(237, 237, 224, 0.255)
}
.smeas {
    font-size: 30px;
    margin-left: 20px;
    cursor: pointer;
}
.search {
    height: 40px;
    width: 1000px;
    border-radius: 50px;
    border: 1px solid;
}
.search input {
    background: none;
    border:none ;
}
.gambar {
    display: flex;
    align-items: center;
    gap: 20px;
    padding-right: 10px;
}
.difka {
    background-color: bisque;
    height: 275px;
    margin: 70px 200px 0 200px;
    border-radius: 15px;
}
.menu {
    background-color: white;
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    padding: 0 190px;
    position: sticky;
    top: 9%;
    z-index: 1;
}
.menu button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px 20px;
}
.menu button.active {
    border-bottom: 2px solid forestgreen;
    color: forestgreen;
}
.etlse {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    padding: 0 180px;
}
.produk {
      background: #fff;
      padding: 10px ;
      border: 1px solid #ddd;
      border-radius: 10px;
      text-align: center;
}
.produk img {
   width: 100%;
   height: 150px;
   object-fit: cover;
}
.produk .title {
      font-weight: bold;
}

.produk .price {
      color: #e91e63;
      font-weight: bold;
}

.hidden {
      display: none;
}
.bawah {
    padding-left: 40px;
    padding-top: 40px;
}

.bawah h4 {
    font-weight: bold;
    margin-bottom: 10px;
}

.bawah ul {
    list-style: none;
    padding: 0;
}

.bawah ul li {
    margin-bottom: 6px;
}

.bawah ul li a {
    color: #333;
    text-decoration: none;
}

.kopikanan {
    text-align: center;
    padding-top: 18px;
    color: #777;
}
</style>
<header>
    <div class="kepala">
        <div class="smeas">
        <a href="#promo">
          <span style="color: green;">Smea$</span><span style="color:darkblue">mart</span>
        </a>
        </div>
        <div class="search">
        <input type="text" placeholder="Cari di SmeasMart..." style="font-size: 17px ; margin-left: 20px; margin-top: 9px;">
        </div>
        <div class="gambar">
        <img src="keranjang.png" alt="keranjang" width="40px" style="border:0px solid; border-radius: 0%;">   
        <img src="INIFURINA.jpg" alt="profil" width="40px" style="border:0px solid; border-radius: 50%;">   
        </div>
    </div>
    <div>
    <hr>
    </div>
</header>
<body>
<section id="promo">
<div class="difka"></div>   
</section>

<section id="etalase">
 <div class="menu">
    <button class="active" onclick="showCategory('Kategori1')">Kategori1</button>
    <button onclick="showCategory('Kategori2')">Kategori2</button>
  </div>

  <div id="Kategori1" class="etlse">
    <div class="produk">
    <img src="etal1.png">
    <div class="title">Adis</div>
    <div class="price">Rp3.999.000</div>
    </div>

    <div class="produk">
    <img src="etal2.png">
    <div class="title">Panupan</div>
    <div class="price">Rp3.999.000</div>
    </div>

    <div class="produk">
    <img src="etal1.png">
    <div class="title">Adis</div>
    <div class="price">Rp3.999.000</div>
    </div>

    <div class="produk">
    <img src="etal2.png">
    <div class="title">Panupan</div>
    <div class="price">Rp3.999.000</div>
    </div>

    <div class="produk">
    <img src="etal2.png">
    <div class="title">Panupan</div>
    <div class="price">Rp3.999.000</div>
    </div>
  </div>

  <div id="Kategori2" class="etlse hidden">
    <div class="produk">
    <img src="etal3.jpg">
    <div class="title">Siapa ini jir</div>
    <div class="price">Rp3.999.000</div>
    </div>

    <div class="produk">
    <img src="etal4.png">
    <div class="title">Wleee</div>
    <div class="price">Rp3.999.000</div>
    </div>
  </div>
</section>
<hr>
<section id="support">
    <div class="bawah">
        <h4>Dukung kami</h4>
        <ul>
            <li><a href="#">Fahmi</a></li>
            <li><a href="#">Azka</a></li>
            <li><a href="#">Dava</a></li>
            <li><a href="#">Fakhri</a></li>
        </ul>
    </div>
</section>
<hr>
<section id="copyright">
    <div class="kopikanan">
     <p>© 2009 - 2025, PT. Tokopedia. All Rights Reserved.</p>
    </div>
</section>
</body>

<script>
    function showCategory(categoryId) {

      document.querySelectorAll('.etlse').forEach(el => el.classList.add('hidden'));

      document.querySelectorAll('.menu button').forEach(btn => btn.classList.remove('active'));

      document.getElementById(categoryId).classList.remove('hidden');
      
      event.target.classList.add('active');
    }
  </script>
</html>