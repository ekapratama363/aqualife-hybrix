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

                <input type="hidden" name="slug" value="<?= $slug ?>" id="slug">
                <input type="text" class="form-control" id="name" name="name"
                  value="<?= $data->name ?? null ?>">
                <b class="text-danger" id="name_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="level">Category</label>
                <select name="category_id" id="category_id" class="form-control" multiple>
                  <?php if (isset($data->c_name)) : ?>
                    <option value="<?= $data->category_id ?>" selected><?= $data->c_name ?></option>
                  <?php endif ?>
                </select>
                <b class="text-danger" id="category_id_error"></b>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="images">Cover</label>
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
                  <img src="<?= base_url("uploads/images/products/$data->images") ?>" 
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
                <label for="link">Link Marketplace</label>
                <input type="text" class="form-control" id="link" name="link"
                  value="<?= $data->link ?? null ?>">
                <b class="text-danger" id="link_error"></b>
              </div>
          </div>

          <div class="form-group">
            <label for="link">Product Specifications</label>  
            <div class="mb-3">
              <?php if (count($details) == 0) : ?>
                <div class="input-group mb-3">
                  <input
                    class="form-control"
                    name="key_field_0"
                    type="text"
                    placeholder="ex: Price"
                    value="<?= isset($value->details[0]) ? $value->details[0] : '' ?>"
                  />
                  <input
                    class="form-control"
                    name="value_field_0"
                    type="text"
                    placeholder="ex: 200000"
                    value="<?= isset($value->details[1]) ? $value->details[1] : '' ?>"
                  />
                  <div class="input-group-append">
                    <button type="button" class="btn btn-primary addDetails">
                      <i class="bi bi-plus"></i>
                    </button>
                  </div>
                </div>
              <?php endif; ?>

              <?php foreach($details ?? [] as $key => $detail) : ?>
                <div class="input-group mb-3">
                  <input
                    class="form-control"
                    name="key_field_<?= $key ?>"
                    type="text"
                    placeholder="ex: Price"
                    value="<?= $detail->key_field ?>"
                  />
                  <input
                    class="form-control"
                    name="value_field_<?= $key ?>"
                    type="text"
                    placeholder="ex: 200000"
                    value="<?= $detail->value_field ?>"
                  />

                  <?php if ($key == 0) : ?>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-primary addDetails">
                        <i class="bi bi-plus"></i>
                      </button>
                    </div>
                  <?php else : ?>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-danger" onclick="handleRemove(this, <?= $key ?>)">
                        <i class="bi bi-x"></i>
                      </button>
                    </div>
                  <?php endif ; ?>

                </div>
              <?php endforeach; ?>

              <div class="inputDetails"></div>
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