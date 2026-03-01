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
                <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag"
                  value="<?= $data->tag ?? null ?>">
                <b class="text-danger" id="tag_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="rate">Rate</label>
                <input type="number" class="form-control" id="rate" name="rate"
                  value="<?= $data->rate ?? null ?>">
                <b class="text-danger" id="rate_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="images">Image</label>
                <input type="hidden" name="image_name" value="<?= $data->image ?? null ?>">
                <input type="file" name="images" class="form-control">
                <b class="text-danger" id="images_error"></b>
              </div>
            </div>

            <?php if (!empty($data->image)) : ?>
            <div class="form-group">
              <div class="mb-3">
                <img src="<?= base_url("uploads/images/testimonials/$data->image") ?>" 
                  alt="<?= $data->image ?>"
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