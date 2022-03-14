<?php foreach ($produk as $row) :?>
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2><?=$title?></h2>
				<div class="page_link">
					<a href="<?=site_url()?>userhome">Home</a>
					<a href="<?=site_url()?>userhome/produk">Produk</a>
					<a href="<?=site_url()?>userhome/detail_produk/<?=$row['id_produk']?>"><?=$row['nama_produk']?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_product_img">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="<?=site_url()?>assets/file_upload/produk/f-p-4.jpg	"
									alt="First slide">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3><?=$row['nama_produk']?></h3>
					<h2><?=rupiah($row['harga'])?></h2>
					<ul class="list">
						<li>
							<a class="active" href="#">
								<span>Kategori</span> : <?=$row['nama_kategori']?></a>
						</li>
						<li>
							<a href="#">
								<span>Stok</span> : <?=$row['stok_produk']?></a>
						</li>
					</ul>
					<p><?=$row['deskripsi_produk']?>.</p>
					<div class="product_count">
						<label for="qty">Quantity:</label>
						<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
							class="input-text qty">
						<button
							onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							class="increase items-count" type="button">
							<i class="lnr lnr-chevron-up"></i>
						</button>
						<button
							onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							class="reduced items-count" type="button">
							<i class="lnr lnr-chevron-down"></i>
						</button>
					</div>
					<div class="card_area">
						<a class="main_btn" href="#">Beli Sekarang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<hr>
<!--================End Single Product Area =================-->
<?php endforeach;?>