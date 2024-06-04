$(function () {
    $(".boisson_global").each(function (index) {
        $(this).click(function (e) {
            const description = $(this)
                .children(".boisson_description")
                .first();
            console.log(description);
            description.toggleClass(".active");
        });
    });
});
