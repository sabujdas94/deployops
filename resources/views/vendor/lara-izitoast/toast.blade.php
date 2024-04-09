<script>
    @foreach (session('toasts', collect())->toArray() as $toast)
        var options = {
            title: '{{ $toast['title'] }}',
            message: '{{ $toast['message'] }}',
            messageColor: '{{ $toast['messageColor'] }}',
            messageSize: '{{ $toast['messageSize'] }}',
            titleLineHeight: '{{ $toast['titleLineHeight'] }}',
            messageLineHeight: '{{ $toast['messageLineHeight'] }}',
            position: '{{ $toast['position'] }}',
            titleSize: '{{ $toast['titleSize'] }}',
            titleColor: '{{ $toast['titleColor'] }}',
            closeOnClick: '{{ $toast['closeOnClick'] }}',
        };

        var type = '{{ $toast['type'] }}';

        show(type, options);
    @endforeach
    function show(type, options) {
        if (type === 'info') {
            iziToast.info(options);
        } else if (type === 'success') {
            iziToast.success(options);
        } else if (type === 'warning') {
            iziToast.warning(options);
        } else if (type === 'error') {
            iziToast.error(options);
        } else {
            iziToast.show(options);
        }

    }
    var windowWidth = window.innerWidth;
    const element = document.querySelector('.iziToast-wrapper.iziToast-wrapper-topRight');

    if (element) {
        element.style.top = "35px";
        element.style.right = ((windowWidth - 1250) / 2) + "px";
    }


</script>

{{ session()->forget('toasts') }}
