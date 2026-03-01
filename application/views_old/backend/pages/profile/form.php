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

                                <input type="text" class="form-control" id="name" name="name" value="<?= $data->name ?? null ?>">
                                <b class="text-danger" id="name_error"></b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $data->email ?? null ?>">
                                <b class="text-danger" id="email_error"></b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= $data->phone ?? null ?>">
                                <b class="text-danger" id="phone_error"></b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="favicon">Favicon</label>
                                <input type="hidden" name="favicon_name" value="<?= $data->favicon ?? null ?>">
                                <input type="file" name="favicon" class="form-control">
                                <b class="text-danger" id="favicon_error"></b>
                            </div>
                        </div>

                        <?php if (!empty($data->favicon)) : ?>
                            <div class="form-group">
                                <div class="mb-3">
                                    <img src="<?= base_url("uploads/images/profiles/$data->favicon") ?>" alt="<?= $data->favicon ?>" width="300" height="150">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="icon">Logo</label>
                                <input type="hidden" name="icon_name" value="<?= $data->icon ?? null ?>">
                                <input type="file" name="icon" class="form-control">
                                <b class="text-danger" id="icon_error"></b>
                            </div>
                        </div>

                        <?php if (!empty($data->icon)) : ?>
                            <div class="form-group">
                                <div class="mb-3">
                                    <img src="<?= base_url("uploads/images/profiles/$data->icon") ?>" alt="<?= $data->icon ?>" width="300" height="150">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="2"><?= $data->address ?? null ?></textarea>
                                <b class="text-danger" id="message_error"></b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <label for="social_media">Social Media</label>
                                </div>

                                <div class="col-md-12">
                                    <button type="button" class="addSocialMedia btn btn-primary">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <?php foreach($social_medias as $social) : ?>
                                <div class="social-media-group row g-2 align-items-center mb-2">
                                    <div class="col-md-5">
                                        <input class="form-control" name="type[]" type="text" value="<?= $social->name ?>" placeholder="Social Media Type">
                                    </div>

                                    <div class="col-md-5">
                                        <input class="form-control" name="link[]" type="text" value="<?= $social->account ?>" placeholder="Social Media Link">
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <button type="button" class="removeSocialMedia btn btn-danger">
                                            <i class="fa fa-times"></i>
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
