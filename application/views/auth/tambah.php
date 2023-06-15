<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah News
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" name="news_title" class="form-control" id="news_title">
                            <small class="form-text text-danger"><?= form_error('news_title'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="news_content" class="form-control" id="news_content"></textarea> 
                            <small class="form-text text-danger"><?= form_error('news_content'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Uploader</label>
                            <input type="text" name="news_uploader" class="form-control" id="news_uploader">
                            <small class="form-text text-danger"><?= form_error('news_uploader'); ?></small>
                        </div>
                        
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>