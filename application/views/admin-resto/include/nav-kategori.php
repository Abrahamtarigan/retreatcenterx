<div class="row">
	<div class="col-lg-2">

		<b>Kategori</b>
		<hr>



		<article class="card-group-item">

			<div class="filter-content">
				<!-- <a href="#" class="list-group-item">Semua Masakan<span class="float-right badge badge-light round">142</span> </a> -->

				<div class="list-group list-group-flush">

					<a href="<?= base_url('adminresto/order/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/?o=dinein'); ?>" class="list-group-item text-primary"><small><b>Semua Masakan</b> </small><span class="float-right badge badge-light round">142</span> </a>
					<?php foreach ($getKategori as $gc) { ?>
						<a href="<?= base_url('adminresto/cari/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $gc->nama_kategori . '/?o=dinein'); ?>" class="list-group-item text-black"><small><b><?= $gc->nama_kategori; ?></b></small><span class="float-right badge badge-light round">142</span> </a>
					<?php } ?>
					</small>
				</div>
				<!-- list-group .// -->
			</div>
		</article> <!-- card-group-item.// -->

		<!-- card.// -->



		</aside> <!-- col.// -->
	</div>