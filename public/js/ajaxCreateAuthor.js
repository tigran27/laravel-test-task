$(function () {

    var CreateAuthor = function (option) {
        this.formData = new FormData();

        this.init = function () {
            $(document).on('click', option.save_author, _this.saveAuthor)
        };

        this.saveAuthor = function () {
           var   first_name = $('.first').val(),
                 last_name = $('.last').val(),
                 middle_name = $('.middle').val();

            _this.formData.append('first', first_name);
            _this.formData.append('last', last_name);
            _this.formData.append('middle', middle_name);

            $.ajax({
                method: "POST",
                url: "/author",
                data: _this.formData,
                processData: false,
                contentType: false,

                success: function (returndata) {
                    $(option.success_line).remove();

                    if (returndata.status == 'success') {

                        $(option.titles).val('');
                        $(option.description).val('');
                        $(option.journal_image).val('');
                        $(option.created_date).val('');

                        window.location.replace("/author");
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

    new CreateAuthor({
        save_author: '.save-author',
        success_line: '.success-line',
        error_text: '.error-text',
        titles: '.titles',
        description: '.success-line',
        journal_image: '.journal-image',
        created_date: '.created-date',
    });

});