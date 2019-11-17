$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$("body").on("change", "#tgl_booking", function(e) {
    e.preventDefault();
    const url = $(this).data("url");
    const tgl = $(this).val();

    console.info("okokokok :" + tgl);
    let clear = $(".time-start").removeClass("myRed");

    $.ajax({
        method: "POST",
        url: url,
        data: {
            tgl_booking: tgl
        },
        success: function(res) {
            let rows = "";
            let hours = [
                "10:00 - 11:00",
                "11:00 - 12:00",
                "12:00 - 13:00",
                "13:00 - 14:00",
                "14:00 - 15:00",
                "15:00 - 16:00",
                "16:00 - 17:00",
                "17:00 - 18:00",
                "18:00 - 19:00",
                "19:00 - 20:00",
                "20:00 - 21:00",
                "21:00 - 22:00"
            ];

            let i = 0;
            hours.forEach((hour, index, arr) => {
                let assos = Math.abs(i);
                i++;
                function myIndex(target) {
                    if (assos + 1 <= res.data.length) {
                        return target == res.data[assos].jam;
                    }
                }
                if (assos + 1 <= res.data.length) {
                    console.info(arr[assos] == hour);
                    let targets = arr.findIndex(myIndex);
                    // console.info(targets);
                    let myMissions = $(
                        `.time-start[data-time="${arr[targets]}"`
                    );
                    // console.info(myMissions);
                    myMissions.addClass("myRed");
                } else {
                    console.info(assos + 1 <= res.data.length);
                    // Swal.fire({
                    //     title: "Peringatan !",
                    //     type: "warning",
                    //     text: "Terjadi Kesalahan"
                    // });
                }
            });
        },
        error: function(xhr) {
            console.info(xhr);
            errors = xhr.responseJSON;
            if (xhr.status == 401) {
                Swal.fire({
                    title: "Peringatan !",
                    type: "warning",
                    text: errors.msg
                });
            }
        }
    });
});

$("body").on("click", ".time-start", function(e) {
    // e.prevenDefault();
    let time = $(this).data("time");
    let url = $(this).data("url");
    let tempat = $(this).data("place");
    let title = $("#titleModal").text();
    Swal.fire({
        title: "Mau booking ?",
        type: "question",
        text: `${title} ?`,
        showCancelButton: true,
        confirmButtonColor: "#2dce89",
        cancelButtonColor: "#8A8A8A",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal"
    }).then(res => {
        if (res.value) {
            $.ajax({
                url: url,
                dataType: "html",
                success: function(res) {
                    $("#myModal .modal-title").text(title);
                    $("#myModal .modal-body").html(res);
                    $("#myModal").modal("show");
                }
            });
        }
    });
    // $.ajax({
    //     url:url,
    //     method: 'POST',
    //     data:{
    //         tempat_id:tempat,
    //         nama_booking:
    //     }
    // })
});
