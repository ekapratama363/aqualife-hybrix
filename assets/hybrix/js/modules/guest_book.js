$(document).ready(function () {
	table();
});

function table() {
	$("#myTable").dataTable({
		processing: true,
		serverSide: true,
		pageLength: 10,
		ajax: {
			url: `${beBaseUrl}/guest_book/lists`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "name" },
			{ data: "email" },
			{ data: "phone" },
			{ data: "comment" },
			{ data: "created_at" },
			{ data: "action" },
		],
		columnDefs: [{ orderable: false, targets: [0] }],
		order: [],
	});
}
