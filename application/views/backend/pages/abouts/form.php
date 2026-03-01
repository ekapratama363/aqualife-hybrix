<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">  
      
      <b class="text-success" id="success-message"></b>
  
      <form action="#" id="form-data" class="mt-3">
        <div class="row">
          <div class="">

            <div class="col-md-6 form-group">
              <div class="mb-3">
                <label for="name">Name</label>

                <?php if (!empty($id)) : ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                <?php endif; ?>

                <input type="hidden" name="slug" value="<?= $slug ?>">

                <input type="text" class="form-control" id="name" name="name"
                  value="<?= $data->name ?? null ?>">
                <b class="text-danger" id="name_error"></b>
              </div>
            </div>

            <div class="col-md-6 form-group">
              <div class="mb-3">
                <label for="phone">Phone Number</label>
                <input type="number" class="form-control" id="phone" name="phone"
                  value="<?= $data->phone ?? null ?>">
                <b class="text-danger" id="phone_error"></b>
              </div>
            </div>

            <div class="col-md-6 form-group">
              <div class="mb-3">
                <label for="favicon">Favicon</label>
                <input type="hidden" name="favicon_name" value="<?= $data->favicon ?? null ?>">
                <input type="file" name="favicon" class="form-control">
                <b class="text-danger" id="favicon_error"></b>
              </div>
            </div>

            <?php if (!empty($data->favicon)) : ?>
            <div class="col-md-6 form-group">
              <div class="mb-3">
                <img src="<?= base_url("uploads/images/abouts/$data->favicon") ?>" 
                  alt="<?= $data->favicon ?>"
                  width="300"
                  height="150">
              </div>
            </div>
            <?php endif; ?>

            <div class="col-md-6 form-group">
              <div class="mb-3">
                <label for="images">Image Header</label>
                <input type="hidden" name="image_name" value="<?= $data->image ?? null ?>">
                <input type="file" name="images" class="form-control">
                <b class="text-danger" id="images_error"></b>
              </div>
            </div>

            <?php if (!empty($data->image)) : ?>
            <div class="col-md-6 form-group">
              <div class="mb-3">
                <img src="<?= base_url("uploads/images/abouts/$data->image") ?>" 
                  alt="<?= $data->image ?>"
                  width="300"
                  height="150">
              </div>
            </div>
            <?php endif; ?>

            <div class="col-md-6 form-group">
              <div class="mb-3">
                <label for="image_footer">Image Footer</label>
                <input type="hidden" name="image_footer_name" value="<?= $data->image_footer ?? null ?>">
                <input type="file" name="image_footer" class="form-control">
                <b class="text-danger" id="image_footer_error"></b>
              </div>
            </div>

            <?php if (!empty($data->image_footer)) : ?>
            <div class="col-md-6 form-group">
              <div class="mb-3">
                <img src="<?= base_url("uploads/images/abouts/$data->image_footer") ?>" 
                  alt="<?= $data->image_footer ?>"
                  width="300"
                  height="150">
              </div>
            </div>
            <?php endif; ?>

            <div class="col-md-6 form-group">
              <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2"><?= $data->description ?? null ?></textarea>
                <b class="text-danger" id="description_error"></b>
              </div>
            </div>

            <div class="col-md-12 form-group my-3">
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <label for="detail">Detail</label>
                    </div>

                    <div class="col-md-12 mt-2">
                        <button type="button" class="addDetail btn btn-primary">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>

                <?php foreach($details ?? [] as $detail) : ?>
                    <div class="detail-media-group row g-2 align-items-center mb-2">
                        <div class="col-md-3">
                            <input class="form-control" name="title[]" type="text" value="<?= $detail->title ?>" placeholder="Title">
                        </div>

                        <div class="col-md-3">
                            <input class="form-control" name="subtitle[]" type="text" value="<?= $detail->subtitle ?>" placeholder="Subtitle">
                        </div>

                        <div class="col-md-3">
                            <input class="form-control" name="icon[]" type="text" value="<?= $detail->icon ?>" placeholder="Icon">
                        </div>

                        <div class="col-md-2 text-center">
                            <button type="button" class="removeDetail btn btn-danger">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Additional Inputs Will Be Added Here -->
                <div class="inputDetail"></div>
            </div>

            <div class="col-md-6 form-group my-3">
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <label for="social_media">Social Media</label>
                    </div>

                    <div class="col-md-12 mt-2">
                        <button type="button" class="addSocialMedia btn btn-primary">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>

                <?php foreach($social_medias ?? [] as $social) : ?>
                    <div class="social-media-group row g-2 align-items-center mb-2">
                        <div class="col-md-5">
                            <input class="form-control" name="type[]" type="text" value="<?= $social->name ?>" placeholder="Social Media Type">
                        </div>

                        <div class="col-md-5">
                            <input class="form-control" name="link[]" type="text" value="<?= $social->account ?>" placeholder="Social Media Link">
                        </div>

                        <div class="col-md-2 text-center">
                            <button type="button" class="removeSocialMedia btn btn-danger">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Additional Inputs Will Be Added Here -->
                <div class="inputSocialMedia"></div>
            </div>

            <button type="button" class="btn btn-primary mr-2" id="btn-submit">
              <i class="mdi mdi-zip-disk"></i> Submit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>