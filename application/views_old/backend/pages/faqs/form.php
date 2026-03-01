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

                <input type="hidden" name="slug" id="slug" value="<?= $slug ?? '' ?>">
                <input type="text" class="form-control" id="title" name="title"
                  value="<?= $data->title ?? null ?>">
                <b class="text-danger" id="title_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="description">Description</label>

                <textarea name="description" id="description" class="form-control"><?= $data->description ?? null ?></textarea>
                <b class="text-danger" id="description_error"></b>
              </div>
            </div>

          </div>

          <div class="col-md-12">
              <button type="button" class="btn btn-primary mr-2" id="btn-submit">
                <i class="mdi mdi-zip-disk"></i> Submit
              </button>

              <a href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) .'/' . $this->uri->segment(3); ?>"><button type="button" 
                  class="btn btn-light"><i class="mdi mdi-close"></i> Back</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>