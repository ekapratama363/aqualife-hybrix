<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">  
      
      <b class="text-success" id="success-message"></b>
  
      <form action="#" id="form-data" class="mt-3">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <div class="mb-3">
                <label for="first_name">First Name</label>

                <?php if (!empty($id)) : ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                <?php endif; ?>

                <input type="text" class="form-control" id="first_name" name="first_name"
                  value="<?= $data->first_name ?? null ?>">
                <b class="text-danger" id="first_name_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                  value="<?= $data->last_name ?? null ?>">
                <b class="text-danger" id="last_name_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="consultation_date">Consultation Date</label>
                <input type="text" class="form-control" id="consultation_date" name="consultation_date"
                  value="<?= $data->consultation_date ?? null ?>">
                <b class="text-danger" id="consultation_date_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="address">Address</label>

                <textarea name="address" id="address" class="form-control"><?= $data->address ?? null ?></textarea>
                <b class="text-danger" id="address_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city"
                  value="<?= $data->city ?? null ?>">
                <b class="text-danger" id="city_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="province">Province</label>
                <input type="text" class="form-control" id="province" name="province"
                  value="<?= $data->province ?? null ?>">
                <b class="text-danger" id="province_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                  value="<?= $data->phone ?? null ?>">
                <b class="text-danger" id="phone_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                  value="<?= $data->email ?? null ?>">
                <b class="text-danger" id="email_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="category_id">Category</label>
                <input type="text" class="form-control" id="category_id" name="category_id"
                  value="<?= $data->c_name ?? null ?>">
                <b class="text-danger" id="category_id_error"></b>
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