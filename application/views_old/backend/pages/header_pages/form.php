<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">  
      
      <b class="text-success" id="success-message"></b>
  
      <form action="#" id="form-data" class="mt-3">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <div class="mb-3">
                <label for="name">Name</label>

                <?php if (!empty($id)) : ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                <?php endif; ?>

                <input type="text" class="form-control" id="name" name="name"
                  value="<?= $data->name ?? null ?>">
                <b class="text-danger" id="name_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="meta_keyword">Meta Keyword</label>
                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                  value="<?= $data->meta_keyword ?? null ?>">
                <b class="text-danger" id="meta_keyword_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="meta_description">Meta Description</label>
                <input type="text" class="form-control" id="meta_description" name="meta_description"
                  value="<?= $data->meta_description ?? null ?>">
                <b class="text-danger" id="meta_description_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="images">Image</label>
                <input type="hidden" name="image_name" value="<?= $data->images ?? null ?>">
                <input type="file" name="images" class="form-control">
                <b class="text-danger" id="images_error"></b>
              </div>
            </div>

            <?php if (!empty($data->images)) : ?>
            <div class="form-group">
              <div class="mb-3">
                <img src="<?= base_url("uploads/images/headers/$data->images") ?>" 
                  alt="<?= $data->images ?>"
                  width="300"
                  height="150">
              </div>
            </div>
            <?php endif; ?>

            <div class="form-group">
              <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2"><?= $data->description ?? null ?></textarea>
                <b class="text-danger" id="description_error"></b>
              </div>
            </div>

            <button type="button" class="btn btn-primary mr-2" id="btn-submit">
              <i class="mdi mdi-zip-disk"></i> Submit
            </button>

            <a href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>"><button type="button" 
                class="btn btn-light"><i class="mdi mdi-close"></i> Back</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>