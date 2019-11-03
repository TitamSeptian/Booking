$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$("#btn-create").on("click", function(e) {
    let modal = $("#myModal");
    e.preventDefault();
    const url = $(this).data("link");
    // console.info(url);

    $.ajax({
        url: url,
        dataType: "html",
        success: function(res) {
            $("#myModal .modal-title").text("Tambah Data");
            $("#myModal .modal-body").html(res);
            $("#myModal").modal("show");
        }
    });
});

$("body").on("submit", "#form-store", function(e) {
    e.preventDefault();
    const url = $(this).attr("action");
    const formData = $(this).serialize();

    $("form")
        .find(".form-group")
        .removeClass("has-errors");
    $("form")
        .find(".help-block")
        .remove();
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(res) {
            $("#myModal").modal("hide");

            Swal.fire({
                title: "Sukses !",
                type: "success",
                text: res.msg,
                showConfirmButton: false,
                timer: 2000
            });

            $("#tableTempat")
                .DataTable()
                .ajax.reload();
        },
        error: function(xhr) {
            const errors = xhr.responseJSON;

            if (xhr.status === 401) {
                Swal.fire({
                    title: "Peringatan !",
                    type: "warning",
                    text: errors.msg
                });
            }

            $.each(errors.errors, function(key, value) {
                $("#" + key)
                    .closest(".form-group")
                    .addClass("has-errors")
                    .append(
                        `<span class="help-block" style="color:red;">` +
                            value +
                            `</span>`
                    );
            });
        }
    });
});
