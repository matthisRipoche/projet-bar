$(function () {
    //accordeon boissons
    const allDescription = $(".boisson_description");
    $(".boisson_global").each(function (index) {
        $(this).click(function (e) {
            const description = $(this)
                .children(".boisson_description")
                .first();
            console.log(description);
            allDescription.removeClass("active");
            description.toggleClass("active");
        });
    });
});
