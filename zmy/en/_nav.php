
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <span>
                        <a href="index.php"> Home</a>
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
                            echo "&nbsp; > &nbsp;".$page_sub_name;
                        }
                        ?>
                    </span>

                </div>
            </div>
        </div>
    </div>
</section>