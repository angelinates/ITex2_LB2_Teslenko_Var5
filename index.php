<?php
    require_once "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItehLb2</title>
</head>
<body>
    <script>
        function clearStorage(){
            localStorage.clear();
            window.location.reload();
        }
    </script>
    <button onclick="clearStorage()">Clear storage</button>
    <div>
        <form action="getBrand.php">
            <p>Task1 - Отримати перелік виробників, з якими працює магазин</p>
            <input type="submit" value="get">
        </form>
        <script>
            const brandJson = localStorage.getItem('brand');
            if(brandJson){
                const res = JSON.parse(brandJson);
                res.forEach((item)=>{
                    document.write("<li>" + item + "</li>" );
                })            
            } else{
                document.write("Попереднього результату немає")
            }
        </script>
    </div> 
    <hr>
    <div>
        <form action="getStock.php">
            <p>Task2 - товари, відсутні на складі (тобто взагалі вони є, але зараз кількість 0)</p>
            <input type="submit" value="get">
        </form>
        <script>
            const stockJson = localStorage.getItem('stock');
            console.log(stockJson);
            if(stockJson){
                const res = JSON.parse(stockJson);
                res.forEach((item)=>{
                    document.write("<li>" + item + "</li>" );
                })            
            } else{
                document.write("Попереднього результату немає")
            }
        </script>
    </div>
    <hr>
    <div>
        <form action="getByPrice.php">
            <p>Task3 - Отримати товари в обраному ціновому діапазоні.</p>
            <input type="number" name="low_price" value="1000">
            <input type="number" name="top_price" value="50000">
            <input type="submit" value="get">
        </form>
        <script>
            const priceJson = localStorage.getItem('price');
            if(priceJson){
                const res = JSON.parse(priceJson);
                res.forEach((item)=>{
                    document.write("<li>" + item + "</li>" );
                })            
            } else{
                document.write("Попереднього результату немає")
            }
        </script>
    </div>
</body>
</html>