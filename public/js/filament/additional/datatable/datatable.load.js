function closeMessage() {
    setTimeout(function () {
        $("message").addClass("hidden").fadeOut();
    }, 1000);
}
closeMessage();

var TableId = "";

function initDataTable(
    TableId,
    columns,
    searchBtnSelector = null,
    resetBtt = null,
    attributeStyle = null,
    optionSelected = null,
    defaultLengthMenu = [
        [5, 10, 25, 50, 100, -1],
        [5, 10, 25, 50, 100, "All"]
    ]
) {
    var ajaxUrl = $("#" + TableId).attr("ref-data");
    var table = $("#" + TableId).DataTable({
        processing: true,
        serverSide: true,
        bFilter: false,
        ordering: false,
        order: [[0, "desc"]],
        lengthMenu: defaultLengthMenu,
        ajax: {
            url: ajaxUrl,
            data: function (d) {
                // Optional: extra search params if search button is used
                d.keyword = $("#keyword").val();
                d.option = document.querySelector(
                    "input[name='choice']:checked",
                )?.value;
                if (optionSelected) {
                    Object.entries(optionSelected).forEach(([key, value]) => {
                        // assign dynamically to d[key]
                        d[value] = $("#" + key).val() ?? "";
                    });
                }
            },
        },
        columns: columns,
        createdRow: attributeStyle,
    });

    if (searchBtnSelector) {
        $(searchBtnSelector).on("click", function () {
            table.draw(true);
        });
    }

    if (resetBtt) {
        $(resetBtt).on("click", function () {
            table.draw(true);
        });
    }
    return table;
}
$(function () {
    $(".btn-submit").on("click", function () {
        var url = "";
        var FormID = "#";
        var type = "";
        FormID += $(".form").attr("id");
        url += $(".form").attr("data-action");
        type += $(".form").attr("method") ?? "POST";
        $.ajax({
            url: url, // The controller route
            type: type, // 'POST' usually
            data: $(FormID).serialize(), // serialize the form data
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // important for Laravel POST
            },
            success: function (response) {
                if (response.success) {
                    // Show success message
                    $(".message")
                        .html(response.message)
                        .removeClass("hidden")
                        .addClass(response.status)
                        .fadeIn();

                    // Remove class and hide after 3 seconds
                    setTimeout(function () {
                        $(".message")
                            .addClass("hidden")
                            .removeClass(response.status)
                            .fadeOut();
                        // Reload the current page
                        window.location.reload();
                    }, 1000);
                    // Optionally update input values with returned data
                    // if (response.data) {
                    //     $.each(response.data, function (key, value) {
                    //         $('input[name="' + key + '"]').val(value);
                    //     });
                    // }
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Laravel validation errors
                    let errors = xhr.responseJSON.errors;
                    console.log(errors);
                    // Optionally display errors next to form fields
                } else {
                    $(".message")
                        .html("Error submitting form")
                        .removeClass("hidden");
                }
            },
        });
    });
});

function showToggle(returnElement) {
    return returnElement;
}
