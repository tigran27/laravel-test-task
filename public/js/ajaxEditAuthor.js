$(function () {

    var UpdateAuthor = function (option) {
        this.formData = new FormData();

        this.init = function () {
          $(document).on('click', option.update_author, _this.Update)
        };

        this.Update = function () {
             _this.id = $(option.update_author).val();

            var firstName = $('.first').val();
            var lastName = $('.last').val();
            var middleName = $('.middle').val();

            _this.formData.append('first', firstName);
            _this.formData.append('last', lastName);
            _this.formData.append('middle', middleName);
            _this.formData.append('_method', 'PUT');

            $.ajax({
                method: "POST",
                url: "/author/" + _this.id,
                data: _this.formData,
                processData: false,
                contentType: false,

                success: function (returndata) {
                    $(option.success_line).remove();

                    if(returndata.status == 'success'){

                        $('.first').val('');
                        $('.last').val('');
                        $('.middle').val('');
                    }

                    window.location.replace("/author");
                },

                error: function(data) {
                    $(option.error_text).remove();

                    var errorsField = data.responseJSON;

                    for (var key in errorsField) {
                        $('.'+key).append(''+'<span style="color: red" class="error-text">'+errorsField[key][0]+'</span>'+'')
                    }
                }
            })
        };

        var _this = this;
        this.init();
        return this;
    };

    new UpdateAuthor({
        update_author: '.update-author',
        success_line: '.success-line',
        error_text: '.error-text',
    });
});
