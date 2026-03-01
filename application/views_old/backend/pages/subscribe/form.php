<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">  
      
      <b class="text-success" id="success-message"></b>
  
      <form action="#" id="form-data" class="mt-3">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <div class="mb-3">
                <label for="email">Email</label>

                <?php if (!empty($id)) : ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                <?php endif; ?>

                <input type="text" class="form-control" id="email" name="email"
                  value="<?= $data->email ?? null ?>">
                <b class="text-danger" id="email_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="created_at">Created at</label>
                <input type="text" class="form-control" id="created_at" name="created_at"
                  value="<?= $data->created_at ?? null ?>">
                <b class="text-danger" id="created_at_error"></b>
              </div>
            </div>
          </div>

          <div class="col-md-12">
              <a href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2). '/' . $this->uri->segment(3); ?>"><button type="button" 
                  class="btn btn-light"><i class="mdi mdi-close"></i> Back</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>