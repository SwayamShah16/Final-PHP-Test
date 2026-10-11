<?php 
include 'db.php';

if(!isset($_SESSION["id"])){
    header("location:login.php");
}
?>


<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#">Hello <?=$_SESSION["uname"];?></a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="addproduct.php" aria-current="page"
                                    >➕ Add Product
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            
                        </ul>
                        <form class="d-flex my-2 my-lg-0" action="csv.php">
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Download CSV
                            </button>
                        </form>
                        &nbsp;
                        <form class="d-flex my-2 my-lg-0" action="pdf.php">
                            <button
                                class="btn btn-outline-primary my-2 my-sm-0"
                                type="submit"
                            >
                                Download PDF
                            </button>
                        </form>
                        &nbsp;
                        <form class="d-flex my-2 my-lg-0">
                            <button
                                class="btn btn-danger my-2 my-sm-0"
                                type="submit"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
            <h2 class="text-center my-3 p-3"> Product Information </h2>
            <div
                class="container"
            >
                <div
                    class="table-responsive"
                >
                <?php $result = $conn -> query("select * from products;") ?>
                    <table
                        class="table table-primary"
                    >
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Category</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <?php while($row = $result ->fetch_assoc()) {  ?>
                            <?php if($_SESSION["id"]==$row["user_id"]){?>
                            <tr class="">
                                <td><?= $row["pname"]; ?></td>
                                <td><?= $row["category"]; ?></td>
                                <td><?= $row["price"]; ?></td>
                                <td><?= $row["quantity"]; ?></td>
                                <td><?= $row["description"]; ?></td>
                                <td><a
                                    name=""
                                    id=""
                                    class="btn btn-warning"
                                    href="updateproduct.php?id=<?=$row["id"];?>"
                                    role="button"
                                    >Update</a
                                >
                                </td>
                                <td><a
                                    name=""
                                    id=""
                                    class="btn btn-danger"
                                    href="deleteproduct.php?id=<?=$row["id"];?>"
                                    role="button"
                                    >Delete</a
                                ></td>
                            </tr>
                        <?php } 
                        } ?>
                    </table>
                </div>
                
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
