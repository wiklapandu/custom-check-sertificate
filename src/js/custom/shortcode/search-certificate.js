import $ from 'jquery'
import api from '../../api/certificate';
import swal from 'sweetalert2';

(() => {
    const el = {
        search_certificate: {
            form: '.js-search_certificate',
            input: '#search_certificate',
            trigger: '.js-search_certificate_btn',
            content: '.js-content_certificate'
        }
    }

    const search_certificate_handle = () => {
        const element = el.search_certificate;
        $(document).on('submit', element.form, (event) => {
            event.preventDefault();

            const $parent = $(event.target)
            const input = $parent.find(element.input).val();
            const $content = $(element.content);
            
            $content.find('.card').remove();

            api
            .post_search_certificate(input)
            .done((res) => {
                const post = res.data.post;
                location.href = post.permalink;
            }).catch((res) => {
                const status_code = res.status;
                swal.fire({
                    title: `(${status_code})\nError!`,
                    text: res.responseJSON.data.message,
                    icon: 'error',
                    confirmButtonText: 'Close',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-dark btn-lg'
                    }
                })
            })
        })
    }

    try {
        search_certificate_handle();
    } catch (error) {
        console.log('Error:', error);
    }

})();