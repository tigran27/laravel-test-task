$(function(){

    var UpdateJournal = function (option) {

        this.init = function () {
            $(document).on('click', option.update_journal, _this.update);
        };

        this.update = function () {
            var formData = new FormData();

            var id = $(option.update_journal).val();

            var titles = $('.titles').val();
            var description = $('.description').val();
            var journalImage = $('.journal-image').get(0).files[0];
            var createdDate = $('.created-date').val();
            var checkedValues = $('input:checkbox:checked').map(function() {
                return this.value;
            }).get();

            formData.append('titles', titles);
            formData.append('description', description);
            formData.append('files', journalImage);
            formData.append('authors', checkedValues);
            formData.append('journal_creation_date', createdDate);
            formData.append('_method', 'PUT');

            $.ajax({
                method: "POST",
                url: "/journal/" + id,
                data: formData,
                processData: false,
                contentType: false,

                success: function (returndata) {
                    $(option.success_line).remove();

                    if(returndata.status == 'success'){

                        $('.titles').val('');
                        $('.description').val('');
                        $('.journal-image').val('');
                        $('.created-date').val('');

                    }

                    window.location.replace("/");
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


    new UpdateJournal({
        update_journal : '.update-journal',
        success_line: '.success-line',
        error_text: '.error-text',
    });

});

