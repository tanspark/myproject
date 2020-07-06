<!-- ==================== header-section Start ==================== -->
<section id="breadcrumb-section" class="breadcrumb-section w100dt mb-10">
    <div class="container">

        <nav class="breadcrumb-nav w100dt">
            <div class="page-name left">
                <span><a href="index.php"> Home</a>
                    >
                    <?php echo $page_base_name;?>
                    >
                    <?php
                    if($page_link != "") {
                        echo "<a href=$page_link>";
                    }
                    echo $page_name;
                    if($page_link != "") {
                        echo "</a>";
                    }
                    if($page_sub_name != "") {
                        echo ">".$page_sub_name;
                    }
                    ?>
                </span>
            </div>
            <!-- /.nav-wrapper -->
        </nav>
        <!-- /.breadcrumb-nav -->

    </div>
    <!-- container -->
</section>
<!-- /.breadcrumb-section -->
<!-- ==================== header-section End ==================== -->