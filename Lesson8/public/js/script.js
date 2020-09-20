function addGood(goodId) {
    jQuery.ajax({
       url: '?a=addAjax&p=cart',
       type: 'post',
       data: {id: goodId},
        success: (response) => {
           if (!response.success) {
               console.log(response);
               return;
           }
           jQuery('.countGood').text(`(${response.count})`);
        }
    });
}
function makeOrder() {
    jQuery.ajax({
        url: '?a=makeAjax&p=order',
        type: 'post',
        data: {},
        success: (response) => {
            if (!response.success) {
                console.log(response);
                return;
            }
        }
    });
    location.href = '?p=order';
}
function finishOrder(orderId) {
    jQuery.ajax({
        url: `?a=finishAjax&p=order&order_id=${orderId}`,
        type: 'post',
        data: {},
        success: (response) => {
            if (response.success) {
                jQuery(`#order_${orderId}`).text('Завершён');
                jQuery(`#order_${orderId}_state`).addClass("hidden");
            } else
            {
                console.log(response);
            }
        }
    });
}