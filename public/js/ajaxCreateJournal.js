$(function () {
    var CreateJournal = function (option) {

        this.init = function () {
            $(document).on('click', option.save_journal, _this.CreateJournal)
        };

        this.CreateJournal = function () {
            var form = $("#myForm").get(0);
            var formData = new FormData(form);

            $.ajax({
                method: "POST",
                url: "/journal",
                data: formData,
                processData: false,
                contentType: false,

                success: function (returndata) {
                    $(option.success_line).remove();

                    if (returndata.status == 'success') {

                        $('.titles').val('');
                        $('.description').val('');
                        $('.journal-image').val('');
                        $('.created-date').val('');

                        window.location.replace("/");
                    }
                },

                error: function (data) {
                    $(option.error_text).remove();
                    var errorsField = data.responseJSON;

                    for (var key in errorsField) {
                        $('.' + key).append('' + '<span style="color: red" class="error-text">' + errorsField[key][0] + '</span>' + '')
                    }
                }
            })
        };

        var _this = this;
        this.init();
        return this;
    };

    new CreateJournal({
        save_journal : '.save-journal',
        success_line : '.success-line',
        error_text : '.error-text'
    });
});

