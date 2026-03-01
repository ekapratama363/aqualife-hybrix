<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">  
      
      <b class="text-success" id="success-message"></b>
  
      <form action="#" id="form-data" class="mt-3">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group" style="display: none">
              <div class="mb-3">
                <label for="position">Position</label>
                <input type="number" class="form-control" id="position" name="position"
                  value="<?= $data->position ?? $position ?>" readonly>
                  
                <b class="text-danger" id="position_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="title">Title</label>

                <?php if (!empty($id)) : ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                <?php endif; ?>

                <input type="hidden" name="slug" value="<?= $slug ?>" id="slug">

                <input type="text" class="form-control" id="title" name="title"
                  value="<?= $data->title ?? null ?>">
                <b class="text-danger" id="title_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="subtitle">Subtitle</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle"
                  value="<?= $data->subtitle ?? null ?>">
                <b class="text-danger" id="subtitle_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="level">Product</label>
                <select name="product_id" id="product_id" class="form-control" multiple>
                  <?php if (isset($data->p_name)) : ?>
                    <option value="<?= $data->product_id ?>" selected><?= $data->p_name ?></option>
                  <?php endif ?>
                </select>
                <b class="text-danger" id="product_id_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="images">Image</label>
                <input type="file" class="multi form-control" name="images[]" multiple="multiple">
                <input type="hidden" class="multi form-control" name="image_name" value=<?= $data->images ?? '' ?>>
                <b class="text-danger" id="images_error"></b>
                
                <ul id="file-list"></ul>

              </div>
            </div>

            <?php if (isset($data->images)) : ?>
            <div class="form-group">
              <div class="mb-3 row">
                <div class="col-md-6">
                  <img src="<?= base_url("uploads/images/product_description/$data->images") ?>" 
                    alt="<?= $data->images ?>"
                    width="300"
                    height="150">
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"><?= $data->description ?? null ?></textarea>
                <b class="text-danger" id="description_error"></b>
              </div>
          </div>

          <div class="form-group">
            <div class="mb-3">
              <label for="link">Link</label>
              <input type="text" class="form-control" id="link" name="link"
                value="<?= $data->link ?? null ?>">
              <b class="text-danger" id="link_error"></b>
            </div>
          </div>

          <div class="col-md-12">
              <button type="button" class="btn btn-primary mr-2" id="btn-submit">
                <i class="mdi mdi-zip-disk"></i> Submit
              </button>

              <a href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4); ?>"><button type="button" 
                  class="btn btn-light"><i class="mdi mdi-close"></i> Back</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>