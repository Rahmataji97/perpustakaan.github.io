<!-- BOOTSTRAP JS -->
<script src="../assets/vendor/bootstrap/js/jquery-3.2.1.slim.min.js"></script>
<script src="../assets/vendor/bootstrap/js/popper.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- END OF BOOTSTRAP JS -->
<!-- DATATABLES JS -->
<script src="../assets/vendor/bootstrap/dataTables/jquery-3.3.1.min.js"></script>
<script src="../assets/vendor/bootstrap/dataTables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/bootstrap/dataTables/dataTables.bootstrap4.min.js"></script>
<!-- END OF DATATABLES JS -->
<!-- SWEETALERT JS -->
<script src="../assets/vendor/sweetalert/dist/sweetalert2.min.js"></script>
<!-- END OF SWEETALERT JS -->
<script src="../assets/vendor/semantic-ui/transition/transition.min.js"></script>
<script src="../assets/vendor/semantic-ui/dropdown/dropdown.min.js"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/vendor/chart/Chart.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        var t = $('.table')
        .DataTable({
            scrollX: true,
            responsive: true
        });

        $('#item-more').hide();
        $('#more').dropdown();
        $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});

        var url = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
        var currentItem = $(".sidebar-nav").find("[href$='" + url + "']");
        var path = "<li class='breadcrumb-item'><a href='./dashboard'>Home</a></li>";
        $(currentItem.parents("li").get().reverse()).each(function () {
            var currentPath = $(this).children("a").text().trim();
            path += "<li class='breadcrumb-item active'><a href='./" + currentPath.toLowerCase() + "'>" + currentPath + "</a></li>";
        });
        $(".breadcrumb").html(path);
        $(".sidebar-nav a").addClass('active');

        $('.hamburger-menu').click (function(){
            $('.app-sidebar').toggleClass('push-left');
            $('.app-content').toggleClass('push');
            $('.app-header').toggleClass('expand');
        });

        $('#catSearch').keyup(function() {
            var title = $("#catSearch").val();
            $.ajax({
                type: "post",
                url: "../api/search.php",
                data: "title="+title,
                success:function(data) {
                    $("#result").html(data);
                }
            });
        });
    });
</script>
<?php if(isset($_SESSION['msgFail'])) { ?>
<script type="text/javascript">
    $(document).ready(function () {
        var msgFail = "<?php echo $_SESSION['msgFail']; ?>";
        
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
        icon: 'error',
        title: msgFail
        });
    });
</script>
<?php } elseif(isset($_SESSION['msgSuccess'])) { ?>
<script type="text/javascript">
    $(document).ready(function () {
        var msgSuccess = "<?php echo $_SESSION['msgSuccess']; ?>";
        
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
        icon: 'success',
        title: msgSuccess
        });
    });
</script>
<?php } unset($_SESSION["msgSuccess"]); unset($_SESSION["msgFail"]); ?>