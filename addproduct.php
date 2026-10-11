<?php 
include 'db.php';

if(!isset($_SESSION["id"])){
    header("location:login.php");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pname = $_POST["pname"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $quantity =$_POST["quantity"];
    $desc = $_POST["desc"];

    $sql = $conn -> prepare("insert into products(pname,category,price,quantity,description,user_id) values(?,?,?,?,?,?)");
    $sql -> bind_param("ssiisi",$pname,$category,$price,$quantity,$desc,$_SESSION["id"]);
    if($sql -> execute()){
        header("Location:dashboard.php");
    }
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
            <!-- place navbar here -->
        </header>
        <main>
            <h2 class="text-center my-3"> Add New Products </h2>
            <div
                class="container col-6 my-3 p-3 border shadow rounded"
            >
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="pname"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input
                            type="text"
                            class="form-control"
                            name="category"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input
                            type="number"
                            class="form-control"
                            name="price"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input
                            type="number"
                            class="form-control"
                            name="quantity"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input
                            type="text"
                            class="form-control"
                            name="desc"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Add Product
                    </button>
                    
                </form>
            </div>
        </main>
        <footer>
            
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
