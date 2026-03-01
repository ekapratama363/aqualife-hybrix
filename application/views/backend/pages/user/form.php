<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">  
      
      <b class="text-success" id="success-message"></b>
  
      <form action="#" id="form-data" class="mt-3">
        <div class="row">
          <div class="col-md-12">

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
                <label for="email">Email</label>

                <input type="email" class="form-control" id="email" name="email"
                  value="<?= $data->email ?? null ?>">
                <b class="text-danger" id="email_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="password">Password</label>

                <input type="text" class="form-control" id="password" name="password"
                  value="">
                <b class="text-danger" id="password_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="password_confirm">Password Confirmation</label>

                <input type="text" class="form-control" id="password_confirm" name="password_confirm"
                  value="">
                <b class="text-danger" id="password_confirm_error"></b>
              </div>
            </div>

          </div>

          <div class="col-md-12">
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