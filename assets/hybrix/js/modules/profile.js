$(document).ready(function () {
	$("#btn-submit").click(function () {
		submitData();
	});

	var x = 1;

	// Add Social Media Input
	$(document).on("click", ".addSocialMedia", function () {
		x++;
		$(".inputSocialMedia").append(`
            <div class="social-media-group row g-2 align-items-center mb-2">
                <div class="col-md-5">
                    <input class="form-control" name="type[]" type="text" placeholder="Social Media Type">
                </div>

                <div class="col-md-5">
                    <input class="form-control" name="link[]" type="text" placeholder="Social Media Link">
                </div>

                <div class="col-md-2 text-center">
                    <button type="button" class="removeSocialMedia btn btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        `);
	});

	// Remove Social Media Input
	$(document).on("click", ".removeSocialMedia", function () {
		$(this).closest(".social-media-group").remove();
		x--;
	});
});

function submitData() {
	$("#btn-submit").html("Loading...").prop("disabled", true);
	$("#error-message").html("");
	$("#success-message").html("");

	let form = $("#form-data")[0]; // Ambil elemen form
	let formData = new FormData(form); // Buat objek FormData

	$.ajax({
		url: `${beBaseUrl}/profile/update_or_create`,
		type: "POST",
		data: formData,
		dataType: "json",
		processData: false, // Jangan ubah FormData menjadi string
		contentType: false, // Jangan set Content-Type secara manual
		cache: false, // Hindari caching untuk memastikan data terbaru dikirim
		success: function (response) {
			if (response.status) {
				window.location.href = response.redirect_url;
			}

			$("#btn-submit").prop("disabled", false).html("Submit");
		},
		error: function (xhr, status, error) {
			$("[id$='_error']").text(""); // Menghapus teks error
			$("#btn-submit").prop("disabled", false);
			$("#btn-submit").html("Submit");

			if (xhr?.responseJSON?.errors) {
				for (const [id, message] of Object.entries(xhr.responseJSON.errors)) {
					$(`#${id}_error`).html(message);
				}
			}
		},
	});
}
