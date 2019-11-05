$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

// create show modal

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
$("body").on("click", ".btn-edit", function(e) {
    e.preventDefault();
    const url = $(this).attr("href");
    const title = $(this).attr("title");

    $.ajax({
        url: url,
        dataType: "html",
        success: function(res) {
            $("#myModal .modal-title").text("Edit " + title);
            $("#myModal .modal-body").html(res);
            $("#myModal").modal("show");
        }
    });
});

$("body").on("click", ".btn-show", function(e) {
    e.preventDefault();

    const url = $(this).attr("href");
    const title = $(this).attr("title");

    $.ajax({
        url: url,
        dataType: "html",
        success: function(res) {
            $("#myModal .modal-title").text("Detail " + title);
            $("#myModal .modal-body").html(res);
            $("#myModal").modal("show");
        },
        error: function(xhr) {
            Swal.fire({
                title: "Peringatan !",
                type: "warning",
                text: "something wrong"
            });
        }
    });
});

$("body").on("submit", "#form-edit", function(e) {
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
        }
    });
});

$("body").on("click", ".btn-delete", function(e) {
    e.preventDefault();

    const url = $(this).attr("href");
    const title = $(this).attr("title");
    console.info(url);
    Swal.fire({
        title: "Anda Yakin ?",
        type: "warning",
        text: `${title} Akan Dihapus Permanen`,
        showCancelButton: true,
        confirmButtonColor: "#EF2E2E",
        cancelButtonColor: "#8A8A8A",
        confirmButtonText: "Ya, Hapus !",
        cancelButtonText: "Batal"
    }).then(res => {
        if (res.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _method: "DELETE"
                },
                success: function(res) {
                    $("#myModal").modal("hide");

                    Swal.fire({
                        title: "Sukses !",
                        type: "success",
                        text: res.msg,
                        showConfirmButton: false,
                        timer: 1800
                    });
                    $("#tableTempat")
                        .DataTable()
                        .ajax.reload();
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Peringatan !",
                        type: "warning",
                        text: "something wrong"
                    });
                }
            });
        }
    });
});
