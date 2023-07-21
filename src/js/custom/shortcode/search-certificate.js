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
                const products = post.products.map((prod) => prod.text)?.join('<br>');
                $content.html(`
                    <div class="js-content_certificate">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${post.title}</h5>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Certificate No. : </div>
                                    <div class="col-6">${post.certificate_number}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Company Name : </div>
                                    <div class="col-6">${post.company_name}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Valid Until : </div>
                                    <div class="col-6">${post.valid_until}</div>
                                </div>
                                <div className="row mb-1">
                                    <div class="col-6 fw-bold">Products : </div>
                                    <div class="col-6">${products}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
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