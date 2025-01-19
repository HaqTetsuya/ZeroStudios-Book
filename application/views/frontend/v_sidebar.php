<?php
$artikel = $this->db->query("
            SELECT * FROM artikel,pengguna,kategori
            WHERE artikel_status ='publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            ORDER BY artikel_tanggal DESC
            LIMIT 3
            ")->result();

$buku = $this->db->query("
            SELECT 
                b.buku_judul AS Judul_Buku,
                b.buku_sampul AS Sampul_Buku,
                g.genre_nama AS Nama_Genre,
                s.service_slug AS Slug_Service
            FROM 
                service s
            JOIN 
                buku b ON s.service_buku = b.buku_id
            JOIN 
                genre g ON s.service_genre = g.genre_id
            LIMIT 5
        ")->result();

?>
<div class="product__sidebar">
    <div class="product__sidebar__search mb-4">
        <div class="section-title">
            <h5>Cari Buku</h5>
        </div>
        <?php echo form_open(base_url() . 'book/search'); ?>
            <div class="row">
                <div class="col-md-10">
                    <div class="input__item">
                        <input name="cariw" type="text" placeholder="Cari" />
                        <span><i class="fas fa-search"></i></span>
                    </div>
                </div>
                <div class="col-md-2 d-grid">
                    <button class="btn btn-block btn-danger" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>New Book</h5>
        </div>
        <?php foreach ($buku as $b) { ?>
            <div class="product__sidebar__comment__item">
                <div class="product__sidebar__comment__item__pic" style="max-width: 90px;">
                    <img src="<?php echo base_url('/img/book/' . $b->Sampul_Buku); ?>" alt="" />
                </div>
                <div class="product__sidebar__comment__item__text">
                    <ul>
                        <li><?php echo $b->Nama_Genre; ?></li>
                    </ul>
                    <h5>
                        <a href="<?php echo base_url('book/').$b->Slug_Service; ?>"><?php echo $b->Judul_Buku; ?></a>
                    </h5>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="product__sidebar__search mb-4">
        <div class="section-title">
            <h5>Cari Artikel</h5>
        </div>
        <?php echo form_open(base_url() . 'search'); ?>
            <div class="row">
                <div class="col-md-10">
                    <div class="input__item">
                        <input name="cari" type="text" placeholder="Cari"/>
                        <span><i class="fas fa-search"></i></span>
                    </div>
                </div>
                <div class="col-md-2 d-grid">
                    <button class="btn btn-block btn-danger" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="product__sidebar__view">
        <div class="section-title">
            <h5>Artikel Terbaru Kami</h5>
        </div>
        <div class="filter__gallery">
            <?php

            foreach ($artikel as $a) {
            ?>
                <div class="product__sidebar__view__item set-bg mix day years" data-setbg="<?php echo base_url('/img/artikel/') . $a->artikel_sampul; ?>">
                    <h5>
                        <a href="<?php echo base_url($a->artikel_slug) ?>">
                            <?php echo $a->artikel_judul ?>
                        </a>
                        <small class="text-white"><?php echo date('D-M-Y', strtotime($a->artikel_tanggal)); ?></small>
                    </h5>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>