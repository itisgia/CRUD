<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>CRUD</title>
    </head>
    <body>
        <h1>CRUD</h1>
        <?php
            $dsn ="mysql:dbname=yoobeeLibrary";
            $username ="root";
            $password ="root";

            try{

                $connect = new PDO($dsn, $username, $password);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed", $e ->getMessage();
            }

            $id='1';
            $sql="DELETE FROM books WHERE book_id=:id";

            // $sql = "INSERT INTO books (book_id, book_name, author) VALUES (555, 'HTML and CSS', 'Stephen') ";

                try {
                    $st = $connect->prepare($sql);
                    $st ->bindValue(":id", "$id", PDO::PARAM_INT);
                    $st ->execute();
                    // foreach ( $rows as $singleRow ) {
                    //     echo "<li>" . $singleRow["book_id"] . " "  .$singleRow["book_name"] . $singleRow["author"] . "</li>";
                    // }
                }catch (PDOException $e) {
                    echo "Query failed" , $e ->getMessage();
                }


            $connect = null;
         ?>
    </body>
</html>
