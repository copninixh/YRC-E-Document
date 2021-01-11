    <script src="./assets/libs/jquery/dist/jquery.min.js"></script> 
    <script src="./assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="./dist/js/app.min.js"></script>
    <script src="./dist/js/app.init.js"></script>
    <script src="./dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="./assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="./assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="./dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="./dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--This page JavaScript -->
	<script src="assets/libs/quill/dist/quill.min.js"></script>
    <!-- Initialize Quill editor -->
	<script src="dist/js/pages/todo/todo.js"></script>
    <script src="./assets/libs/moment/min/moment.min.js"></script>
    <script src="./assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    
    <script src="./assets/libs/fullcalendar/dist/locale/th.js"></script>
    <script src="./dist/js/pages/calendar/cal-init.js"></script>
    <script src="./dist/js/pages/notes/notes.js"></script>
    <script src="assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/custom-datatable.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="dist/js/pages/forms/select2/select2.init.js"></script>

    <!-- Sumer note JS -->
    <script src="assets/libs/summernote/dist/summernote-bs4.min.js"></script>
    <script>
        /************************************/
        //default editor
        /************************************/
        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        /************************************/
        //inline-editor
        /************************************/
        $('.inline-editor').summernote({
            airMode: true
        });

        /************************************/
        //edit and save mode
        /************************************/
        window.edit = function () {
            $(".click2edit").summernote()
        },
            window.save = function () {
                $(".click2edit").summernote('destroy');
            }

        var edit = function () {
            $('.click2edit').summernote({ focus: true });
        };

        var save = function () {
            var markup = $('.click2edit').summernote('code');
            $('.click2edit').summernote('destroy');
        };

        /************************************/
        //airmode editor
        /************************************/
        $('.airmode-summer').summernote({
            airMode: true
        });
    </script>