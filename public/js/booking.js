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
                    Swal.fire({
                        title: "Peringatan !",
                        type: "warning",
                        text: "Terjadi Kesalahan"
                    });
                }
            });
        },
        error: function(xhr) {
            console.info(xhr);
        }
    });
});

$("body").on("click", ".time-start", function(e) {
    // e.prevenDefault();
    let time = $(this).data("time");
    let url = $(this).data("url");
});
