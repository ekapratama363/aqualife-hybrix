<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">  
      
      <b class="text-success" id="success-message"></b>
  
      <form action="#" id="form-data" class="mt-3">
        <div class="row">
          <div class="col-md-12">

            <div class="form-group">
              <div class="mb-3">
                <label for="title">Title</label>

                <?php if (!empty($id)) : ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                <?php endif; ?>

                <input type="hidden" name="slug" value="<?= $slug ?>">

                <input type="text" class="form-control" id="title" name="title"
                  value="<?= $data->title ?? null ?>">
                <b class="text-danger" id="title_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="image_header">Image Header</label>
                <input type="file" class="multi form-control" name="image_header" multiple="multiple">
                <input type="hidden" class="multi form-control" name="image_header_name" value=<?= $data->image_header ?? '' ?>>
                <b class="text-danger" id="image_header_error"></b>
              </div>
            </div>

            <?php if (isset($data->image_header)) : ?>
            <div class="form-group">
              <div class="mb-3 row">
                <div class="col-md-12">
                  <img src="<?= base_url("uploads/images/news/$data->image_header") ?>" 
                    alt="<?= $data->image_header ?>"
                    width="300">
                </div>
              </div>
            </div>
            <?php endif; ?>

            <div class="form-group">
              <div class="mb-3">
                <label for="image_display">Image Display</label>
                <input type="file" class="multi form-control" name="image_display" multiple="multiple">
                <input type="hidden" class="multi form-control" name="image_display_name" value=<?= $data->image_display ?? '' ?>>
                <b class="text-danger" id="image_display_error"></b>
              </div>
            </div>

            <?php if (isset($data->image_display)) : ?>
            <div class="form-group">
              <div class="mb-3 row">
                <div class="col-md-12">
                  <img src="<?= base_url("uploads/images/news/$data->image_display") ?>" 
                    alt="<?= $data->image_display ?>"
                    width="300">
                </div>
              </div>
            </div>
            <?php endif; ?>

            <div class="form-group">
              <div class="mb-3">
                <label for="images">Images</label>
                <input type="file" class="multi form-control" name="images" multiple="multiple">
                <input type="hidden" class="multi form-control" name="image_name" value=<?= $data->images ?? '' ?>>
                <b class="text-danger" id="images_error"></b>
              </div>
            </div>

            <?php if (isset($data->images)) : ?>
            <div class="form-group">
              <div class="mb-3 row">
                <div class="col-md-12">
                  <img src="<?= base_url("uploads/images/news/$data->images") ?>" 
                    alt="<?= $data->images ?>"
                    width="300">
                </div>
              </div>
            </div>
            <?php endif; ?>


            <div class="form-group">
              <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="description"><?= $data->description ?? null ?></textarea>
                <b class="text-danger" id="description_error"></b>
              </div>
            </div>
          </div>

          <div class="col-md-12">
              <button type="button" class="btn btn-primary mr-2" id="btn-submit">
                <i class="mdi mdi-zip-disk"></i> Submit
              </button>

              <a href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>"><button type="button" 
                  class="btn btn-light"><i class="mdi mdi-close"></i> Back</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>