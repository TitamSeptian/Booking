$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

window.addEventListener("keyup", function() {
    console.log("okok");
});

$("#btn-create").on("click", function(e) {
    e.preventDefault();

    const url = $(this).attr("href");

    $.ajax({
        url: url,
        dataType: html,
        success: function(res) {
            $("#myModal .modal-title").text("Tambah Data");
            $("#myModal .modal-body").html(res);
            $("#myModal").show();
        }
    });
});
