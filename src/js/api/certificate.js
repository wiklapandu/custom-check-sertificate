/* eslint no-undef: 'off' */
import $ from 'jquery';


const post_search_certificate = (search) => {
    const url_admin = const_ajax.url_admin_ajax;
    const ajax = const_ajax.ajax_search_certificate;

    let data = {
        action: ajax.action,
        nonce: ajax.nonce,
        search
    }

    return $.ajax({
        url: url_admin,
        method: 'POST',
        data
    })
}


export default {
    post_search_certificate,
}