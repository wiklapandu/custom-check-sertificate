import $ from 'jquery'

(() => {
    const el = {
        button: {
            href: 'button[href]'
        }
    }

    const button_href = () => {
        $(document).on('click', el.button.href, (event) => {
            event.preventDefault();
            const href = $(event.target).attr('href');
            window.open(href);
        })
    }

    try {
        button_href();
    } catch (error) {
        console.log('Error:', error)
    }
})();