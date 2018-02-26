$(function () {

    var Author = function (option) {
        this.formData = new FormData();
        this.authorId = null;

        this.init = function () {
            $(document).ready(_this.createDatatable);

            $(document).on('click', option.remove_author , _this.removeAuthor);
            $(document).on('click', option.remove_confirm, _this.removeConfirm);
            $(document).on('click', option.cancel_remove, _this.cancelRemove);

        };

        this.cancelRemove = function () {
            $(this).closest('.remove-div').hide();
        };

        this.removeConfirm = function () {
            _this.formData.append('id', _this.authorId);

            $.ajax({
                method: "DELETE",
                url: "/author/" + _this.authorId,
                type: "DELETE",
                data: _this.formData,
                processData: false,
                contentType: false,

                success: function (returndata) {
                    if (returndata.status == "success") {
                        $('.author' + _this.authorId).fadeOut();
                    }
                },

                error: function (data) {
                    $('.error-text').remove();
                }

            })
        };

        this.removeAuthor = function () {
            _this.authorId = $(this).val();
            $(option.remove_div).hide();
            $('#author-'+_this.authorId).show();
        };

        this.createDatatable = function () {
            $(option.datatable_dest).dataTable({

                "searching": false,
                "columnDefs": [ {
                    "targets": [0,2,3,4,5],
                    "orderable": false
                }],
            });
        };


        var _this = this;
        this.init();

        return this;
    };


    new Author({
        datatable_dest: '#table-author',
        remove_author: '.remove-author',
        remove_confirm: '.remove-confirm',
        cancel_remove: '.cancel-remove',
        remove_div: '.remove-div'
    });

});
