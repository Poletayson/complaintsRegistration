function deleteComplaint (event) {
    console.log(event);
    let complaintId = event.target.attributes['data-complaintId'].value;
    console.log(complaintId);
    if (confirm('Подтвердите удаление')) {
        $.ajax({
            method: 'DELETE',
            type: 'DELETE',
            url: `/complaints/${complaintId}`,
            dataType: 'json',
            data: {
                'id': complaintId,
                "_method": 'DELETE',
                "_token": $("[name='_token']").val(),
            },
            success: function (data, textStatus, jqXHR) {
                // console.log(data);
                // if (data['success'] != undefined)
                //     sessionStorage.setItem('success', data['success']);
                // else if (data['error'] != undefined)
                //     sessionStorage.setItem('error', data['error']);
                window.location.reload ();
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    }

}

/**
 * Открытие формы редактирования
 * @param event
 */
function editStart (event) {
    let complaintId = event.target.attributes['data-complaintId'].value;
    window.location.replace(`/complaints/${complaintId}/edit`)
}
