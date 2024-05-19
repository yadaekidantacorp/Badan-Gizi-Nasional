<!--begin::Theme mode setup on page load-->
<script data-navigate-once>
var defaultThemeMode = "light";
var themeMode;
if ( document.documentElement ) {
    if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
        themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
    } else {
        if ( localStorage.getItem("data-bs-theme") !== null ) {
            themeMode = localStorage.getItem("data-bs-theme");
        } else {
            themeMode = defaultThemeMode;
        }
    }
    if (themeMode === "system") {
        themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
    }
    document.documentElement.setAttribute("data-bs-theme", themeMode);
}
</script>
<!--end::Theme mode setup on page load-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script data-navigate-once src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script data-navigate-once src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used for this page only)-->
<!--end::Custom Javascript-->
<script data-navigate-once>
	$(document).ready(function() {
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toastr-top-right",
			"preventDuplicates": true,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
	});
	window.addEventListener('toast-success', function(event) {
		toastr.success(event.detail.message, event.detail.title);
	});
	window.addEventListener('toast-info', function(event) {
		toastr.info(event.detail.message, event.detail.title);
	});
	window.addEventListener('toast-warning', function(event) {
		toastr.warning(event.detail.message, event.detail.title);
	});
	window.addEventListener('toast-danger', function(event) {
		toastr.danger(event.detail.message, event.detail.title);
	});
	window.addEventListener("cookieAlertAccept", function() {
		// do something
	});
</script>
<script data-navigate-once>
    document.addEventListener('DOMContentLoaded', () => { 
        KTMenu.init = function () {
            KTMenu.createInstances();
            KTMenu.initHandlers();
        };
        KTDrawer.init(),
        KTMenu.init(),
        KTScroll.init(),
        KTSticky.init(),
        KTSwapper.init(),
        KTToggle.init(),
        KTScrolltop.init(),
        KTDialer.init(),
        KTImageInput.init(),
        KTPasswordMeter.init();
        KTApp.init(),
        KTThemeMode.init();
    });
    document.addEventListener('livewire:navigated', () => { 
        KTMenu.init = function () {
            KTMenu.createInstances();
            KTMenu.initHandlers();
        };
        KTDrawer.init(),
        KTMenu.init(),
        KTScroll.init(),
        KTSticky.init(),
        KTSwapper.init(),
        KTToggle.init(),
        KTScrolltop.init(),
        KTDialer.init(),
        KTImageInput.init(),
        KTPasswordMeter.init();
        KTApp.init(),
        KTThemeMode.init();
    });
</script>