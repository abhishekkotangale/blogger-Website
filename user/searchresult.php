<?php
include('../assets/connection.php');
include('user_nav.php');
?>
    <head>
    <style>
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            }
    </style>
</head>

<body>
    

    
<div class="nav-scroller py-1 mb-3 border-bottom" style="position: relative; z-index: 2; height: 2.75rem;overflow-y: hidden;">
    <nav class="nav nav-underline justify-content-between">
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=World">World</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=U.S.">U.S.</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Technology">Technology</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Design">Design</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Culture">Culture</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Business">Business</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Politics">Politics</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Opinion">Opinion</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Science">Science</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Health">Health</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Style">Style</a>
        <a class="nav-item nav-link link-body-emphasis text-dark" href="searchresult.php?search=Travel">Travel</a>
    </nav>
  </div>
 <div>


 <?php


if (isset($_POST['search']) || isset($_GET['search'])) {

    $search = isset($_POST['search']) ? mysqli_real_escape_string($con, $_POST['search']) : mysqli_real_escape_string($con, $_GET['search']);
    
    $blogsPerPage = 6;

    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;


    $offset = ($currentPage - 1) * $blogsPerPage;

    $sql = "SELECT * FROM blogs WHERE (title LIKE '%$search%' OR description LIKE '%$search%' OR tags LIKE '%$search%') AND blogStatus='Published' ORDER BY bid DESC LIMIT $offset, $blogsPerPage";
    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0) {
        ?>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="<?php echo $result['blogImg'];?>" class="card-img-top" alt="...">
                                <div class="card-body pt-md-4">
                                    <h2><?php echo $result['title']; ?></h2>
                                    <p class="card-text pt-md-2"><?php echo $result['shortDesc']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-secondary" href="preview.php?bid=<?php echo $result['bid']; ?>">View</a>
                                        </div>
                                        <small class="text-body-secondary"><?php echo $result['date']; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php

        $totalResults = mysqli_num_rows(mysqli_query($con, "SELECT * FROM blogs WHERE (title LIKE '%$search%' OR description LIKE '%$search%' OR tags LIKE '%$search%') AND blogStatus='Published'"));
        $totalPages = ceil($totalResults / $blogsPerPage);

        $prevPage = ($currentPage > 1) ? $currentPage - 1 : 1;
        $nextPage = ($currentPage < $totalPages) ? $currentPage + 1 : $totalPages;

        $firstDisabled = ($currentPage == 1) ? 'disabled' : '';
        $prevDisabled = ($currentPage == 1) ? 'disabled' : '';
        $lastDisabled = ($currentPage == $totalPages) ? 'disabled' : '';
        $nextDisabled = ($currentPage == $totalPages) ? 'disabled' : '';
        ?>
        <div class="pagination justify-content-center mt-4">
            <ul class="pagination">
                <li class="page-item <?php echo $firstDisabled; ?>">
                    <a class="page-link" href="?search=<?php echo urlencode($search); ?>&page=1">First</a>
                </li>
                <li class="page-item <?php echo $prevDisabled; ?>">
                    <a class="page-link" href="?search=<?php echo urlencode($search); ?>&page=<?php echo $prevPage; ?>">Prev</a>
                </li>
                <li class="page-item">
                    <span class="page-link"><?php echo $currentPage; ?></span>
                </li>
                <li class="page-item <?php echo $nextDisabled; ?>">
                    <a class="page-link" href="?search=<?php echo urlencode($search); ?>&page=<?php echo $nextPage; ?>">Next</a>
                </li>
                <li class="page-item <?php echo $lastDisabled; ?>">
                    <a class="page-link" href="?search=<?php echo urlencode($search); ?>&page=<?php echo $totalPages; ?>">Last</a>
                </li>
            </ul>
        </div>
        <?php
    } else {
        echo '<center class="mt-5"><p>No results found.</center></p>';
    }
}

?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>