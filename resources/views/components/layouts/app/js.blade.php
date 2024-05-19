<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script data-navigate-once src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script data-navigate-once src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script data-navigate-once src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
<script data-navigate-once src="{{asset('assets/plugins/custom/draggable/draggable.bundle.js')}}"></script>
<script data-navigate-once src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script data-navigate-once src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script data-navigate-once src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script data-navigate-once src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script data-navigate-once src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<!--end::Vendors Javascript-->
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
    var KTDraggableTask = function() {
        // Private functions
        var exampleTask = function() {
            var containers = document.querySelectorAll('.draggable-zone');

            if (containers.length === 0) {
                return false;
            }

            var swappable = new Draggable.Sortable(containers, {
                draggable: '.draggable',
                handle: '.draggable .draggable-handle',
                mirror: {
                    //appendTo: selector,
                    appendTo: 'body',
                    constrainDimensions: true
                }
            });
        }

        return {
            // Public Functions
            init: function() {
                exampleTask();
            }
        };
    }();
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