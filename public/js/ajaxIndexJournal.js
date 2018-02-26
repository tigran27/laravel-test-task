$(function () {

    var Journal = function (option) {
        this.formData = new FormData();
        this.journalId = null;

        this.init = function () {
            $(document).ready(_this.createDatatable);

            $(document).on('click', option.remove_journal , _this.removeJournal);
            $(document).on('click', option.remove_confirm, _this.removeConfirm2);
            $(document).on('click', option.cancel_remove, _this.cancelRemove2);

        };

        this.cancelRemove2 = function () {
            $(this).closest('.remove-div').hide();
        };

        this.removeConfirm2 = function () {
            _this.formData.append('id', _this.journalId);

            $.ajax({
                method: "DELETE",
                url: "/journal/" + _this.journalId,
                type: "DELETE",
                data: _this.formData,
                processData: false,
                contentType: false,

                success: function (returndata) {
                    if(returndata.status == 'success'){
                        $('.journal' + _this.journalId).hide();
                    }
                },

                error: function (data) {
                    $('.error-text').remove();
                }

            })
        };

        this.removeJournal = function () {
            _this.journalId = $(this).data('id');

              $('.remove-div').hide();

              $(this).parent().find('.remove-div[data-id=' + _this.journalId + ']').show();
        };

        this.createDatatable = function () {
            $(option.datatable_dest).dataTable({

                "searching": false,
                "columnDefs": [ {
                    "targets": [0,1,2,4,5],
                    "orderable": false
                }],
            });
        };


        var _this = this;
        this.init();

        return this;
    };


    new Journal({
        datatable_dest: '#table-journal',
        remove_journal: '.remove-journal',
        remove_confirm: '.remove-confirm',
        cancel_remove: '.cancel-remove',
        remove_div: '.remove-div'
    });

});

