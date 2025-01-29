<script src="assets/js/app.min.js"></script>

<script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>

<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
<script src="assets/js/page/toastr.js"></script>

<!-- Page Specific JS File -->
<script src="assets/js/page/index.js"></script>
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>

<script>
    $(document).ready(function() {
        // Track the current history state manually
        let initialHistoryState = window.history.length;
        const goBackButton = $('#go-back-btn');
        // Push the initial state when the page loads
        // history.pushState({ page: 1 }, "", window.location.href);

        // Handle the "Go Back" button click


            if (document.referrer) {
                goBackButton.on('click', function() {
                    // Go to the previous page in the browser history
                    window.history.back();

                });
            } else {
                // If no previous page, redirect to a default page
                goBackButton.on('click', function() {
                    var rootUrl = window.location.origin;

                    // Redirect to the root URL + /user/
                    window.location.href = rootUrl + '/user/';
                    // window.location.href = '/index';  // Replace with your desired fallback URL (like homepage)
                });
            }

        //     event.preventDefault();  // Prevent default link behavior
        //
        //     // Push a new state to simulate a page change
        //     history.pushState({ page: 2 }, "", window.location.href);
        //
        //     // Check if there is any history to go back to
        //     if (window.history.length > initialHistoryState) {
        //         alert("A new state was pushed, and a previous page exists!");
        //     } else {
        //         alert("No previous page exists in the history stack.");
        //     }
        //
        //     // Perform the back action (this pops the last state off the stack)
        //     history.back();
        // });
        //
        // // Handle the popstate event
        // window.onpopstate = function(event) {
        //     if (event.state) {
        //         console.log("Back to previous state", event.state);
        //         // You can load dynamic content or show a transition here
        //     } else {
        //         console.log("First page state reached");
        //         // Handle it when the first page is reached
        //     }
        // };
    });

    // Check if document.referrer exists (i.e., if there is a previous page)
    // if (document.referrer) {
    //     goBackButton.on('click', function() {
    //         // Go to the previous page in the browser history
    //         window.history.back();
    //
    //     });
    // } else {
    //     // If no previous page, redirect to a default page
    //     goBackButton.on('click', function() {
    //         window.location.href = '/';  // Replace with your desired fallback URL (like homepage)
    //     });
    // }

</script>